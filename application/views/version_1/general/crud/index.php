<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $datatable = array(
			"th"=>array(
				"Function",
				"Controller",
				"Module",
				"Account Type",
				"Company",
			),
			"td"=>array(
				"action_function",
				"controller",
				"module",
				"account_type_name",
				"company_name",
			),
			"data"=>$data,
		);
	?>
	<?php $general_class->ben_datatable($datatable);?>
</div>