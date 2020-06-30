<style type="text/css">
	.radio label{
		display: block;
	}
	.green{
		background-color: green;
	}
</style>

<?php $option = $data['option_data'][0];?>

<?php $options = explode("||", $option['answer']);?>
<?php $correct = explode(",", $option['correct']);?>
	
<?php foreach($options as $option_key=>$option_value): ?>
	<div class="form-group" style="width: 80%">
		<div class="input-group">
			<span class="input-group-addon <?php if($correct[$option_key]=='1'): echo "green"; endif; ?>">
				<input type="radio" name="radio_<?php echo $option['id']?>" <?php if($correct[$option_key]=='1'): echo "checked='checked'"; endif; ?> value="<?php echo $correct[$option_key]; ?>" disabled />
			</span>
		    
		    <textarea name="answer[1]" class="joeven_is_awesome"><?php print_r($option_value); ?></textarea>       
		</div>
	</div>
<?php endforeach;?>