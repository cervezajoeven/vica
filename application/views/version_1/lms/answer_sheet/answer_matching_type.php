<?php $data = $general_class->data; ?>
<?php $options = $data['options'][0]; ?>
<?php $question = $data['question']; ?>
<?php $question_match = explode("||", $options['question_match']); ?>
<?php $letters = range('a','z'); ?>
<?php $unshuffled_options = explode("||", $options['answer']); ?>
<?php $exploded_yeah = explode("||", $options['answer']); ?>
<?php $unshuffled_question_match = explode("||", $options['question_match']); ?>

<?php $original_match = array();?>
<?php foreach ($unshuffled_question_match as $match_key => $match_key_value) :?>
	<?php $original_match[] = array("original_key"=>$match_key,"original_letter"=>$letters[$match_key],"value"=>$match_key_value);?>
	<?php $shuffled_question_match[] = array("original_key"=>$match_key,"original_letter"=>$letters[$match_key],"value"=>$match_key_value);?>
<?php endforeach;?>

<?php shuffle($exploded_yeah); ?>
<?php shuffle($question_match); ?>
<?php shuffle($shuffled_question_match); ?>
<?php foreach (explode("||", $options['answer']) as $answer_key_key_key => $answer_key_key_value) :?>
	<input type="hidden" class="matching_type_option_list" value="<?php echo $question['id'] ?>_<?php echo $answer_key_key_key?>" name="">
<?php endforeach;?>

<input type="hidden" class="matching_type" value="<?php echo $question['id'] ?>" name="">

<?php foreach ($unshuffled_options as $answer_key => $answer_value) :?>
	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<select class="matching_type_option_select matching_type_<?php echo $question['id'] ?>" question_id="<?php echo $question['id'] ?>">
						<option class="null_value_<?php echo $answer_key; ?>_<?php echo $question['id'] ?>" last_value=""></option>
						<?php foreach ($shuffled_question_match as $answer_key_key => $answer_key_value) :?>

							<option question_id="<?php echo $question['id'] ?>" option_order="<?php echo $answer_key ?>" option_id="<?php echo $question['id'] ?>_<?php echo $answer_key_key?>" class="matching_type_option option_<?php echo $question['id'] ?>_<?php echo $answer_key_key?>" value="<?php echo $answer_key_value["original_key"];?>"><?php echo strtoupper($letters[$answer_key_key]); ?></option>
						<?php endforeach;?>	
					</select>
				</div>
				<!-- <div class="form-control option_container"></div> -->
			</div>
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<?php echo $answer_key+1; ?>.
				</div>
				<div class="form-control option_container"><?php echo $answer_value ?></div>
			</div>
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-addon">
					<?php echo strtoupper($letters[$answer_key]); ?>
				
				</div>
				<div class="form-control option_container"><?php print_r($shuffled_question_match[$answer_key]['value']); ?></div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
