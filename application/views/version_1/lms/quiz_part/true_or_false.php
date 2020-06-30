<style type="text/css">
	.radio label{
		display: block;
	}
	.green{
		background-color: green;
	}
</style>

<?php $data = $general_class->data; ?>
<?php $option = $data['option_data'][0]?>
<?php $answer = $data['option_data'][0]['answer'] ?>
<?php $correct = explode(",", $data['option_data'][0]['correct']) ?>

<div class="form-group" style="width: 80%">
	<div class="input-group">
		<span class="input-group-addon <?php if($correct[0]==1): echo "green"; endif; ?>">
			<input type="radio" name="radio_<?php echo $option['id']?>" <?php if($correct[0]==1): echo "checked='checked'"; endif; ?> disabled />
		</span>
		<input type="text" name="" disabled="" value="TRUE" class="form-control">
       
	</div>
</div>

<div class="form-group" style="width: 80%">
	<div class="input-group">
		<span class="input-group-addon <?php if($correct[1]==1): echo "green"; endif; ?>">
			<input type="radio" name="radio_<?php echo $option['id']?>" <?php if($correct[1]==1): echo "checked='checked'"; endif; ?> disabled />
		</span>
		<input type="text" name="" disabled="" value="FALSE" class="form-control">
	</div>
</div>