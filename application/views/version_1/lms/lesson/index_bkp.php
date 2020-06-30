<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<div class="col-lg-4">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>"><button id="share" class="form-control btn btn-primary">Share</button></a>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/lesson_assign/create/'); ?>"><button id="assign" class="form-control btn btn-success">Assign</button></a>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/lesson/slideshow/'); ?>"><button id="slideshow" class="form-control btn btn-warning">Update</button></a>
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
				"Quarter",
				"Level",
				"Lesson/Topic",
			);

			$td = array(
				"subject_name",
				"semester_id",
				"grade_name",
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
		$("#slideshow").hide();
	});
	function one() {
		$("#share").show();
		$("#assign").show();
		$("#slideshow").show();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson_assign/create/'); ?>";
		var slideshow = "<?php echo $general_class->ben_link('lms/lesson/slideshow/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);
		$("#slideshow").parent().attr("href",slideshow+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+1);
	}
	function many() {
		$("#share").show();
		$("#assign").hide();
		$("#slideshow").hide();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+1);
	}
	function all_deselected() {
		$("#share").hide();
		$("#assign").hide();
	}
</script>