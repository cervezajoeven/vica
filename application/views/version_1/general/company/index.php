<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $datatable = array(
			"th"=>array(
				"company_name",
				"company_code",
			),
			"td"=>array(
				"company_name",
				"company_code",
			),
			"data"=>$data,
		);
	?>
	<?php $general_class->ben_datatable($datatable);?>
</div>