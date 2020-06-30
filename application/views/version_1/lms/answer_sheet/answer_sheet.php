<style type="text/css">
	.section_container.col-lg-12 {
	    margin-top: 20px;
	}
	.section_container.col-lg-12 p {
	    font-size: 30px;
	}
	.question_container.col-lg-12 p {
	    font-size: 20px;
	}
	.option_container{
		margin-left:50px; 
	}
</style>
<?php $quiz = $general_class->data['quiz']; ?>
<?php $quiz_part = $general_class->data['quiz_part']; ?>
<?php $attempt = $general_class->data['attempt']; ?>
<?php $answers_json = (array)json_decode($attempt['answer_sheet']); ?>
<?php $new_json = (array)json_decode($attempt['answer_sheet']); ?>
<?php
	foreach ($answers_json as $answers_json_key => $answers_json_value) {
		$answers[$answers_json_key] = $answers_json_value;
	}
?>

<?php //$answers[1334] = "1,0,2"; ?>
<form action="">
	<div class="container">
		<div class="row">

			<?php //print_r($new_json); ?>

			<?php foreach($quiz_part as $quiz_part_key=>$quiz_part_value): ?>
				<div class="section_container col-lg-12">
					<div class=""><p><?php echo $quiz_part_value['quiz_label']; ?><p></div>
				</div>
				<?php foreach($quiz as $quiz_key=>$quiz_value): ?>
					<?php if($quiz_value['quiz_part_id']==$quiz_part_value['quiz_part_id']): ?>
						<div class="question_container col-lg-12">
							<div class=""><p><?php echo $quiz_value['question']; ?></p></div>
						</div>

							<?php $correct_answer = explode(",", $quiz_value['correct']); ?>
							<?php $student_answer = explode(",", $answers[$quiz_value['question_id']]); ?>
							<?php if($answers[$quiz_value['question_id']]==$quiz_value['correct']):?>
							
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">
											
											<?php if($student_answer[$answer_key]==1):?>
												<span class="input-group-addon"><input type="radio" checked="" disabled="" /></span>
												<div class="form-control alert-success"><?php echo $answer_value; ?></div>

											<?php else: ?>
												<span class="input-group-addon"><input type="radio" name="" disabled="" /></span>
												<div class="form-control"><?php echo $answer_value; ?></div>
											<?php endif; ?>
											
										</div>
									</div>
								
								<?php endforeach; ?>
							<?php else: ?>
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">

											<span class="input-group-addon"><input type="radio" disabled=""> <?php if($student_answer[$answer_key]==1):?> checked="" <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> checked="" <?php endif; ?> /></span>
											<div class="form-control <?php if($student_answer[$answer_key]==1):?> alert-danger <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> alert-success <?php endif; ?> "><?php echo $answer_value; ?></div>
											
											
										</div>
									</div>
								
								<?php endforeach; ?>

							<?php endif; ?>
						<?php endif;?>

						<?php if($quiz_value['question_type']=="true_or_false"): ?>
							<?php $correct_answer = explode(",", $quiz_value['correct']); ?>
							<?php $student_answer = explode(",", $answers[$quiz_value['question_id']]); ?>
							<?php if($answers[$quiz_value['question_id']]==$quiz_value['correct']):?>
							
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">
											
											<?php if($student_answer[$answer_key]==1):?>
												<span class="input-group-addon"><input type="radio" disabled="" checked="" /></span>
												<div class="form-control alert-success"><?php echo $answer_value; ?></div>

											<?php else: ?>
												<span class="input-group-addon"><input type="radio" disabled="" name="" /></span>
												<div class="form-control"><?php echo $answer_value; ?></div>
											<?php endif; ?>
											
										</div>
									</div>
								
								<?php endforeach; ?>
							<?php else: ?>
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">

											<span class="input-group-addon"><input type="radio" <?php if($student_answer[$answer_key]==1):?> checked="" <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> checked="" <?php endif; ?> /></span>
											<div class="form-control <?php if($student_answer[$answer_key]==1):?> alert-danger <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> alert-success <?php endif; ?> "><?php echo $answer_value; ?></div>
											
											
										</div>
									</div>
								
								<?php endforeach; ?>

							<?php endif; ?>
						<?php endif;?>

						<?php if($quiz_value['question_type']=="identification"): ?>
								<?php 
							  		$correct_answers = explode("||", $quiz_value['answer']);
				                    if($quiz_value['case_sensitive']==0){
				                        $answer_sheet_answer = strtolower($answers[$quiz_value['question_id']]);
				                    }
				                    if($quiz_value['case_sensitive']==0){
				                        $answer_sheet_answer = str_replace(' ', '', $answers[$quiz_value['question_id']]);
				                    }
				                    foreach ($correct_answers as $correct_answers_key => $correct_answers_value) {
				                        if($quiz_value['case_sensitive']==0){
				                            $correct_answers[$correct_answers_key] = strtolower($correct_answers_value);
				                        }
				                        if($quiz_value['case_sensitive']==0){
				                            $correct_answers[$correct_answers_key] = str_replace(' ', '', $correct_answers_value);
				                        }
				                    }
	            				?>
	            				
	            				<?php if(in_array($answers[$quiz_value['question_id']], $correct_answers)): ?>
	            					<div class="option_container form-group col-lg-12">
										<div class="input-group">
										  	<span class="input-group-addon"></span>
										  	<div class="form-control alert-success" class="answer" option_id=""><?php echo $answers[$quiz_value['question_id']]; ?></div>
										</div>
									</div>
	            				<?php else: ?>
	            					<div class="option_container form-group col-lg-12">
										<div class="input-group">
										  	<span class="input-group-addon"></span>
										  	<div class="form-control alert-danger" class="answer" option_id=""><?php echo $answers[$quiz_value['question_id']]; ?></div>
										</div>
									</div>
									<div class="option_container form-group col-lg-12">
										Correct Answers:
									</div>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">
										  	<span class="input-group-addon"></span>
										  	<div class="form-control" class="answer" option_id=""><?php echo $quiz_value['answer']; ?></div>
										</div>
									</div>
	            				<?php endif; ?>
								
						<?php endif;?>

						<?php if($quiz_value['question_type']=="matching_type"): ?>
								<?php $student_answer = explode(",", $answers[$quiz_value['question_id']]); ?>
								<?php $question_match = explode("||", $quiz_value['question_match']); ?>
								<div class="col-lg-6">
									<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
											<?php if($answer_key == $student_answer[$answer_key]):?>
												<div class="option_container form-group col-lg-12">
													<div class="input-group">
													  	<span class="input-group-addon"></span>
													  	<div class="form-control alert-success"><?php echo $answer_value; ?></div>
													</div>
												</div>
											<?php else: ?>
												<div class="option_container form-group col-lg-12">
													<div class="input-group">
													  	<span class="input-group-addon"></span>
													  	<div class="form-control alert-danger"><?php echo $answer_value; ?></div>
													</div>
												</div>
											<?php endif; ?>
											
									<?php endforeach; ?>
								</div>
								<div class="col-lg-6">
									<?php foreach($student_answer as $student_answer_key=>$student_answer_value): ?>
											<div class="option_container form-group col-lg-12">
												<div class="input-group">
												  	<span class="input-group-addon"></span>
												  	<div class="form-control"><?php echo $question_match[$student_answer_value]; ?></div>
												</div>
											</div>
									<?php endforeach; ?>
								</div>
						<?php endif;?>

						<?php if($quiz_value['question_type']=="essay"): ?>
							<?php //print_r($quiz_value); ?>
								<div class="option_container form-group col-lg-12">
									<div class="input-group">
									  	<span class="input-group-addon">Score:  <input type="number" max="<?php echo $quiz_value['points']?>" name=""> (Score Limit: <?php echo $quiz_value['points']?>)</span>
									  	<div class="form-control" class="answer" option_id=""><?php echo $answers[$quiz_value['question_id']]; ?></div>
									</div>
								</div>
						<?php endif;?>

						<?php if($quiz_value['question_type']=="multiple_choice_multiple_answer"): ?>
							<?php $correct_answer = explode(",", $quiz_value['correct']); ?>
							<?php $student_answer = explode(",", $answers[$quiz_value['question_id']]); ?>
							<?php if($answers[$quiz_value['question_id']]==$quiz_value['correct']):?>
							
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">
											
											<?php if($student_answer[$answer_key]==1):?>
												<span class="input-group-addon"><input type="checkbox" disabled="" checked="" /></span>
												<div class="form-control alert-success"><?php echo $answer_value; ?></div>

											<?php else: ?>
												<span class="input-group-addon"><input type="checkbox" disabled="" name="" /></span>
												<div class="form-control"><?php echo $answer_value; ?></div>
											<?php endif; ?>
											
										</div>
									</div>
								
								<?php endforeach; ?>
							<?php else: ?>
								<?php foreach(explode("||", $quiz_value['answer']) as $answer_key=>$answer_value): ?>
									<div class="option_container form-group col-lg-12">
										<div class="input-group">
											
											<span class="input-group-addon"><input type="checkbox" disabled="" <?php if($student_answer[$answer_key]==1):?> checked="" <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> checked="" <?php endif; ?> /></span>
											<div class="form-control <?php if($student_answer[$answer_key]==1):?> alert-danger <?php endif; ?> <?php if($correct_answer[$answer_key]==1):?> alert-success <?php endif; ?> "><?php echo $answer_value; ?></div>
											
											
										</div>
									</div>
								
								<?php endforeach; ?>

							<?php endif; ?>
						<?php endif;?>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
	</div>
</form>