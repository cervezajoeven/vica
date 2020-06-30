<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<div class="col-lg-6">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>"><button id="share" class="form-control btn btn-primary">Share</button></a>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/lesson_assign/create/1'); ?>"><button id="assign" class="form-control btn btn-success">Assign</button></a>
		</div>
	</div>
	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Lesson Name",
				"Company Name",
			);
			$td = array(
				"lesson_name",
				"company_name",
			);
		?>
	<?php else: ?>
		<?php 
			$th = array(
				"Subject",
				"Level",
				"Trime",
				"Lesson Name",
			);

			$td = array(
				"subject_name",
				"grade_name",
				"semester_id",
				"lesson_name",
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
		$("#action_add").parent().attr("href","<?php echo $general_class->ben_link('lms/lesson/create/1'); ?>");
	});
	function one() {
		$("#share").show();
		$("#assign").show();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson_assign/create/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+1);
	}
	function many() {
		$("#share").show();
		$("#assign").hide();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+1);
	}
	function all_deselected() {
		$("#share").hide();
		$("#assign").hide();
	}
</script>