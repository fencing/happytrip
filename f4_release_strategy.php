<?php
						@session_start();
						define("F_MODEL","f0_model.php");
						define("F_NEWPAGE","f4_release_strategy.html");
						define("F_MENU","f0_menu.php");
						define("TO_NEWPAGE","Location:f4_release_strategy.html");

$st='

  <div class="col-sm-8 col-md-4" style="height:680px;">
    <div class="thumbnail">
      <div class="caption">
        <h3>{topic}</h3>

        <p>{context}</p>
        <a href="#" class="btn btn-default" role="button">收藏</a></p>
      </div>
    </div>
  </div>

';
						$sum="";
						$str=$st;
						date_default_timezone_set("Asia/Shanghai");

						require("dbconfig.php");
						$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
						mysql_select_db(DBNAME,$link);

						$sql = "select * from strategy";
						
						$result = mysql_query($sql,$link);
						
						while($row = mysql_fetch_assoc($result))
							{
							$topic=$row['topic'];
							$context=$row['context'];

							$str=str_replace("{topic}",$topic,$st);
							$str=str_replace("{context}",$context,$str);
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
						fclose($fp);
						
						$str=str_replace("{REPLACE_hint}","<h1>攻略大全</h1>",$str);
						
						$fp=fopen(F_MENU,"r") ;
						$str_menu=fread($fp,filesize(F_MENU));
						$str=str_replace("{REPLACE_menu}",$str_menu,$str);
						fclose($fp);
			
						$fp=fopen("f4_release_strategy_model.php","r") ;
						$str_model=fread($fp,filesize("f4_release_strategy_model.php"));
						fclose($fp);
						$str=str_replace("{REPLACE_hide}",$str_model,$str);

						$str=str_replace("{REPLACE_hint}",$kkk,$str);
						$str=str_replace("{REPLACE_content}","",$str);
						
						
						if($_SESSION["id"]=="")
						{
							$str_state="<div style='float:right'>".
							"<a href='f0_login.php'   >登录</a>".
							"<a href='f0_register.php' >注册</a></div>";
						}
						else
						{
							$str_state="{duser}";
							$str_state=str_replace("{duser}",$_SESSION['username'],$str_state);
						}
						$str=str_replace("{REPLACE_state}",$str_state,$str);
						$str=str_replace("{REPLACE_did}",$_SESSION['id'],$str);
						$str=str_replace("{REPLACE_duser}",$_SESSION['username'],$str);

						
						$handle=fopen(F_NEWPAGE,"w"); 
						fwrite($handle,$str); 
						fclose($handle);

						header(TO_NEWPAGE);
						
?>
