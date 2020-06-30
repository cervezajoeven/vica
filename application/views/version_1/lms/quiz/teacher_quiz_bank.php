<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<div class="col-lg-12">
		<div class="form-group">
			<select class="form-control" id="quiz_type">
				<option value="mastery_test" <?php if($general_class->data['quiz_type']=="mastery_test"): ?> selected <?php endif; ?> >Mastery</option>
				<option value="quiz" <?php if($general_class->data['quiz_type']=="quiz"): ?> selected <?php endif; ?> >Quiz</option>
				<option value="formative_test" <?php if($general_class->data['quiz_type']=="formative_test"): ?> selected <?php endif; ?> >Formative</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<a><button id="share" class="form-control btn btn-danger">Unshare</button></a>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<a><button id="import" class="form-control btn btn-success">Import</button></a>
		</div>
	</div>

	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Quiz Name",
				"Subject",
				"Grade",
				"Quiz Type",
				"Author",
				"Semester",
			);
			$td = array(
				"quiz_name",
				"subject_name",
				"quiz_type",
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
	$("#quiz_type").change(function(){
		var quiz_type = $(this).val();
		var redirect_url = "<?php echo $general_class->ben_link('lms/quiz/teacher_quiz_bank/'); ?>"+quiz_type;
		window.location.replace(redirect_url);
	});
	$(document).ready(function(){
		$("#share").hide();
		$("#import").hide();
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
	});
	
	function one() {
		$("#share").show();
		$("#import").show();
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val())[0];
		$("#share").parent().attr("href",the_href+quiz_id+"/"+0);
	}
	function many() {
		$("#share").show();
		$("#import").hide();
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();

		var the_href = "<?php echo $general_class->ben_link('lms/quiz/share/'); ?>";
		var quiz_id = JSON.parse($("#id_storage").val());
		$("#share").parent().attr("href",the_href+quiz_id.join("%2C")+"/"+0);
	}
	function all_deselected() {
		$("#share").hide();
		$("#import").hide();
		$("#action_add").hide();
		$("#action_update").hide();
		$("#action_view").hide();
		$("#action_delete").hide();
	}
</script>