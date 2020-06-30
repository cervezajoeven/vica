<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<div class="col-lg-6">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/lesson/share/'); ?>"><button id="share" class="form-control btn btn-danger">Unshare</button></a>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="form-group">
			<a href="<?php echo $general_class->ben_link('lms/lesson/import/'); ?>"><button id="assign" class="form-control btn btn-primary">Import</button></a>
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
				"Lesson Name",
				"Subject Name",
				"Grade Name",
			);

			$td = array(
				"lesson_name",
				"subject_name",
				"grade_name",
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
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
	});
	function one() {
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
		$("#share").show();
		$("#assign").show();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson/import/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#assign").parent().attr("href",the_href+quiz_id);

		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+0);
	}
	function many() {
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
		$("#share").show();
		$("#assign").hide();
		var the_href = "<?php echo $general_class->ben_link('lms/lesson/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+0);
	}
	function all_deselected() {
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
		$("#share").hide();
		$("#assign").hide();
	}
</script>