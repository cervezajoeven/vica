<?php $option = $data['option_data'][0]; ?>
<?php $answers = explode("||", $option['answer']); ?>
<?php $question_matches = explode("||", $option['question_match']); ?>

<?php foreach ($answers as $answer_key => $answer_value) : ?>
	
	<div class="input-group" style="width: 80%;">              
         <textarea name="answer[1]" class="joeven_is_awesome"><?php echo $answer_value; ?></textarea>
         <span class="input-group-addon">=</span>
         <textarea name="answer[1]" class="joeven_is_awesome"><?php echo $question_matches[$answer_key]; ?></textarea>
    </div>

	
<?php endforeach; ?>
