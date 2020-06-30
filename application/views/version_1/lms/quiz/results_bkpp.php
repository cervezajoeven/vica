<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	
	<div class="form-group">
		<?php //print_r($data['grade_section']); ?>
		<label>Select Section</label>
		<select id="section_id" class="form-control">
			<?php foreach ($data['grade_section'] as $key => $value): ?>
				<option value="<?php echo $value['id']; ?>"><?php echo $value['section_name']; ?> (Grade <?php echo $value['grade_name']; ?>)</option>
			<?php endforeach ?>
		</select>
	</div>

	<div class="col-lg-12">
		<div class="form-group">
			<a id="view_overall" href="<?php echo $general_class->ben_link('lms/quiz/results/'); ?>"><button id="results" type="button" class="form-control btn btn-warning">View Section Result</button></a>
		</div>
	</div>
	
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#section_id").change(function(){
			var section_id = $(this).val();
			var link = "<?php echo $general_class->ben_link('lms/quiz/overall_result/'); ?><?php echo $data['quiz_id'] ?>/"+section_id;
			$("#view_overall").attr("href",link);

		});
	});
</script>