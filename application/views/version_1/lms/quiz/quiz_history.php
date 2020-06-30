<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>

	<div class="col-lg-12">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/answer_sheet/read/'); ?>"><button id="view_answer_sheet" class="form-control btn btn-primary">Review Answers</button></a>
		</div>
	</div>
	
	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Quiz Name",
			);
			$td = array(
				"quiz_name",
			);
		?>
	<?php else: ?>
		<?php 
			$th = array(
				"Quiz Name",
				"Score",
				"Total Score",
				"Percentage",
				"Semester",
			);
			$td = array(
				"quiz_name",
				"score",
				"total_score",
				"percentage",
				"semester",
			);
		?>
	<?php endif; ?>

	<?php $datatable = array(
			"th"=>$th,
			"td"=>$td,
			"data"=>$data,
		);
	?>
	
	<?php $general_class->ben_datatable($datatable);?>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#assign").hide();
		$("#action_view").hide();
		$("#view_answer_sheet").hide();
	});
	function one() {
		$("#assign").show();
		$("#view_answer_sheet").show();
		var the_href = "<?php echo $general_class->ben_link('lms/answer_sheet/attempt/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/answer_sheet/answer_sheet/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#view_answer_sheet").parent().attr("href",the_href+quiz_id);

		$("#action_view").hide();
	}
	function many() {
		$("#assign").hide();
		$("#view_answer_sheet").hide();
		$("#action_view").hide();
	}
	function all_deselected() {
		$("#assign").hide();
		$("#view_answer_sheet").hide();
		$("#action_view").hide();
	}
</script>