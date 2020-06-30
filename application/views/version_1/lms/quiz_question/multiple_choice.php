<div class="brainee-page_container col-lg-12">
	
	<div class="mc col-md-8 col-md-offset-2">
		<h1>Multiple Choice</h1>
		<textarea class="form-control" placeholder="Enter question..." id="exampleFormControlTextarea1" rows="3"></textarea>
		
		<div id="container">
         <table class="form-group" id="mcq_table">
         	<tbody id="mcq_body">
			<tr>
				<th>
					<h4>Choices</h4>
				</th>
				<th>
					<div class="btn_add">	
						<button type="button" class="btn btn-success btn-circle" id="mcq_add"><i class="glyphicon glyphicon-plus"></i></button>
					</div>

				</th>
			</tr>
				
			<!-- start of choices -->
         	<tr id="mcq_choices1">    
         		<td>
         			<div class="input-group">
               			<span class = "input-group-addon">
                  			<input class="form-check-input" name="mcq_group" type="radio" required="" id="mcq_radio">
               			</span>               
              			<input type = "text" class = "form-control" id="mcq_option1" required="" placeholder="">
               		</div><br>
               	</td>
            </tr>
            </tbody>
		</table>
		</div>
	</div>	
	
</div>
<script>
	$('#mcq_add').click(function(){
		window.rowCountCheck = $('#mcq_body tr').length;
		$('#row_count_check').val(rowCountCheck);

		var tRowId = '#mcq_choices'+(rowCountCheck-1);
		var trialIndex;
		$('#row_count_check').val(rowCountCheck);
		$(tRowId).after('<tr id="mcq_choices'+rowCountCheck+'">'
			+'<td>'+
			'<div class="input-group">'
			+'<span class = "input-group-addon">'
			+'<input class="form-check-input required="" name="mcq_group" type="radio" id="mcq_radio">'
			+'</span>'
			+'<input type = "text" class = "form-control" id="mcq_option'+rowCountCheck+'" placeholder="">'
			+'<div class="input-group-btn">'
			+'<button id="mcq_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>'
			+'</div>'
			+'</div><br>'
			+'</td>');
	});
	$('#mcq_body').on('click','#mcq_remove',function(){
		$(this).closest('tr').remove();
     	return false;

	});
</script>
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