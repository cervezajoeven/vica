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
	.background_222{
		background-color: #222;
	}
	.margin-top-20{
		margin-top: 20px;
	}
	.white-color{
		color: white;
	}
	.form-control{
		height: auto;
	}
</style>
<?php $data = $general_class->data; ?>
<?php $quiz = $data['quiz']; ?>
<?php $questions = $data['questions']; ?>
<?php $quiz_part = $data['quiz_part']; ?>
<?php $attempt = $data['attempt']; ?>
<?php $student = $data['student']; ?>
<?php $checked_answer_sheet = $data['checked_answer_sheet']; ?>
<?php $answers_json = (array)json_decode($attempt['answer_sheet']); ?>

<!-- <pre> -->
<?php //print_r(json_decode($attempt['answer_sheet'])); ?>
<form action="">
	<div class="container">
		<div class="row">
			<?php //print_r($quiz); ?>
			<div class="section_container col-lg-12 background_222 margin-top-20 white-color"><h4>Student Name : <?php echo $student['first_name'] ?> <?php echo $student['last_name'] ?></h4></div>
			<div class="section_container col-lg-6 background_222 margin-top-20 white-color"><h4><?php echo $quiz['quiz_name']; ?></h4></div>
			<div class="section_container col-lg-3 margin-top-20 btn-success"><h4>Total Score: <?php echo $attempt['total_score']; ?></h4></div>

			<div class="section_container col-lg-3 margin-top-20 btn-warning"><h4>Student Score: <?php print_r($attempt['score']); ?></h4></div>
			<?php foreach($quiz_part as $quiz_part_key=>$quiz_part_value): ?>
				<div class="section_container col-lg-12">
					<div class=""><p><?php echo $quiz_part_value['quiz_label']; ?><p></div>
				</div>
				<?php foreach($questions as $question_key=>$question_value): ?>
					<div class="">
						<?php if($question_value['quiz_part_id']==$quiz_part_value['quiz_part_id']): ?>
							<div class="question_container col-lg-12">
								<hr>
								<div class=""><p><?php echo $question_value['question']; ?></p></div>
							</div>
							<?php //print_r($question_value['question_id']); ?>
							<!-- IF Multiple Choice -->
							<?php if($question_value['question_type']=="multiple_choice"): ?>
								<?php $question_id = $question_value['question_id']; ?>
								
								<?php if(array_key_exists($question_id, $checked_answer_sheet)): ?>
									<?php $corrections = $checked_answer_sheet[$question_id]; ?>

									<?php foreach(explode("||", $question_value['answer']) as $answer_key=>$answer_value): ?>
										<?php 
											if($corrections[$answer_key] == 1){
												$option_status = "has-success";
											}elseif($corrections[$answer_key] == 2){
												$option_status = "has-error";
											}else{
												$option_status = "";
											}
										?>
										
										<div class="option_container form-group col-lg-12">
											<div class="input-group <?php echo $option_status ?>">
												
												<span class="input-group-addon"><input type="radio" name="" disabled="" <?php echo ($option_status == 'has-error') ? "checked" : ""; ?> <?php echo ($option_status == 'has-success') ? "checked" : ""; ?> /></span>
												<div class="form-control"><?php echo $answer_value; ?></div>
												
											</div>
										</div>
										
									<?php endforeach; ?>
								<?php endif; ?>
							<?php endif; ?>

							<?php if($question_value['question_type']=="essay"): ?>
								<?php $question_id = $question_value['question_id']; ?>
								<?php $corrections = $checked_answer_sheet[$question_id]; ?>
								<div class="option_container form-group col-lg-12">
									<div class="input-group">
										<?php if($general_class->session->userdata()['account_type_id']!=5): ?>
											<?php if($corrections->score=="x"): ?>
												<span class="input-group-addon">Set Score: <input type="number" min="0" max="<?php echo $question_value['points']?>" name=""></span>
											<?php else: ?>
												<span class="input-group-addon">Score: <?php echo $corrections->score; ?></span>
											<?php endif; ?>
										<?php else: ?>
											<span class="input-group-addon">Not Scored Yet</span>
										<?php endif; ?>
										<textarea class="form-control" disabled=""></textarea>										
									</div>
								</div>
									
							<?php endif; ?>

							<?php if($question_value['question_type']=="identification"): ?>
								<?php $question_id = $question_value['question_id']; ?>
								<?php $corrections = $checked_answer_sheet[$question_id]; ?>
								<?php $answer = json_decode($attempt['answer_sheet']); ?>
								<?php if(array_key_exists($question_id, $answer)): ?>
								

									<div class="option_container form-group col-lg-12">
										<div class="input-group">
											<div class="option_container form-group col-lg-12">
												<div class="input-group <?php echo ($corrections['status'] == 1) ? "has-success" : "has-error"; ?>">
													
													<span class="input-group-addon">Answer: </span>
													<input type="text" class="form-control" disabled="" value="<?php echo $answer[]?>" />
													<span class="input-group-addon">
													
														<?php echo $corrections['correct']?>
															
													</span>
													
												</div>
											</div>
											
											
										</div>
									</div>
								<?php endif; ?>
									
							<?php endif; ?>



							<!-- IF Multiple Choice -->
							<?php if($question_value['question_type']=="true_or_false"): ?>

								<?php $question_id = $question_value['question_id']; ?>
								<?php $corrections = $checked_answer_sheet[$question_id]; ?>
								
								<div class="option_container form-group col-lg-12">
									<div class="input-group <?php echo ($corrections['answer'] == '1,0') ? "has-success" : ""; ?> <?php echo ($corrections['answer'] == '2,1') ? "has-error" : ""; ?>">
										
										<span class="input-group-addon"><input type="radio" <?php echo ($corrections['answer'] == '1,0') ? "checked" : ""; ?> name="" disabled="" /></span>
										<div class="form-control">True</div>
										
									</div>
								</div>

								<div class="option_container form-group col-lg-12">
									<div class="input-group <?php echo ($corrections['answer'] == '0,1') ? "has-success" : ""; ?> <?php echo ($corrections['answer'] == '1,2') ? "has-error" : ""; ?>">
										
										<span class="input-group-addon"><input type="radio" name="" <?php echo ($corrections['answer'] == '0,1') ? "checked" : ""; ?> disabled="" /></span>
										<div class="form-control">False</div>
										
									</div>
								</div>
							<?php endif; ?>




							<?php if($question_value['question_type']=="matching_type"): ?>
								<?php $question_id = $question_value['question_id']; ?>
								<?php $corrections = $checked_answer_sheet[$question_id]; ?>
								<?php //$corrections['original'] = array(1,0,1,0) ?>
								<?php //print_r($corrections['original']=); ?>
								<?php foreach(explode("||", $question_value['answer']) as $answer_key=>$answer_value): ?>
									<?php 
										if($corrections['correction'][$answer_key] == 1){
											$option_status = "has-success";
										}elseif($corrections['correction'][$answer_key] == 0){
											$option_status = "has-error";
										}else{
											$option_status = "";
										}
									?>

									<div class="option_container form-group col-lg-12">
										<div class="input-group <?php echo $option_status ?>">
											<span class="input-group-addon">
												<?php
													if($corrections['original'][$answer_key] == 0){
														echo number_to_alphabet($corrections['original'][$answer_key]);
													}
													elseif($corrections['original'][$answer_key]){
														echo number_to_alphabet($corrections['original'][$answer_key]);
													}else{
														echo "No Answer";
													}
													
												?>
											</span>
											<div class="form-control"><?php echo $answer_value; ?></div>
											<span class="input-group-addon">
												<?php echo number_to_alphabet($answer_key); ?>
											</span>
											<div class="form-control"><?php echo explode("||",$question_value['question_match'])[$answer_key]; ?></div>
										</div>
									</div>
									
								<?php endforeach; ?>
								
							<?php endif; ?>


							<?php if($question_value['question_type']=="multiple_choice_multiple_answer"): ?>
								<?php $question_id = $question_value['question_id']; ?>
								<?php $corrections = $checked_answer_sheet[$question_id]; ?>
								<!-- <pre> -->
								<?php //print_r(implode(",",$corrections['answer'])); ?>
								<?php //print_r(implode(",",$corrections['correction'])); ?>
								<?php if(implode(",",$corrections['answer'])==implode(",",$corrections['correction'])): ?>
									<?php foreach(explode("||", $question_value['answer']) as $answer_key=>$answer_value): ?>

											<div class="option_container form-group col-lg-6">
												<div class="input-group">
													
													<span class="input-group-addon"><input type="checkbox" disabled="" checked="" /></span>
													<div class="form-control alert-success"><?php echo $answer_value; ?></div>

													
												</div>
											</div>
									<?php endforeach; ?>
								<?php else: ?>
									<div class="multiple_choice_mulitple_answer_option_container col-lg-6">
										<h4>Answer:</h4>
										<?php foreach(explode("||", $question_value['answer']) as $answer_key=>$answer_value): ?>

												<div class="option_container form-group col-lg-12">
													<div class="input-group">
														<?php if($corrections['answer'][$answer_key]==1):?>
															<span class="input-group-addon"><input type="checkbox" disabled="" checked="" /></span>
															<div class="form-control alert-danger"><?php echo $answer_value; ?></div>

														<?php else: ?>
															<span class="input-group-addon"><input type="checkbox" disabled="" /></span>
															<div class="form-control alert-danger"><?php echo $answer_value; ?></div>
														<?php endif; ?>
														
													</div>
												</div>

										<?php endforeach; ?>
									</div>
									<div class="multiple_choice_mulitple_answer_option_container col-lg-6">
										<h4>Correct:</h4>
										<?php foreach(explode("||", $question_value['answer']) as $answer_key=>$answer_value): ?>
											<div class="option_container form-group col-lg-12">
												<div class="input-group">
													<?php if($corrections['correction'][$answer_key]==1):?>
														<span class="input-group-addon"><input type="checkbox" disabled="" checked="" /></span>
														<div class="form-control alert-success"><?php echo $answer_value; ?></div>

													<?php else: ?>
														<span class="input-group-addon"><input type="checkbox" disabled="" /></span>
														<div class="form-control alert-success"><?php echo $answer_value; ?></div>
													<?php endif; ?>
													
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								<?php endif; ?>
								
								
							<?php endif; ?>

						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
	</div>
</form>