<?php $data = $general_class->data; ?>
<?php $options = $data['options'][0]; ?>
<?php $question = $data['question']; ?>
<div class="form-group">
	<div class="input-group">
		<div class="input-group-addon">
			
		</div>
		<textarea name="<?php echo $options['id']; ?>" class="form-control essay option_<?php echo $question['id']; ?>" question_id="<?php echo $question['id']; ?>"></textarea>
	</div>
</div>