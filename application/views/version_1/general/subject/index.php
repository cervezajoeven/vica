<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php if($general_class->session->userdata('company_id') == 1): ?>
		<?php 
			$th = array(
				"Subject Name",
				"Company Name",
			);
			$td = array(
				"subject_name",
				"company_name",
			);
		?>
	<?php else: ?>
		<?php 
			$th = array(
				"Subject Name",
			);

			$td = array(
				"subject_name",
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