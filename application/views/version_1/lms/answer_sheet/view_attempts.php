<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	
	<div class="col-lg-4">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/results/'); ?>"><button id="results" class="form-control btn btn-warning">Check Result</button></a>
		</div>
	</div>
	

	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Quiz Name",
				"Subject",
				"Grade",
				"Author",
				"Semester",
			);
			$td = array(
				"quiz_name",
				"subject_name",
				"grade_name",
				"username",
				"semester",
			);
		?>
	<?php else: ?>
		<?php 
			$th = array(
				"Quiz Name",
				"Score",
				"Total Score",
				"Completed",
			);
			$td = array(
				"quiz_name",
				"score",
				"total_score",
				"completed",
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
		$("#share").hide();
		$("#assign").hide();
		$("#results").hide();
		
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
	});
	function one() {
		$("#share").show();
		$("#assign").show();
		$("#results").show();

		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();

		var quiz_id_real = "<?php echo $general_class->data['quiz_id']; ?>";

		var the_href = "<?php echo $general_class->ben_link('lms/answer_sheet/answer_sheet/'); ?>";
		var attempt_id = JSON.parse($("#id_storage").val())[0];
		$("#results").parent().attr("href",the_href+quiz_id_real+'/'+attempt_id);

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+1);
	}
	function many() {
		$("#share").show();
		$("#assign").hide();
		$("#results").hide();

		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+1);
	}
	function all_deselected() {
		$("#share").hide();
		$("#assign").hide();
		$("#results").hide();

		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
	}
</script>