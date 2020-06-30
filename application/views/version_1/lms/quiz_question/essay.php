<div class="brainee-page_container col-lg-12">
	
    <div class="brainee-page_titlebar">
        <div class="brainee-page_titlebar_title">
            <span>Essay for </span>
        </div>
        <div class="brainee-page_titlebar_controls_container">
            <a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
            <a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id'])?>"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
        </div>
    </div>

    <div class="form-group">
    	<div class="col-md-2"></div>
    	<div class="col-md-8">
            <label for="comment" style="font-size: 26px">Question:</label>
            <textarea class="form-control" rows="5" id="comment"></textarea>
            <label for="comment" style="font-size: 20px">Score:</label>
            <input class="form-control" type="number" name="score">

        </div>
        <div class="col-md-2"></div>

    </div>

</div>
<center>
	<input type="submit" name="sub" class="btn btn-success" value="Save">
</center>