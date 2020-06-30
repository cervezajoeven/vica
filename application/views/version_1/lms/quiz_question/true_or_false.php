<div class="brainee-page_container col-lg-12">
	
	<div class="mc col-md-8 col-md-offset-2">
		<h1>True or False</h1>
		<textarea class="form-control" placeholder="Enter question..." id="mcmr" rows="3"></textarea>
		
		<div id="container">
         <table class="form-group" id="mcmr_table">
         	<tbody id="mcmr_body">
			<tr>
				<th>
					<h4>Choices</h4>
				</th>
			</tr>
				
			<!-- start of choices -->
         	<tr id="mcmr_choices1">    
         		<td>
         			<div class="input-group">
               			<span class = "input-group-addon">
                  			<input class="form-check-input" name="mcmr_group" type="radio" id="true">
               			</span>               
              			<input type = "text" class = "form-control" id="mcmr_true" value="True" readonly>
               		</div><br>
               	</td>               	
            </tr>
            <tr id="mcmr_choices2">
            	<td>
         			<div class="input-group">
               			<span class = "input-group-addon">
                  			<input class="form-check-input" name="mcmr_group" type="radio" id="false">
               			</span>               
              			<input type = "text" class = "form-control" id="mcmr_false" value="False" readonly>
               		</div><br>
               	</td>
            </tr>
            </tbody>
		</table>
		</div>
	</div>	
	
</div>
<!-- <script>
	$('#mcmr_add').click(function(){
		window.rowCountCheck = $('#mcmr_body tr').length;
		$('#row_count_check').val(rowCountCheck);

		var tRowId = '#mcmr_choices'+(rowCountCheck-1);
		var trialIndex;
		$('#row_count_check').val(rowCountCheck);
		$(tRowId).after('<tr id="mcmr_choices'+rowCountCheck+'">'
			+'<td>'+
			'<div class="input-group">'
			+'<span class = "input-group-addon">'
			+'<input class="form-check-input" name="mcmr_group" type="checkbox" id="mcq_checkbox">'
			+'</span>'
			+'<input type = "text" class = "form-control" id="mcmr_option'+rowCountCheck+'" placeholder="sample">'
			+'</div><br>'
			+'</td>'
			+'<td>'
			+'<button type="button" class="btn btn-danger" id="mcmr_remove"><i class="glyphicon glyphicon-remove"></i></button>'
			+'</td>');
	});
	$('#mcq_body').on('click','#mcmr_remove1',function(){
		$(this).closest('#mcmr_choices'+rowCountCheck).remove();
	});
</script> -->
<style>
	

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}
.btn_right{
	position: absolute;
}
</style>