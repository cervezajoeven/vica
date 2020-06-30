<style type="text/css">
	.col-lg-12.brainee-label{
		background-color: #222222;
	    color: white;
	    padding: 10px;
	}
	.brainee-label_parts {
	    display: inline;
	}
	.brainee-part_label {
	    font-size: 16px;
	}
	.brainee-part_toggle {
	    width: auto;
	    font-size: 24px;
	}
	.brainee-label_updown{
		width: 160px;
		padding: 0px;
	}
	.brainee-question_container{
		background-color: #cacaca;
	}
	.brainee-question_container{
	    padding: 15px;
	    padding-bottom: 5px;
	}
	.brainee-question {
	    font-size: 15px;
	}
	.brainee-choices {
	    padding-left: 30px;
	    padding-top: 5px;
	    font-size: 13px;
	    line-height: 10px;
	}
	.brainee-page_container{
		margin-bottom: 30px; 
	}
	.brainee-choice_match_match {
	    display: inline-block;
	    min-width: 100px;
	}
	.brainee-choice_match_choices{
		display: inline-block;
		width: 200px;
	}
	.brainee-choice_match_answer{
		display: inline;
	}
	.brainee-choices textarea{
		width: 80%;
		height: 100px;
	}
	.label_rename {
	    color: black;
	    font-size: 12px;
	    width: 45%;
	    display: inline;
	}
	button.label_rename_button {
	    position: relative;
	    top: -18px;
	    display: inline-block;
	    color: white;
	    background-color: #5cb85c;
	    border: none;
	    padding: 6px;
	}
	.edit_label{
		cursor: pointer;
	}
	.delete_label{
		cursor: pointer;
	}
	a {
	    text-decoration: none;
	    text-decoration-color: white;
	    color: white;
	}
	.fa-arrow-down{
		font-size: 15px;
		cursor: pointer;
	}
	.fa-arrow-down:hover{
		color:#5cb85c;
	}
	.fa-arrow-up{ 
		font-size: 15px;
		cursor: pointer;
	}
	.fa-arrow-up:hover{
		color:#5cb85c;
	}
	.brainee-part_toggle{
		cursor: pointer;
	}
	.place_before {
	    color: black;
	    width: 100%;
	    padding: 0px;
	    height: 18px;
	    cursor: pointer;
	}
	.place_before option{
	    cursor: pointer;
	}
	.randomize_input{
		cursor: pointer;
	}
	.question{
		width: 80%;
	}
	.option_title{
		font-size: 20px;
	}
	.option_container{
		border-top: 1px solid #888;
    	margin-top: 20px;
    	display: none;
	}
	.per_question_container {
	    padding: 10px;
	    border: 2px solid #999;
	    margin-bottom: 30px;
	}
	.toggle_answers{
		cursor: pointer;
	}
	.increase{
		font-size: 20px;
		color: 	#6f6f6f;
	}
	.increase:hover{
		color: 	#222;
	}
	.mce-notification{
		display: none;
	}
</style>

<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar(array("create"=>$general_class->data['quiz_id']));?>
	<center><h3><i class="fas fa-pen-fancy"></i> <b><?php echo ($general_class->data['quiz_data']['quiz_name']);?></b></h3></center>
	<?php $quiz_parts = $general_class->data['all_data']; ?>

	<?php foreach($quiz_parts as $quiz_parts_key=>$quiz_parts_value): ?>
		
			<div class="col-lg-12 brainee-label">
				<div class="col-lg-1 brainee-label_parts brainee-part_toggle"><i class="fas fa-window-minimize window-toggle"></i></div>
				<form action="<?php echo $general_class->ben_link('lms/quiz_part/modify_part') ?>" class="brainee-label_form" method="POST">
					<input type="hidden" name="id" value="<?php echo $quiz_parts_value['id']; ?>">
					<input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']; ?>">
					<div class="col-lg-7 brainee-label_parts brainee-part_label">
						<textarea name="quiz_label" class="label_rename form-control" id="" placeholder="<?php echo $quiz_parts_value['quiz_label'] ?>"><?php echo $quiz_parts_value['quiz_label'] ?></textarea>
						<button type="submit" class="label_rename_button btn btn-success">Save</button>
						<span><?php echo roman_numeral($quiz_parts_key+1); ?>. <?php echo $quiz_parts_value['quiz_label'] ?></span>
						<i class="fas fa-pencil-alt edit_label"></i>
						<a href="<?php echo $general_class->ben_link('lms/quiz_part/delete_by_id/'.$quiz_parts_value['id'].'/'.$general_class->data['quiz_id']); ?>"><i class="far fa-trash-alt delete_label"></i></a>
					</div>

				</form>

				<div class="col-lg-1 brainee-label_parts brainee-label_updown">
					<input type="checkbox" class="randomize_input" />
					<span>Randomize Question</span>
				</div>
				<div class="col-lg-2">
					<?php if(count($quiz_parts)!=1):?>
						<div class="col-lg-8">
							<center>
								<a href="<?php echo $general_class->ben_link('lms/quiz_part/reorder/down/'.$quiz_parts_value['id'].'/'.$general_class->data['quiz_id']) ?>"><i class="fas fa-arrow-down"></i></a>
								<a href="<?php echo $general_class->ben_link('lms/quiz_part/reorder/up/'.$quiz_parts_value['id'].'/'.$general_class->data['quiz_id']) ?>"><i class="fas fa-arrow-up"></i></a>
								<form action="<?php echo $general_class->ben_link('lms/quiz_part/interchange') ?>" class="interchange_form" method="POST">
									<input type="hidden" name="quiz_id" value="<?php echo $general_class->data['quiz_id']?>" />
									<input type="hidden" name="selected_quiz_part_id" value="<?php echo $quiz_parts_value['id']?>" />
									<select class="place_before form-control" name="target_quiz_part_id">
										<option selected="">Switch</option>
										<?php foreach($quiz_parts as $quiz_parts_option_key=>$quiz_parts_option_value): ?>
											<?php if($quiz_parts_option_key!=$quiz_parts_key): ?>
												<option value="<?php echo $quiz_parts_option_value['id'] ?>"><?php echo roman_numeral($quiz_parts_option_key+1); ?></option>
											<?php endif;?>
										<?php endforeach; ?>
									</select>
								</form>
							</center>
						</div>
					<?php endif; ?>
					<div class="col-lg-4">
						<center>
							<a href="<?php echo $general_class->ben_link('lms/question/index/'.$general_class->data['quiz_id'].'/'.$quiz_parts_value['id']); ?>">
								<input type="button" value="Add Question" class="btn btn-success" />
							</a>
						</center>
					</div>				
				</div>
			</div>
		
		<?php $questions = $general_class->quiz_part_model->all_questions_by_quiz_part_id($quiz_parts_value['id']); ?>
		<div class="col-lg-12 brainee-question_container">
			<?php foreach($questions as $questions_key=>$questions_value): ?>
				<div class="per_question_container">
					
					<div class="brainee-question">
						<?php echo $questions_key+1?>. Question: 
						<a href="<?php echo $general_class->ben_link('lms/question/update_'.$questions_value['question_type'].'/'.$general_class->data['quiz_id'].'/'.$questions_value['quiz_part_id'].'/'.$questions_value['id']); ?>"><i class="fas fa-pencil-alt edit_label increase"></i></a> 
						<a href="<?php echo $general_class->ben_link('lms/question/delete/'.$questions_value['id'].'/'.$general_class->data['quiz_id']); ?>"><i class="far fa-trash-alt edit_label increase"></i></a>
						<i class="fas fa-plus-square toggle_answers increase"></i>
						<div class="question">
							<textarea class="joeven_is_awesome" cols="1"><?php echo $questions_value['question']; ?></textarea>
						</div>
					</div>
					<div class="option_container">
						<div class="option_title">Answers: </div>
						<?php $general_class->display_html_question($questions_value); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		
	<?php endforeach; ?>

</div>


<script>
tinymce.init({ 
	selector:'.joeven_is_awesome',
	toolbar:false,
	readonly:true
});
</script>

<script type="text/javascript">



$(document).ready(function(){

	$(".label_rename").hide();
	$(".label_rename_button").hide();
});
$('.place_before').change(function(){
	$(this).parent().submit();
});
$('.edit_label').click(function(){
	var label_index = $(this).parents('.brainee-label_form').index();
	$(this).siblings('.label_rename').toggle();
	$(this).siblings('.label_rename_button').toggle();
	$(this).siblings('span').toggle();
});

$('.toggle_answers').click(function(){
	var label_index = $(this).parent().siblings('.option_container').slideToggle( "fast", function() {});
	// if($(this).hasClass('fa-window-maximize')){
	// 	$(this).removeClass('fa-window-maximize');
	// 	$(this).addClass('fa-window-minimize');
	// }else{
	// 	$(this).removeClass('fa-window-minimize');
	// 	$(this).addClass('fa-window-maximize');
	// }
	// label_index = (label_index/2)-1;
	// $(".brainee-question_container").index();
	// $(".brainee-question_container").eq(label_index).toggle();
});

$('.window-toggle').click(function(){
	var label_index = $(this).parents('.brainee-label').index();
	if($(this).hasClass('fa-window-maximize')){
		$(this).removeClass('fa-window-maximize');
		$(this).addClass('fa-window-minimize');
	}else{
		$(this).removeClass('fa-window-minimize');
		$(this).addClass('fa-window-maximize');
	}
	label_index = (label_index/2)-1;
	$(".brainee-question_container").index();
	$(".brainee-question_container").eq(label_index).slideToggle( "slow", function() {});
});
$(".brainee-question_container").click(function(){
	console.log($(this).index());
});
</script>