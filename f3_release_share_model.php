
﻿<!DOCTYPE html>
<html>
<head>
 <META http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
	<link href="css/kelikeli.css" rel="stylesheet" media="screen">
     <script  src="js/jquery.min.js"></script>
</head>
<body>

<script  src="js/bootstrap.min.js"></script>    
<div class="container-fluid">
	<div class="row-fluid" style="background-image: url('img/title.jpg');">
		<div class="span11" ></div>
		<div class="span1">
		
			{REPLACE_state}
		</div>
			<br><br><br><br><br><br>
	</div>
	
<div class="row-fluid">
<div class="span1"></div>
<div class="span2">
{REPLACE_menu} 
</div>
<div class="span9">
	<div class="row-fluid">
		<div class="span12">
			<div class="container">

		<div class="jumbotron">

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >
				搜索趣事分享
			</button>
			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal_dis" style="float:right">
				发布我的趣事
			</button>

			<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
	  <form action="action.php?action=fs3" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              搜索旅游趣事
			  <TD align="right" color:red >旅团名称</TD>
			  <td><input type="text" name="tripname" ></td>
            </h4>
         </div>
         <div class="modal-body">
		<!-- 
		<input type="hidden" name="did"		 value="{REPLACE_did}" />
		<input type="hidden" name="duser" 	 value="{REPLACE_duser}" />
		-->
<table class="span12" border="0" align="center" > 
<tr>
	<TD align="right" >团队名称：</TD>
	<td><input type="text" name="tripname"   ></td>
	<TD align="right" >发布者：</TD>
	<td><input type="text" name="duser"   ></td><!--       -->
</tr>
<tr>
	<td align="right" >省：</td>
	<td><input type="text" name="province"   ></td>
	<td align="right" >市：</td>
	<td><input type="text" name="city"   ></td><!--       -->
</tr> 

<tr>
	<td align="right" >景点：</td>
	<td><input type="text" name="place" ></td>
	<td align="right" >趣事种类：</td>
	<td><input type="text" name="type"  ></td>
</tr> 


</table>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="submit" name="submit" class="btn btn-primary">
               提交
            </button>

         </div>
		 </form>
		 
      </div>
</div>
</div>


<div class="modal fade" id="myModal_dis" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
	  <form action="action.php?action=f3" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              发布我的趣事
			  <TD align="right" color=red >旅团名称</TD>
	<td><input type="text" name="tripname"   ></td>
            </h4>
         </div>
         <div class="modal-body">
            
				<input type="hidden" name="did"		 value="{REPLACE_did}" />
				<input type="hidden" name="duser" 	 value="{REPLACE_duser}" />
				
			<table  border="0" align="center" > 
<tr>
	<TD align="right" >省：</TD>
	<td><input type="text" name="province"   ></td>
	<TD align="right" >市：</TD>
	<td><input type="text" name="city"   ></td><!--       -->
</tr> 

<tr>
	<TD align="right" >景点：</TD>
	<td><input type="text" name="place" ></td>
	<TD align="right" >趣事种类：</TD>
	<td><input type="text" name="type"  ></td>
</tr> 

 

</table>
	开始分享我的趣事！
<textarea name="content" rows="6" cols="80"></textarea>

         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" 
               data-dismiss="modal">关闭
            </button>
            <button type="submit" name="submit" class="btn btn-primary">
               提交
            </button>

         </div>
		 </form>
		 
      </div>
</div>
</div>
		</div>

</div>
{REPLACE_hint}
{REPLACE_content}
</div></div>
</div>
</body>
</html>
