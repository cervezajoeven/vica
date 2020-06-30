<div class="brainee-page_container col-lg-12">
	<form action="<?php echo $general_class->ben_link('lms/question/question_type/'.$general_class->data['quiz_id']); ?>" method="POST" >
		<div class="brainee-page_titlebar">
			<div class="brainee-page_titlebar_title">
				<span>Pick a Question Type (Quiz <?php echo $general_class->data['quiz_data'][0]['quiz_name']; ?>) (<?php echo $general_class->data['quiz_part_data'][0]['quiz_label']; ?>)</span>
			</div>
			<div class="brainee-page_titlebar_controls_container">
				<a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
				<a href="<?php echo $general_class->ben_link('lms/quiz_part/index/'.$general_class->data['quiz_id'])?>"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
			</div>
		</div>
		<select class="form-control" name="question_type">
			<!-- <option value="essay">Essay</option> -->
			<option value="identification">Identification</option>
			<option value="multiple_choice">Multiple Choice</option>
			<option value="true_or_false">True or False</option>
			<option value="matching_type">Matching Type</option>
			<option value="multiple_choice_multiple_answer">Multiple Choice Multiple Answer</option>
			<!-- <option value="fill_in_the_blanks">Fill in the blanks</option> -->
		</select>
		<input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>" />
		<input type="hidden" name="quiz_part_id" value="<?php echo $general_class->data['quiz_part_id']?>" />
	</form>
</div>