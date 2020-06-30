<div class="brainee-page_container col-lg-12">
    <form action="<?php echo $general_class->ben_link('lms/question/save_essay/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" method="POST" >
        <div class="brainee-page_titlebar">
            <div class="brainee-page_titlebar_title">
                <span>Essay (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (Section <?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
            </div>
            <div class="brainee-page_titlebar_controls_container">
                <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
                <a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$general_class->data['quiz_part_id']); ?>" >
                    <button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <label for="comment" >Question:</label>
                <textarea class="form-control" rows="5" id="comment" name="question"></textarea>
                <label for="comment">Score:</label>
                <input class="form-control" placeholder="Score" value="1" type="number" min="1" required="" name="points">
                <input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>">
                <input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>">

            </div>
            <div class="col-md-2"></div>

        </div>
    </form>
</div>