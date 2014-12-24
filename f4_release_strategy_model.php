		<div class="jumbotron" >

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" >
				搜索攻略
			</button>

			<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal_dis" style="float:right">
				发布攻略
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
              搜索攻略
			  <TD align="right" color:red >景点名称</TD>
			<td><input type="text" name="tripname"   ></td>
            </h4>
         </div>
<!--         <div class="modal-body">
            
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

</table>

         </div>-->
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
	  <form class="form-horizontal" role="form" action="action.php?action=f4" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              发布攻略
            </h4>
         </div>
         <div class="modal-body">
 
				<input type="hidden" name="did"		 value="{REPLACE_did}" />
				<input type="hidden" name="duser" 	 value="{REPLACE_duser}" />
			
<tr>
	<TD align='right' width=30 height=15>主题</TD>
	<td><input type='text' name='topic' height=15 width=120 ></td>
</tr>
<br>
<br>
<tr>
	<TD align='right' width=30 height=60>内容</TD>
	<td><textarea name='context' style=' height:100%;' rows='6' cols='40'></textarea></td>
</tr>


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



