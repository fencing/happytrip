<!DOCTYPE html>
<html>
<head>
 <META http-equiv="content-type" content="text/html; charset=UTF-8"> 
 
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/kelikeli.css" rel="stylesheet" media="screen">
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.min.js"></script>
	
	<style>
 
	</style>

</head>
<body>

<div id="container" >

<div id="header" >
<h1 >kelikeli,快乐旅行^_^</h1>
</div>

<div class="left" >
	<?php include "menu.php"; ?>
</div>
<div class="header">
</div>
<div class='content'>
<div class="container"  >

   <div class="jumbotron">
      <h1>欢迎登陆页面！</h1>
      <p>这是一个超大屏幕（Jumbotron）的实例。</p>
      <p><a class="btn btn-primary btn-lg" role="button">
         学习更多</a>
      </p>
   </div>
</div>
</div>


				<?php
				date_default_timezone_set("Asia/Shanghai");
						require("dbconfig.php");
						$link = @mysql_connect(HOST,USER,PASS) or die("数据库连接失败！");
		mysql_select_db(DBNAME,$link);
						
			$sql = "select * from travel order by addtime desc";
						$result = mysql_query($sql,$link);
						
						while($row = mysql_fetch_assoc($result)){
							echo "<div class='content'>";
							echo "<div class='container'>";
							
							echo "<div class='jumbotron'>";

							echo "<table align='center' border='1' width='400'>";
							echo "<caption id='hello'>旅游招友</caption>";
							
							echo "<tr>";
							echo "<th >".date("Y-m-d   H:i:s ",$row['addtime'])."</th>";
							echo "<th>{$row['duser']}</th>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th >活动</th>";
							echo "<td>{$row['activity']}</td>";
							echo "</tr>";
						
							echo "<tr>";
							echo "<th>地点</th>";
							echo "<td>{$row['place']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>时间</th>";
							echo "<td>{$row['timestart']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>时间</th>";
							echo "<td>{$row['timeend']}</td>";
							echo "</tr>";


							
							echo "<tr>";
							echo "<th>花费</th>";
							echo "<td>{$row['cost']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>成员</th>";
							echo "<td>{$row['member']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>说明</th>";
							echo "<td>{$row['comment']}</td>";
							echo "</tr>";	

							
							echo "</table>";
							echo "</div>";
							echo "</div>";
							echo "</div>";

							
						}
						
					
						$sql = "select * from fun order by addtime desc";
						$result = mysql_query($sql,$link);


						while($row = mysql_fetch_assoc($result)){
						echo "<div class='content'>";
							echo "<table align='center' border='1' width='400'>";
							echo "<caption id='hello'>分享趣事</caption>";
							
							echo "<tr>";
							echo "<th >".date("Y-m-d   H:i:s ",$row['addtime'])."</th>";
							echo "<th>{$row['duser']}</th>";
							echo "</tr>";
							
							echo "<div class = 'a-feed'>";
							echo "<table align='center' border='1' width='400'>";
							
							echo "<tr>";
							echo "<th> 主题</th>";
							echo "<td>{$row['topic']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>内容</th>";
							echo "<td>{$row['context']}</td>";
							echo "</tr>";
							
							echo "</table>";
							echo "</div>";
							echo "</div>";
						}

						$sql = "select * from strategy order by addtime desc";
						$result = mysql_query($sql,$link);
						
						while($row = mysql_fetch_assoc($result)){
						echo "<div class='content'>";

							echo "<div class = 'a-feed'>";
							echo "<table align='center' border='1' width='400'>";
							echo "<caption id='hello'>撰写攻略</caption>";
							
							echo "<tr>";
							echo "<th >".date("Y-m-d   H:i:s ",$row['addtime'])."</th>";
							echo "<th>{$row['duser']}</th>";
							echo "</tr>";
							
							echo "<tr>";
							echo "<th> 主题</th>";
							echo "<td>{$row['topic']}</td>";
							echo "</tr>";

							
							echo "<tr>";
							echo "<th>内容</th>";
							echo "<td>{$row['context']}</td>";
							echo "</tr>";
							
							echo "</table>";
							echo "</div>";
							echo "</div>";
							
						}

						mysql_free_result($result);
						mysql_close($link);
				?>
</div>
</body>
</html>
