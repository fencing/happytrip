<?php
//这是一个信息增、删和改操作的处理页
define("TO_NEWPAGE","Location:f2_release_trip.php");
 @session_start();
ini_set('date.timezone','Asia/Shanghai');  
//（1）、 导入配置文件
	require("dbconfig.php");
	
	
	
//（2）、连接MySQL、并选择数据库
	$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
	mysql_select_db(DBNAME,$link);
	
//（3）、根据需要action值，来判断所属操作，执行对应的代码
	switch($_GET["action"]){
		case "reg": //执行添加操作
			
				$username 	= $_POST["username"];
				$password 	= $_POST["password"];
				$email 		= $_POST["email"];
				$addtime 	= time();

				$sql = 	"INSERT INTO member ".
						"(id,username, password ,email,addtime)".
						"VALUES ".
						"(null,'{$username}','{$password}','{$email}','{$addtime}')";
				
				mysql_query($sql,$link);
				

				$id = mysql_insert_id($link);//获取刚刚添加信息的自增id号值
				if($id>0){
					echo "<h3>注册成功！</h3>";
					echo "<a href='homepage.php'>返回主页</a>";
				}else{
					echo "<h3>注册失败！</h3>";
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
				}
				

				
				
				break;
		
		case "login":
				session_start();
				
				$username 	= $_POST["username"];
				$password 	= $_POST["password"];
				$_SESSION["username"]=$username;
				
				$sql = "select id from member  where username='{$username}'and password='{$password}'";

				$retval = mysql_query($sql,$link);
				$row = mysql_fetch_assoc($retval);
				if( mysql_num_rows($retval) ){
					
					echo "<h3>login成功！}</h3>";
					$_SESSION["id"]=$row['id'];
					
					header("Location:homepage.php");
					

				}else{
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
					echo "<h3>login失败！</h3>";
				}
				
				//3. 自动跳转到浏览新闻界面
				
			break;
			
		case "update": //执行修改操作
				//1. 获取要修改的信息
				$title = $_POST["title"];
				$keywords = $_POST["keywords"];
				$author = $_POST["author"];
				$content = $_POST["content"];
				$id = $_POST['id'];
				
				//2. 过滤要修改的信息（省略）
				//3. 拼装修改sql语句，并执行修改操作
				$sql = "update news set title='{$title}',keywords='{$keywords}',author='{$author}',content='{$content}' where id={$id}";
				//echo $sql;
				mysql_query($sql,$link);
			
				//4. 跳转回浏览界面
				header("Location:index.php");
				
			break;
		case "f2": 

				$tripname 	= $_POST["tripname"];
				
				$kind 		= $_POST["kind"];
				$viewname 	= $_POST["viewname"];
				
				$place		= $_POST["place"];
				$placecity	= $_POST["placecity"];
				
				$timestart	= $_POST["timestart"];
				$timeend	= $_POST["timeend"];
				
				$cost		= $_POST["cost"];
				$member		= $_POST["member"];
				
				$comment	= $_POST["comment"];

				$addtime 	= time();

			echo "<td>发布时间:".date("Y-m-d   H:i:s ",$addtime)."&nbsp &nbsp</td>";
			

			
				$did 	= $_POST["did"];
				$duser		= $_POST["duser"];
				
				$sql = 	"INSERT INTO travel ".
						"(id,tripname, kind ,viewname,place,placecity,timestart,timeend,cost,member,comment,did,duser,addtime,mlist,mnum)".
						"VALUES ".
						"(null,'{$tripname}','{$kind}','{$viewname}','{$place}','{$placecity}',".
						"'${timestart}','{$timeend}',{$cost},'{$member}','{$comment}',{$did},'{$duser}',{$addtime},{$did},1)";
																	
				
				
				
				mysql_query($sql,$link);
				

				$id = mysql_insert_id($link);//获取刚刚添加信息的自增id号值
				
				
				

				if($id>0){
							header(TO_NEWPAGE);
					echo "<h3>add  new trip suc ！</h3>";

					echo "<a href='homepage.php'>返回主页</a>";
					
				}else{
				if($did=="")
				{echo "未登录";}
					echo "<h3>添加失败！</h3>";
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
				}

			break;
			
		case "fs2": 
		
				$tripname 	= $_POST["tripname"];
				$kind 		= $_POST["kind"];
				$viewname 	= $_POST["viewname"];
				
				$place		= $_POST["place"];
				$placecity	= $_POST["placecity"];
				
				$timestart	= $_POST["timestart"];
				$timeend	= $_POST["timeend"];
				$cost		= $_POST["cost"];
				$member		= $_POST["member"];
				$comment	= $_POST["comment"];

				$addtime 	= time();

			echo "<td>发布时间:".date("Y-m-d   H:i:s ",$addtime)."&nbsp &nbsp</td>";
			

			
				$did 	= $_POST["did"];
				$duser		= $_POST["duser"];
				$_mark=0;
	
				
				if($tripname!="")	{$sqlname = $sqlname."tripname='{$tripname}' ";}
				else {$_mark=1;}
				
				if($kind!="")		{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname." kind='{$kind}'";}
				else {$_mark=1;}
				
				if($viewname!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  viewname='{$viewname}'";}
				else {$_mark=1;}
				
				if($place!="")		{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  place='{$place}'";}
				else {$_mark=1;}
				if($placecity!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  placecity= '{$placecity}'";}
				else {$_mark=1;}
				
				if($timestart!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  timestart='{$timestart}'";}
				else {$_mark=1;}
				if($timeend!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  timeend= '{$timeend}'";}
				else {$_mark=1;}

				if($timestart!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  timestart='{$timestart}'";}
				else {$_mark=1;}
				if($timeend!="")	{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  timeend= '{$timeend}'";}
				else {$_mark=1;}
				
				if($cost!="")		{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  cost={$cost}";}
				else {$_mark=1;}
				if($member!="")		{if($_mark==0) $sqlname = $sqlname." and ";$sqlname = $sqlname."  member='{$member}'";}
				else {$_mark=1;}
				$_SESSION["search"]=0;
					if($sqlname==""){$_SESSION["search"]=0;header(TO_NEWPAGE);		}	
					else{$_SESSION["search"]=1;}					
				$sql = "select * from travel where  ".$sqlname;
				$_SESSION["sqlsearch"]=$sql;
				
				$_SESSION['keyword']=$sqlname;
				echo $sql;
						
				
				$retval = mysql_query($sql,$link);
				$row = mysql_fetch_assoc($retval);
				if( mysql_num_rows($retval) ){
					header(TO_NEWPAGE);
					echo "<h3>Search Trip Success ！</h3>";

					echo "<a href='homepage.php'>返回主页</a>";

				}else{
					echo "<h3>search失败！</h3>";
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
				}

			break;			
			case "f2addtoteam": 
			$id 	= $_POST["id"];
			$joinid = $_POST["joinid"];
			echo $id ;
			echo "\n" ;
			echo $joinid ;
			$sql="update travel set mnum=mnum+1,mlist=CONCAT(mlist,',{$joinid}') where id={$id}";
			$retval = mysql_query($sql,$link);
			$id = mysql_insert_id($link);
			
			
			
			
			break;	
			
			
			case "f3": 
				$topic 	= $_POST["topic"];
				$context		= $_POST["context"];
				$addtime 	= time();

				
				$sql = 	"INSERT INTO fun ".
						"(id,topic, context,addtime )".
						"VALUES ".
						"(null,'{$topic}','{$context}','{$addtime}')";

				mysql_query($sql,$link);
				

				$id = mysql_insert_id($link);//获取刚刚添加信息的自增id号值

				echo "<h3>$id</h3>";
				
				if($id>0){
					echo "<h3>添加成功！</h3>";
					echo "<a href='homepage.php'>返回主页</a>";
					
				}else{
					echo "<h3>添加失败！</h3>";
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
				}

			break;
			
			
			
			
			
			case "f4": 
				$topic 	= $_POST["topic"];
				$context		= $_POST["context"];
				$addtime 	= time();

				
				$sql = 	"INSERT INTO strategy ".
						"(id,topic, context,addtime )".
						"VALUES ".
						"(null,'{$topic}','{$context}','{$addtime}')";

				mysql_query($sql,$link);

				$id = mysql_insert_id($link);//获取刚刚添加信息的自增id号值

				echo "<h3>$id</h3>";
				
				if($id>0){
					echo "<h3>添加成功！</h3>";
					echo "<a href='homepage.php'>返回主页</a>";
					
				}else{
					echo "<h3>添加失败！</h3>";
					echo "<a href='javascript:window.history.back();'>返回</a>&nbsp;&nbsp;";
				}

			break;
			case "f6": //执行修改操作
				//1. 获取要修改的信息
				$id 		= $_POST['id'];	
				$username 		= $_POST["username"];
				$password	= $_POST["password"];
				$email 	= $_POST["email"];
				$age 	= $_POST["age"];
				$phone		= $_POST['phone'];
				$addrnowcoun 		= $_POST["addrnowcoun"];
				$addrnowcity 	= $_POST["addrnowcity"];
				$addrnowdist	= $_POST["addrnowdist"];
				$addrhomecoun 	= $_POST["addrhomecoun"];
				$addrhomecity	= $_POST["addrhomecity"];
				$addrhomedist	= $_POST["addrhomedist"];

				$sql = "update member set  ".
						"username='{$username}',password='{$password}',email='{$email}',age={$age},phone='{$phone}' ,".
						"addrnowcoun='{$addrnowcoun}',addrnowcity='{$addrnowcity}',addrnowdist='{$addrnowdist}' ,".
						"addrhomecoun='{$addrhomecoun}',addrhomecity='{$addrhomecity}',addrhomedist='{$addrhomedist}' ".
						" where id={$id} ";
				//echo $sql;
				mysql_query($sql,$link);
			echo "<h3>$username </h3>";

				header("Location:f6_setting.php");
				
			break;
	
	}
	
//（4）、关闭数据连接
	mysql_close($link);
?>
