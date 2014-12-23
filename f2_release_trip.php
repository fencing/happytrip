<?php
						@session_start();
						define("F_MODEL","f2_release_trip_model.php");
						define("F_NEWPAGE","f2_release_trip.html");
						define("F_MENU","menu.php");
						define("TO_NEWPAGE","Location:f2_release_trip.html");
					 	$st	="<div class='container' style='width: 800px'>".
							"<div class='jumbotron'>".
							"<div>发布者:{duser} &nbsp&nbsp 时间：{addtime}</div>".
							"<table align='center' border='1' width='600'>".
							"<caption >{tripname} </caption>".
							"<tr>".
							"<TD width='100' >类型</TD>".
							"<td width='300' >{kind}   </td>".
							"<TD width='100'   >景点</TD>".
							"<td width='300' >{viewname}   </td>".
							"</tr> ".
							"<tr>". 
		"<TD   width='100'>地点省</TD>".
			"<td width='300'> {place} </td>".
	"<TD   width='100'>地点市</TD>".
	"<td width='300'>    {placecity}  </td>".
	"</tr> ".
	"<tr>".
	"<TD   width='100'>开始时间</TD>".
	"<td width='300'>     {timestart}   </td>".
	"<TD  width='100' >开始时间</TD>".
	"<td width='300'>     {timeend}  </td>".
	"</tr> ".
 
	"<tr>".
	"<TD   width='100'>花费</TD>".
	"<td width='300'>     {cost}   </td>".
	"<TD  width='100' >成员</TD>".
	"<td width='300'>     {member}  </td>".
	"</tr> ".

	"<tr>".
	"<TD   width='100'>说明</TD>".
	"<td >     {comment}  </td>".
	"</tr>". 
							"</table>".
							"<form  action='action.php?action=f2addtoteam' method='post'>".
							"<input type='hidden' name='id'	value='{id}' />".
							"<input type='hidden' name='joinid'	value='{joinid}' />".
							"<input type='hidden' name='duser' 	 value='{REPLACE_duser}' />".
							"<div align='right'  width='500' >".
							"<button type='submit' name='submit' class='btn btn-primary' >将我加入</button></div>".
							"</form>".
							"</div>".
							"</div>";
						
						$sum="";
						$str=$st;
						date_default_timezone_set("Asia/Shanghai");
						

						require("dbconfig.php");
						$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
						mysql_select_db(DBNAME,$link);
						if($_SESSION["search"]==1)
						{	$sql=$_SESSION["sqlsearch"];

						}
						else
						{
							$sql = "select * from travel order by addtime desc";
						}
						
						
						$result = mysql_query($sql,$link);

						while($row = mysql_fetch_assoc($result)){

							$duser=$row['duser'];
							$addtime=date("Y-m-d   H:i:s ",$row['addtime']);
							$tripname=$row['tripname'];
							$kind=$row['kind'];
							$viewname=$row['viewname'];
							$place=$row['place'];
							$placecity=$row['placecity'];
							$timestart=$row['timestart'];
							$timeend=$row['timeend'];
							$cost=$row['cost'];
							$member=$row['member'];
							$comment=$row['comment'];
							$id=$row['id'];
							$joinid=$_SESSION['id'];
	
							$str=str_replace("{duser}",$duser,$st);
							$str=str_replace("{tripname}",$tripname,$str);
							$str=str_replace("{addtime}",$addtime,$str);
							$str=str_replace("{kind}",$kind,$str);
							$str=str_replace("{viewname}",$viewname,$str);
							$str=str_replace("{place}",$place,$str);
							$str=str_replace("{placecity}",$placecity,$str);
							$str=str_replace("{timestart}",$timestart,$str);
							$str=str_replace("{timeend}",$timeend,$str);
							$str=str_replace("{cost}",$cost,$str);
							$str=str_replace("{member}",$member,$str);
							$str=str_replace("{comment}",$comment,$str);
							$str=str_replace("{id}",$id,$str);
							$str=str_replace("{joinid}",$joinid,$str);

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
