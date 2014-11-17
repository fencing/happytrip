<!DOCTYPE html>
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
<div id="header" ><h1 >kelikeli,快乐旅行^_^</h1></div>
<div class="left" > {REPLACE_menu} </div>
<div class="header"></div>


<div class='content'>

	<div class="container" style="width: 800px">

		<div class="jumbotron" >

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >
				搜索旅游团队
			</button>

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal_dis" style="float:right">
				发布我的团队
			</button>

			<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
	  <form action="action.php?action=fs2" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              搜索旅游团队
			  <TD align="right" color:red >旅团名称</TD>
	<td><input type="text" name="tripname"   ></td>
            </h4>
         </div>
         <div class="modal-body">
            
				<input type="hidden" name="did"		 value="{REPLACE_did}" />
				<input type="hidden" name="duser" 	 value="{REPLACE_duser}" />
				
				
			<table  border="0" align="center" > 
<tr>
	<TD align="right" >类型</TD>
	<td><input type="text" name="kind"   ></td>
	<TD align="right" >景点</TD>
	<td><input type="text" name="viewname"   ></td>
</tr> 

<tr>
	<TD align="right" >地点省</TD>
	<td><input type="text" name="place" ></td>
	<TD align="right" >地点市</TD>
	<td><input type="text" name="placecity"  ></td>
</tr> 

<tr>
	<TD align="right" >开始时间</TD>
	<td><input type="text" name="timestart"   ></td>
	<TD align="right" >开始时间</TD>
	<td><input type="text" name="timeend"  ></td>
</tr> 
 
<tr>
	<TD align="right" >花费</TD>
	<td><input type="text" name="cost"   ></td>
	<TD align="right" >成员</TD>
	<td><input type="text" name="member"  ></td>
</tr> 

<tr>
	<TD align="right" >说明</TD>
	<td><input type="text" name="comment"  ></td>
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
	  <form action="action.php?action=f2" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              发布我的团队	
			  <TD align="right" color=red >旅团名称</TD>
	<td><input type="text" name="tripname"   ></td>
            </h4>
         </div>
         <div class="modal-body">
            
				<input type="hidden" name="did"		 value="{REPLACE_did}" />
				<input type="hidden" name="duser" 	 value="{REPLACE_duser}" />
				
				
			<table  border="0" align="center" > 
<tr>
	<TD align="right" >类型</TD>
	<td><input type="text" name="kind"   ></td>
	<TD align="right" >景点</TD>
	<td><input type="text" name="viewname"   ></td>
</tr> 

<tr>
	<TD align="right" >地点省</TD>
	<td><input type="text" name="place" ></td>
	<TD align="right" >地点市</TD>
	<td><input type="text" name="placecity"  ></td>
</tr> 

<tr>
	<TD align="right" >开始时间</TD>
	<td><input type="text" name="timestart"   ></td>
	<TD align="right" >结束时间</TD>
	<td><input type="text" name="timeend"  ></td>
</tr> 
 
<tr>
	<TD align="right" >花费</TD>
	<td><input type="text" name="cost"   ></td>
	<TD align="right" >成员</TD>
	<td><input type="text" name="member"  ></td>
</tr> 

<tr>
	<TD align="right" >说明</TD>
	<td><input type="text" name="comment"  ></td>
</tr> 
<tr>

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
