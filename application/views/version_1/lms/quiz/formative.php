<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<div class="col-lg-3">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>"><button id="share" class="form-control btn btn-primary">Share</button></a>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/results/'); ?>"><button id="results" class="form-control btn btn-warning">View Results</button></a>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>"><button id="assign" class="form-control btn btn-success">Assign</button></a>
		</div>
	</div>
	
	<div class="col-lg-3">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/quiz/unassign/'); ?>"><button id="unassign" class="form-control btn btn-danger">Unassign</button></a>
		</div>
	</div>

	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Quiz Name",
				"Subject",
				"Grade",
				"Author",
				"Quarter",
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
				"Subject",
				"Grade",
				"Author",
				"Quarter",
			);
			$td = array(
				"quiz_name",
				"subject_name",
				"grade_name",
				"username",
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
		$("#share").hide();
		$("#assign").hide();
		$("#results").hide();
		$("#unassign").hide();
	});
	function one() {
		$("#share").show();
		$("#assign").show();
		$("#results").show();
		$("#unassign").show();

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/results/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#results").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/assign/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/unassign/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#unassign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+1);
	}
	function many() {
		$("#share").show();
		$("#assign").hide();
		$("#results").hide();
		$("#unassign").hide();
		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+1);
	}
	function all_deselected() {
		$("#share").hide();
		$("#assign").hide();
		$("#results").hide();
		$("#unassign").hide();
	}
</script>