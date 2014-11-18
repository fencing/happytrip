
﻿<!DOCTYPE html>
<html>
<head>
 <META http-equiv="content-type" content="text/html; charset=UTF-8"> 
	<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link href="css/kelikeli.css" rel="stylesheet" media="screen">
     <script  src="js/jquery.min.js"></script>
</head>
<body>

<script  src="js/bootstrap.min.js"></script>    
<div id="container" >
<div id="header" >
<h1 ><div style="float:left">kelikeli,快乐旅行^_^</div>
{REPLACE_state}
</h1>

</div>
<div class="left" > {REPLACE_menu} </div>
<div class="header"></div>


<div class='content'>

	<div class="container" style="width: 800px">

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
<table  border="0" align="center" > 
<tr>
	<TD align="right" >团队名称：</TD>
	<td><input type="text" name="tripname"   ></td>
	<TD align="right" >发布者：</TD>
	<td><input type="text" name="duser"   ></td><!--       -->
</tr>
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

<tr>
	<TD align="right" >开始分享我的趣事！</TD>

	<td><textarea name="content" style=" height:100%;" rows="6" cols="80"></textarea></td>

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
</div>

</div>
{REPLACE_hint}
{REPLACE_content}
</div>
</body>
</html>
