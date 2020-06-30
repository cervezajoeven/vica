<?php $data = $general_class->data; ?>
<?php $question_data = $data['question_data']; ?>
<?php $option_data = $data['option_data'][0]; ?>
<?php $correct = explode(",", $option_data['correct']); ?>
<div class="brainee-page_container col-lg-12">
  <form action="<?php echo $general_class->ben_link('lms/question/update_save_multiple_choice/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
    <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Multiple Choice (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Update</button></a>
                <a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
        
    <div id="container">
        <input type="hidden" name="id" value="<?php echo $question_data['id'] ?>">
        <div class="col-lg-12 col-centered">
            <div class="form-group">
                <label for="question"> Question: </label>
                <textarea class="form-control" name="question" placeholder="Enter question..." id="exampleFormControlTextarea1" rows="3"><?php print_r($data['question_data']['question'])?></textarea>
            </div>
            <div class="form-group">
                <label for="question"> Score: </label>
                <input type="number" class="form-control" min="1" required="" value="<?php echo $option_data['points']?>" name="points">
            </div>
            <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
            <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
            <table class="form-group" id="mcq_table">
                <tbody id="mcq_body">
                    <tr>
                        <th>
                            <label for="question">Choices</label>
                        </th>
                        <th>
                            <div class="btn_add"> 
                                <button type="button" class="btn btn-success btn-circle" id="mcq_add"><i class="glyphicon glyphicon-plus"></i></button>
                            </div>

                        </th>
                    </tr>
                    <?php foreach (explode("||", $option_data['answer']) as $answer_key => $answer_value): ?>
                        <tr id="mcq_choices<?php echo $answer_key+1; ?>">    
                            <td>
                                <div class="input-group">
                                    <span class = "input-group-addon">
                                        <input class="form-check-input" <?php if($correct[$answer_key]==1): ?> checked <?php endif;?> name="correct" value="<?php echo $answer_key+1?>" type="radio" id="mcq_radio">
                                    </span>
                                    <textarea name="answer[<?php echo $answer_key+1; ?>]"><?php print_r($answer_value); ?></textarea>
                                    <?php if($answer_key!=0): ?>
                                      <span class = "input-group-addon">
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
      +'<textarea name="answer['+rowCountCheck+']"></textarea>'
      +'<span class = "input-group-addon"><button id="mcq_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button></span>'
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
        toolbar1: "insertfile undo redo | styleselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
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
      return ($('input[type=radio]:checked').size() > 0);
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
</style>