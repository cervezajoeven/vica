<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> ()</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.$general_class->current_page['controller']); ?>/index/<?php echo $general_class->data['quiz_id']; ?>"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>
	<form action="<?php echo $general_class->ben_link('lms/quiz_question/question_type/'.$general_class->data['quiz_id']); ?>" method="POST" >
		<select class="form-control" name="question_type">
			<option value="essay">Essay</option>
			<option value="identification">Identification</option>
			<option value="multiple_choice">Multiple Choice</option>
			<option value="true_or_false">True or False</option>
			<option value="matching_type">Matching Type</option>
			<option value="multiple_choice_multiple_answer">Multiple Choice Multiple Answer</option>
		</select>
		<input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>" />
		<a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id'])?>"><input type="button" class="btn btn-primary" name="back" value="Back" /></a>
		<input type="submit" class="btn btn-success" name="submit" value="Submit" />
	</form>
</div>