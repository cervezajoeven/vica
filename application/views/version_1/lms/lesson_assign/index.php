<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
		<?php 
			$th = array(
				"Lesson Name",
				"Start Date",
				"End Date",
			);
			$td = array(
				"lesson_name",
				"start_date",
				"end_date",
			);
		?>

	<?php $datatable = array(
			"th"=>$th,
			"td"=>$td,
			"data"=>$data,
		);
	?>
	
	<?php $general_class->ben_datatable($datatable);?>
	<div class="form-group">
		<a href="<?php echo $general_class->ben_link('lms/lesson/upload/'.$general_class->data['lesson_id'].'/1'); ?>"><button class="form-control btn btn-danger">Cancel</button></a>
	</div>
</div>
<script type="text/javascript">
	var href = $("#action_add").parent().attr("href")+"<?php echo $general_class->data['lesson_id'] ?>";
	$("#action_add").parent().attr("href",href);
	//$("#action_update").on("click", function(e){
        // $('#titlebar_form').attr('action', "<?php echo $general_class->ben_link('lms/lesson_assign/update/'.$general_class->data['lesson_id']); ?>");
        // $('#titlebar_form').attr('action', "asdasd");
    //});
    $("#titlebar_form").submit(function(e){
        // $('#titlebar_form').attr('action', "<?php echo $general_class->ben_link('lms/lesson_assign/update/'.$general_class->data['lesson_id']); ?>");
        $('#titlebar_form').attr('action', "<?php echo $general_class->ben_link('lms/lesson_assign/update/'.$general_class->data['lesson_id']); ?>");
    });
    // $("#titlebar_form").on("click", function(e){
    //     e.preventDefault();
    //     $('#titlebar_form').attr('action', "<?php echo $general_class->ben_link('lms/lesson_assign/update/'.$general_class->data['lesson_id']); ?>").submit();
    // });
</script>