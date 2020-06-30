<?php $data = $general_class->data; ?>
<?php $options = $data['options'][0]; ?>
<?php $question = $data['question']; ?>
<?php foreach (explode("||", $options['answer']) as $answer_key => $answer_value) :?>
	<div class="form-group">
		<div class="input-group">
			<div class="input-group-addon">
				<input type="radio" class="multiple_choice option_<?php echo $question['id']; ?>" question_id="<?php echo $question['id']; ?>" name="answer[<?php echo $question['id']; ?>]" value="<?php echo $answer_key+1?>">
			</div>
			<div class="form-control option_container"><?php echo $answer_value ?></div>
		</div>
	</div>
<?php endforeach; ?>
