<?php $data = $general_class->data; ?>
<?php $question_data = $data['question_data']; ?>
<?php $option_data = $data['option_data'][0]; ?>
<?php $correct = explode(",", $option_data['correct']); ?>
<div class="brainee-page_container col-lg-12">
	<form action="<?php echo $general_class->ben_link('lms/question/update_save_multiple_choice_multiple_answer/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
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
        <input type="hidden" name="id" value="<?php echo $question_data['id'] ?>">
		<div id="container">
			<div class="col-lg-8 col-centered">
				<div class="form-group">
			        <label for="question"> Question: </label>
					<textarea class="form-control" name="question" placeholder="Enter question..." id="exampleFormControlTextarea1" rows="3"><?php echo $question_data['question'] ?></textarea>
				</div>
				<div class="form-group">
			        <label for="question"> Score: </label>
					<input class="form-control" min="1" required="" value="<?php echo $option_data['points'] ?>" type="number" name="points">
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
						<?php foreach (explode("||", $option_data['answer']) as $answer_key => $answer_value): ?>
						<!-- start of choices -->
				         	<tr id="mcq_choices<?php echo $answer_key+1; ?>">    
				         		<td>
				         			<div class="input-group">
				               			<span class = "input-group-addon">
				                  			<input class="form-check-input" <?php if($correct[$answer_key]==1): ?> checked <?php endif;?> name="correct[<?php echo $answer_key+1; ?>]" type="checkbox" id="mcq_radio">
				               			</span>
				               			<textarea name="answer[<?php echo $answer_key+1; ?>]" class="form-control" id="mcq_option<?php echo $answer_key+1; ?>" placeholder=""><?php print_r($answer_value); ?></textarea>
				               			<?php if($answer_key!=0): ?>
                                            <span class="input-group-addon">
                                                <button id="mcq_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                            </span>
                                        <?php endif; ?>
				               		</div><br>
				               	</td>
				            </tr>
				        <?php endforeach; ?>
		        	</tbody>
				</table>
			</div>
		</div>
	</form>	
</div>
	
</div>
<script>
tinymce.init({ 
    selector:'textarea',
    paste_data_images: true,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    image_advtab: true,
    file_picker_callback: function(callback, value, meta) {
      if (meta.filetype == 'image') {
        $('#upload').trigger('click');
        $('#upload').on('change', function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function(e) {
            callback(e.target.result, {
              alt: ''
            });
          };
          reader.readAsDataURL(file);
        });
      }
    },
    templates: [{
      title: 'Test template 1',
      content: 'Test 1'
    }, {
      title: 'Test template 2',
      content: 'Test 2'
    }]
});
</script>
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
			+'<input class="form-check-input" name="correct['+rowCountCheck+']" type="checkbox" id="mcq_radio">'
			+'</span>'
			+'<textarea name="answer['+rowCountCheck+']" class="form-control" id="mcq_option'+rowCountCheck+'" placeholder=""></textarea>'
			+'<div class="input-group-btn">'
			+'<button id="mcq_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>'
			+'</div>'
			+'</div><br>'
			+'</td>');
		tinymce.init({ 
		    selector:'textarea',
		    paste_data_images: true,
		    plugins: [
		      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
		      "searchreplace wordcount visualblocks visualchars code fullscreen",
		      "insertdatetime media nonbreaking save table contextmenu directionality",
		      "emoticons template paste textcolor colorpicker textpattern"
		    ],
		    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | fontsizeselect",
		    image_advtab: true,
		    file_picker_callback: function(callback, value, meta) {
		      if (meta.filetype == 'image') {
		        $('#upload').trigger('click');
		        $('#upload').on('change', function() {
		          var file = this.files[0];
		          var reader = new FileReader();
		          reader.onload = function(e) {
		            callback(e.target.result, {
		              alt: ''
		            });
		          };
		          reader.readAsDataURL(file);
		        });
		      }
		    },
		    templates: [{
		      title: 'Test template 1',
		      content: 'Test 1'
		    }, {
		      title: 'Test template 2',
		      content: 'Test 2'
		    }]
		});
	});
	$('#mcq_body').on('click','#mcq_remove',function(){
		$(this).closest('tr').remove();
     return false;

	});
	function atLeastOneRadio() {
      return ($('input[type=checkbox]:checked').size() > 0);
  	}
  	$(".the_radio").change(function(){
      
  	});
	  $("form").submit(function(e){
	      if(atLeastOneRadio()){

	      }else{
	        e.preventDefault();
	        alert("Please select a correct answer");
	      }
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