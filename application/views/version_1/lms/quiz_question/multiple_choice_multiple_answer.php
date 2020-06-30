<div class="brainee-page_container col-lg-12">
	
	<div class="mc col-md-8 col-md-offset-2">
		<h1>Multiple Choice Multiple Answer</h1>
		<textarea class="form-control" placeholder="Enter question..." id="mcmr" rows="3"></textarea>
		<input type="number" placeholder="Score">
		
		<div id="container">
         <table class="form-group" id="mcmr_table">
         	<tbody id="mcmr_body">
			<tr>
				<th>
					<h4>Choices</h4>
				</th>
				<th>
					<div class="btn_add">	
						<button type="button" class="btn btn-success btn-circle" id="mcmr_add"><i class="glyphicon glyphicon-plus"></i></button>
					</div>



				</th>
			</tr>
				
			<!-- start of choices -->
         	<tr id="mcmr_choices1">    
         		<td>
         			<div class="input-group">
               			<span class = "input-group-addon">
                  			<input class="form-check-input" name="mcmr_group" type="checkbox" id="mcmr_checkbox">
               			</span>               
              			<input type = "text" class = "form-control" id="mcmr_option1" placeholder="">
<!-- 
              			<div class="input-group-btn">
          <button class="btn btn-danger">X</button>
     </div> -->
               		</div>
						
               		<br>
               	</td>
            </tr>
            </tbody>
		</table>
		</div>
	</div>	
	
</div>
<script>
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
			+'<input type = "text" class = "form-control" id="mcmr_option'+rowCountCheck+'" placeholder="">'
			+'<div class="input-group-btn">'
			+'<button id="mcmr_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>'
			+'</div>'
			+'</div><br>'
			+'</td>');
	});

	$('#mcmr_body').on('click','#mcmr_remove',function(){
		//$(this).closest('#mcmr_choices'+rowCountCheck).remove();
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