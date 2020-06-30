<?php $data = $general_class->data; ?>
<?php $options = $data['options'][0]; ?>
<?php $question = $data['question']; ?>
<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">
			<input type="radio" class="true_or_false option_<?php echo $question['id']; ?>" question_id="<?php echo $question['id']; ?>" name="answer[<?php echo $question['id']; ?>]" value="1">
		</div>
		<div class="form-control option_container">True</div>
	</div>
</div>

<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">
			<input type="radio" class="true_or_false option_<?php echo $question['id']; ?>" question_id="<?php echo $question['id']; ?>" name="answer[<?php echo $question['id']; ?>]" value="2">
		</div>
		<div class="form-control option_container">False</div>
	</div>
</div>