<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
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