<?php $data = $general_class->data; ?>
<?php $options = $data['option_data'][0]; ?>

<?php foreach (explode("||", $options['answer']) as $answer_key => $answer_value) :?>

	<div class="radio">
	  <label><input type="radio" name="radio_<?php echo $options['id']; ?>" value="<?php echo $answer_key+1?>">
		<?php echo $answer_value ?>
	  </label>
	</div>
<?php endforeach; ?>