<div class="brainee-page_container col-lg-12">
    <form action="<?php echo $general_class->ben_link('lms/question/save_matching_type/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >

        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Matching Type (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>
        <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
        <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">
        <div class="mc col-md-8 col-md-offset-2">
            <h3>Question</h3>
            <textarea class="form-control" placeholder="Enter question..." name="question" id="exampleFormControlTextarea1" rows="3"></textarea>
            <div class="form-group">
                <label for="question"> Score: </label>
                <input class="form-control" placeholder="Score" value="1" type="number" min="1" required="" name="points">
            </div>
            <div id="container">
                <table class="form-group" id="mt_table">
                    <tbody id="mt_body">
                        <tr>
                            <th colspan="8">
                                <h4>Choices</h4>
                            </th>
                            <th>
                                <div class="btn_add"> 
                                    <button type="button" class="btn btn-success btn-circle" id="mt_add"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </th>
                        </tr>
                
                        <tr id="mt_choices1">    
                            <td>
                              <div class="input-group">              
                                    <textarea class="form-control" name="answer[1]" id="mt_question1"></textarea>
                                    <span class="input-group-addon">=</span>
                                    <textarea class = "form-control" name="question_match[1]" id="mt_answer1"></textarea>
                              </div><br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>


<script>
$('#mt_add').click(function(){

    window.rowCountCheck = $('#mt_body tr').length;
    $('#row_count_check').val(rowCountCheck);

    var tRowId = '#mt_choices'+(rowCountCheck-1);
    var trialIndex;
    $('#row_count_check').val(rowCountCheck);
    $(tRowId).after('<tr id="mt_choices'+rowCountCheck+'">'
        +'<td>'+
        '<div class="input-group">'
        +'<textarea class="form-control" name="answer['+rowCountCheck+']" id="mt_question'+rowCountCheck+'"></textarea>'
        +'<span class="input-group-addon">=</span>'
        +'<textarea class = "form-control" name="question_match['+rowCountCheck+']" id="mt_answer'+rowCountCheck+'"></textarea>'
        +'<div class="input-group-btn">'
        +'<button id="mt_remove" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>'
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

  });
$('#mt_body').on('click','#mt_remove',function(){
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