<div class="brainee-page_container col-lg-12">
	<form action="<?php echo $general_class->ben_link('lms/question/save_multiple_choice/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
		<div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Multiple Choice (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
         
		<div id="container">
			<div class="col-lg-8 col-centered">
				<div class="form-group">
			        <label for="question"> Question: </label>
					<textarea class="form-control" name="question" placeholder="Enter question..." id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
				<div class="form-group">
			        <label for="question"> Score: </label>
					<input type="number" class="form-control" name="points">
				</div>
				<input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
                <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
		     	<table class="form-group" id="mcq_table">
		     		<tbody id="mcq_body">
						<tr>
							<th>
								<label for="question" >Choices</label>
							</th>
							<th>
								<div class="btn_add">	
									<button type="button" class="btn btn-success btn-circle" id="mcq_add"><i class="glyphicon glyphicon-plus"></i></button>
								</div>

							</th>
						</tr>

			         	<tr id="mcq_choices1">    
			         		<td>
			         			<div class="input-group">
			               			<span class = "input-group-addon">
			                  			<input class="form-check-input" name="correct" value="1" required="" type="radio" id="mcq_radio">
			               			</span>               
			              			<input type = "text" name="answer[1]" class="form-control" id="mcq_option1" placeholder="">
			               		</div><br>
			               	</td>
			            </tr>
		        	</tbody>
				</table>
			</div>
		</div>
	</form>	
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
			+'<input class="form-check-input" name="correct" type="radio" id="mcq_radio" value="'+rowCountCheck+'">'
			+'</span>'
			+'<input type = "text" class = "form-control" required="" name="answer['+rowCountCheck+']" id="mcq_option'+rowCountCheck+'" placeholder="">'
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