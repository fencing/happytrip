<?php
						@session_start();
						define("F_MODEL","f3_release_share_model.php");
						define("F_NEWPAGE","f3_release_share.html");
						define("F_MENU","menu.php");
						define("TO_NEWPAGE","Location:f3_release_share.html");
						$st	="<div class='container' style='width: 800px'>".
							"<div class='jumbotron'>".
								"<div>发布者:{postuser} &nbsp&nbsp 时间：{time}<br>{tripname}</div>".
									"<table align='center' border='1' width='600'>".
										"<tr>".
											"<TD width='100' >省</TD>".
											"<td width='300' >{province}   </td>".
											"<TD width='100' >市</TD>".
											"<td width='300' >{city}   </td>".
										"</tr> ".
										"<tr>".
											"<TD   width='100'>景点</TD>".
											"<td width='300'> {place} </td>".
											"<TD   width='100'>种类</TD>".
											"<td width='300'> {type}  </td>".
										"</tr> ".
									"</table>".
									"{content}".
								"</div>".
							"</div>";
						
						$sum="";
						$str=$st;
						date_default_timezone_set("Asia/Shanghai");
						require("dbconfig.php");
						$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
						mysql_select_db(DBNAME,$link);

						if($_SESSION["search"]==1){	
							$sql=$_SESSION["sqlsearch"];
						}
						else{
							$sql = "select * from share order by time desc";
						}
						
						
						$result = mysql_query($sql,$link);

						while($row = mysql_fetch_assoc($result)){
							
							$duser=$row['postuser'];
							$tripname=$row['tripname'];
							$time=date("Y-m-d   H:i:s ",$row['time']);
							$province=$row['province'];
							$city=$row['city'];
							$place=$row['place'];
							$type=$row['type'];
							$content=$row['content'];
							
							$str=str_replace("{postuser}",$postuser,$str);
							$str=str_replace("{tripname}",$tripname,$str);
							$str=str_replace("{time}",$time,$str);
							$str=str_replace("{province}",$province,$str);
							$str=str_replace("{city}",$city,$str);
							$str=str_replace("{place}",$place,$str);
							$str=str_replace("{type}",$type,$str);
							$str=str_replace("{content}",$content,$str);

							$sum=$sum.$str;
						}
						mysql_free_result($result);
						mysql_close($link);
							
						$fp=fopen(F_MODEL,"r") ;
						$str=fread($fp,filesize(F_MODEL));
						$str=str_replace("{REPLACE_content}",$sum,$str);
						fclose($fp);
							
						$fp=fopen(F_MENU,"r") ;
						$str_menu=fread($fp,filesize(F_MENU));
						$str=str_replace("{REPLACE_menu}",$str_menu,$str);
						if($_SESSION["id"]=="")
						{
							$str_state="<div style='float:right'>".
							"<a href='f0_login.php'   >登录</a>".
							"<a href='f0_register.php' >注册</a></div>";
						}
						else
						{
						$str_state="<div style='float:right'>{duser}</div>";
						$str_state=str_replace("{duser}",$_SESSION['username'],$str_state);
						}
						$str=str_replace("{REPLACE_state}",$str_state,$str);
						fclose($fp);
						
						
						$str=str_replace("{REPLACE_did}",$_SESSION['id'],$str);
						$str=str_replace("{REPLACE_duser}",$_SESSION['username'],$str);
						if($_SESSION["search"]==1)
						{	
							$hit="搜索";
							$hit=$hit.$_SESSION['keyword'];
							$hit=$hit."结果";
							$str=str_replace("{REPLACE_hint}",$hit,$str);
							$_SESSION["search"]=0;
						}
						else
						{
							$str=str_replace("{REPLACE_hint}","全部发布",$str);
						}
						
						$handle=fopen(F_NEWPAGE,"w"); 
						fwrite($handle,$str); 
						fclose($handle);

						header(TO_NEWPAGE);
						
?>