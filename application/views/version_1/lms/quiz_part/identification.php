<?php $data = $general_class->data; ?>
<?php $answers = $data['option_data'][0]['answer'] ?>
<div class="form-group">
	<input type="text" class="form-control" readonly="" value="<?php echo $answers; ?>" />
</div>