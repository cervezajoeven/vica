<?php $data = $general_class->data; ?>
<div class="brainee-page_container col-lg-12">
    <form action="<?php echo $general_class->ben_link('lms/question/update_save_essay/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Essay (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button>
                </a>
            </div>
        </div>

        <input type="hidden" name="id" value="<?php echo $data['question_data']['id']?>">
        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <label for="comment" >Question:</label>
                <textarea class="form-control" rows="5" id="comment" name="question"><?php print_r($data['question_data']['question'])?></textarea>
                <label for="comment">Score:</label>
                <input class="form-control" type="number" value="<?php print_r($data['option_data'][0]['points'])?>" name="points">
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