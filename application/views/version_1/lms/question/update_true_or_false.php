<?php $data = $general_class->data; ?>
<?php $question_data = $data['question_data']; ?>
<?php $option_data = $data['option_data'][0]; ?>
<div class="brainee-page_container col-lg-12">
	<form action="<?php echo $general_class->ben_link('lms/question/update_save_true_or_false/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >

        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>True or False (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $question_data['id'] ?>">
        <div class="form-group">
        	<label>Question: </label>
            <textarea class="form-control" rows="5" id="comment" name="question"><?php echo $question_data['question'] ?></textarea>
        </div>

        <div class="form-group">
            <label>Score: </label>
            <input class="form-control" min="1" required="" value="<?php echo $option_data['points'] ?>" type="number" name="points">
    	</div>

        <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
        <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
    	<div id="container">
            <table class="form-group" id="mcmr_table">
             	<tbody id="mcmr_body">
        			<tr>
        				<th>
        					<h4>Choices</h4>
        				</th>
        			</tr>
    			
                 	<tr id="mcmr_choices1">    
                 		<td>
                 			<div class="input-group">
                       			<span class = "input-group-addon">
                          			<input class="form-check-input" name="correct" <?php if(explode(",", $option_data['correct'])[0]==1):?> checked <?php endif; ?> value="1" type="radio" id="true">
                       			</span>               
                      			<input type = "text" class="form-control" name="answer[1]" id="mcmr_true" value="True" readonly>
                       		</div><br>
                       	</td>               	
                    </tr>
                    <tr id="mcmr_choices2">
                    	<td>
                 			<div class="input-group">
                       			<span class="input-group-addon">
                          			<input class="form-check-input" name="correct" <?php if(explode(",", $option_data['correct'])[1]==1):?> checked <?php endif; ?> value="2" type="radio" id="false">
                       			</span>               
                      			<input type="text" class="form-control" name="answer[2]" id="mcmr_false" value="False" readonly>
                       		</div><br>
                       	</td>
                    </tr>
                </tbody>
    	    </table>
    	</div>
    </form>
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