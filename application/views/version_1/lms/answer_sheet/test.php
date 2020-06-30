<style type="text/css">
	.instruction{
		border-bottom: 1px solid rgba(200, 200, 200, 1);
    	margin-bottom: 30px;
	}
	.question {
	    margin-bottom: 25px;
	}
	.option_container img {
	    max-width: 200px;
	}
	.option_container{
		height: 80px!important;
	}
	footer {
	    position: fixed;
	    height: 100px;
	    bottom: 0;
	    width: 100%;
	    padding: 20px;
	}
	.footer{
		background-color: #222;
		z-index: 99999;
	}
	.question_container{
		display: none;
		margin-bottom: 100px;
	}
	.question_number {
	    padding: 5px;
	    text-align: center;
	    background-color: #cccccc;
	    border-radius: 10px;
	    margin-bottom: 10px;
	    cursor: pointer;
	    cursor: pointer;
	}
	.question_number:hover {
	    background-color: #222;
	    color: white;
	}
	.active_number{
		background-color: #222;
		color: white;
	}
	.answered_number{
		background-color: #5cb85c;
		color: white;
	}
	.option_container{
		height: auto;
	}
	.question_number_container:last-child{
		margin-bottom: 100px;
	}
</style>
<?php $data = $general_class->data?>
<?php $quiz = $general_class->data['quiz']?>
<?php $attempt = $general_class->data['attempt']?>
<?php $questions_order = json_decode($general_class->data['attempt']['question_order']); ?>

<?php $expiration = date('M d, Y H:i:s', $attempt['expiration']); ?>
<form method="POST" id="submit_the_quiz" action="<?php echo $general_class->ben_link('lms/answer_sheet/submit_quiz'); ?>" >
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1><?php echo $quiz['quiz_name']?></h1>
			</div>
			<input type="hidden" name="id" value="<?php echo $attempt['id']?>">
			<input type="hidden" name="answers" id="answers" value="<?php echo $attempt['id']?>">
			<input type="hidden" name="attempt_id" id="attempt_id" value="<?php echo $attempt['id']?>">
			<input type="hidden" name="expiration_value" id="expiration_value" value="<?php echo $expiration ?>">
			<div id="time" class="pull-right"></div>
			<?php foreach ($questions_order as $questions_order_key => $questions_order_value) : ?>
					<?php $quiz_part_data['id'] = $questions_order_value->quiz_part_id; ?>
					<?php $question_data['id'] = $questions_order_value->question_id; ?>

					<?php $quiz_part = $general_class->quiz_model->ben_get("quiz_part",$quiz_part_data)[0]; ?>
					<?php $question = $general_class->quiz_model->ben_get("question",$question_data)[0]; ?>

					<div class="col-lg-8 question_container">
						<div class="col-lg-12">
							<div class="instruction"><h3><?php echo $quiz_part['quiz_label'] ?></h3></div>
						</div>
						<div class="col-lg-12">

							<div class="question"><h4><?php echo $question['question'] ?></h4></div>
							<div class="col-lg-12" id="question_container_<?php echo $question['id']; ?>" question_id="<?php echo $question['id']; ?>">
								<?php $general_class->test_display_options($question['id']) ?>
							</div>
						</div>
					</div>
			<?php endforeach; ?>

			<div class="col-lg-4">
				<div class="col-lg-12">
					<?php $number_counter = 1; ?>
					<?php foreach ($questions_order as $questions_order_key => $questions_order_value) : ?>
							<div class="col-lg-3 col-md-2 col-sm-3 col-xs-3 question_number_container" >
								<div class="question_number" id="question_numbering_<?php echo $questions_order_value->question_id ?>"><?php echo $questions_order_key+1?></div>
							</div>
							<?php $number_counter++; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="col-lg-12">
			<div class="col-lg-1 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
					<button type="button" class="btn btn-warning form-control" id="back">Back</button>
				</div>
			</div>
			<div class="col-lg-1 col-md-3 col-sm-3 col-xs-3">
				<div class="form-group">
					<button type="button" class="btn btn-success form-control" id="next">Next</button>
				</div>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 pull-right">
				<div class="form-group">
					<button class="btn btn-danger form-control" id="submit">Submit Quiz</button>
				</div>
			</div>
		</div>
	</footer>
</form>
<script src="<?php echo $general_class->ben_resources('lms/lms_answer_sheet_test.js')?>"></script>
<script type="text/javascript">


</script>