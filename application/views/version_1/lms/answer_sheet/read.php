<style type="text/css">
	.instruction{
		border-bottom: 1px solid rgba(200, 200, 200, 1);
    	margin-bottom: 30px;
	}
	.question {
	    margin-bottom: 25px;
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
	}
	.question_container{
		display: none;
	}
	.question_number {
	    padding: 5px;
	    text-align: center;
	    background-color: #cccccc;
	    border-radius: 10px;
	    margin-bottom: 10px;
	    cursor: pointer;
	}
	.question_number:hover {
	    background-color: #5cb85c;
	}
	.active_number{
		background-color: #5cb85c;
	}
</style>
<?php $data = $general_class->data?>
<?php $questions = $general_class->data['questions']?>
<?php $quiz_parts = $general_class->data['quiz_parts']?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1>Quiz Name</h1>
		</div>
		
		<?php foreach ($questions as $question_key => $question_value) : ?>
			<?php foreach ($question_value as $question_value_key => $question_value_value) : ?>

				<div class="col-lg-8 question_container">
					<div class="col-lg-12">
						<div class="instruction"><h3><?php echo $quiz_parts[$question_key]['quiz_label'] ?></h3></div>
					</div>
					<div class="col-lg-12">
						<div class="question">
							<h4><?php echo $question_value_value['question'] ?></h4>
						</div>
						<div class="col-lg-12">
							<?php $general_class->display_options($question_value_value['options'],$question_value[$question_key]) ?>			
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endforeach; ?>

		<div class="col-lg-4">
			<div class="col-lg-12">
				<?php $number_counter = 1; ?>
				<?php foreach ($questions as $question_key => $question_value) : ?>
					<?php foreach ($question_value as $question_value_key => $question_value_value) : ?>
						<div class="col-xs-3 question_number_container">
							<div class="question_number"><?php echo $number_counter?></div>
						</div>
						<?php $number_counter++; ?>
					<?php endforeach; ?>
				<?php endforeach; ?>
			</div>
		</div>

	</div>
</div>
<footer class="footer">
	<div class="col-lg-12">
		<div class="col-lg-1">
			<div class="form-group">
				<button class="btn btn-warning form-control" id="back">Back</button>
			</div>
		</div>
		<div class="col-lg-1">
			<div class="form-group">
				<button class="btn btn-success form-control" id="next">Next</button>
			</div>
		</div>
		<div class="col-lg-2">
			<div class="form-group">
				<!-- <button class="btn btn-danger form-control" id="submit">Submit Quiz</button> -->
			</div>
		</div>
	</div>
</footer>

<script type="text/javascript">
	$(document).ready(function(){
		var current_question = 0;
		var question_limit = $(".question_container").length;
		$(".question_container").eq(0).show();
		$(".question_number_container").eq(0).find(".question_number").addClass("active_number");

		$("#next").click(function(){
			$(".question_container").eq(current_question).hide();
			$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
			if(current_question<question_limit){
				current_question = current_question+1;
			}
			
			$(".question_container").eq(current_question).show();
			$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");

		});

		$(".question_number").click(function(){
			$(".question_container").eq(current_question).hide();
			$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
			current_question = $(this).parent().index();
			$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");
			$(".question_container").eq(current_question).show();
		});

		$("#back").click(function(){
			$(".question_container").eq(current_question).hide();
			$(".question_number_container").eq(current_question).find(".question_number").removeClass("active_number");
			if(current_question>0){
				current_question = current_question-1;
			}
			
			$(".question_container").eq(current_question).show();
			$(".question_number_container").eq(current_question).find(".question_number").addClass("active_number");

		});

	});
</script>