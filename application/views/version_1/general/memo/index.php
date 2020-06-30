<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $datatable = array(
			"th"=>array(
				"Memo File Name",
			),
			"td"=>array(
				"memo_url",
			),
			"data"=>$data,
		);
	?>
	<?php $general_class->ben_datatable($datatable);?>
</div>