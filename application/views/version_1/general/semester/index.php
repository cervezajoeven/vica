<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $datatable = array(
			"th"=>array(
				"Semester",
				"Semester Order",
				"Company",
			),
			"td"=>array(
				"semester",
				"semester_order",
				"company_name",
			),
			"data"=>$data,
		);
	?>
	<?php $general_class->ben_datatable($datatable);?>
</div>