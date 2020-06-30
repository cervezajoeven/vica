<?php $data = $general_class->data; ?>
<?php $question_data = $data['question_data']; ?>
<?php $option_data = $data['option_data'][0]; ?>
<!-- <?php print_r($option_data['case_sensitive']); ?> -->
<div class="brainee-page_container col-lg-12">
    <form action="<?php echo $general_class->ben_link('lms/question/update_save_identification/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Identification (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
        <input type="hidden" name="id" value="<?php echo $question_data['id'] ?>">
        <div class="form-group">
        	<div class="col-md-2"></div>
        	<div class="col-md-8">
                <label for="comment" >Question:</label>
                <textarea class="form-control" rows="5" id="comment" name="question"><?php echo $question_data['question'] ?></textarea>
                <div class="form-group">
                    <label for="comment" >Score:</label>
                    <input class="form-control" min="1" required="" value="<?php echo $option_data['points'] ?>" type="number" name="points">
                </div>
                <div class="form-group">
                    <label for="comment" >Case Sensitive:<input class="form-control" name="case_sensitive" type="checkbox" <?php echo ($option_data['case_sensitive']==1 ? "checked" : "") ?>></label>
                    
                </div>
                <div class="form-group">
                    <label for="comment" >Space Sensitive:<input class="form-control" name="space_sensitive" type="checkbox" <?php echo ($option_data['space_sensitive']==1 ? "checked" : "") ?>></label>
                    
                </div>
                <table class="form-group" id="mcq_table">
                    <tbody id="mcq_body">
                        <tr>
                            <th>
                                <label for="question" >Possible Answers</label>
                            </th>
                            <th>
                                <div class="btn_add">   
                                    <button type="button" class="btn btn-success btn-circle" id="mcq_add"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>

                            </th>
                        </tr>
                    
                        <!-- start of choices -->
                        <?php foreach (explode("||", $option_data['answer']) as $option_key => $option_value):?>
                            <tr id="mcq_choices<?php echo $option_key+1?>">    
                                <td>
                                    <div class="input-group">               
                                        <input type = "text" name="answer[<?php echo $option_key+1?>]" class="form-control" id="mcq_option<?php echo $option_key+1?>" value="<?php echo $option_value?>" placeholder="">
                                        <?php if($option_key!=0): ?>
                                            <div class="input-group-btn">
                                                <button id="mcq_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                                            </div>
                                        <?php endif; ?>
                                    </div><br>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- <label for="comment">Answer: Should be seperated with || for multiple answers</label>
                <input class="form-control" type="text" name="answer[1]"> -->
                <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
                <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
            </div>

            <div class="col-md-2"></div>

        </div>
    </form>
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