<div class="brainee-page_container col-lg-12">
	<?php $general_class->ben_titlebar();?>
	<?php $data = $general_class->data; ?>
	<?php 
		if(count($data['school_status_data'])){
			$form_action = $general_class->ben_link('general/school_status/update_save/'.$data['school_status_data'][0]['company_owner']);
		}else{
			$form_action = $general_class->ben_link('general/school_status/save');
		}
	?>
	<form method="POST" action="<?php echo $form_action; ?>" >
		
		<?php if(!count($data['school_status_data'])): ?>
			<div class="form-group">
				<label>Current School Year Status: </label>
				<select class="form-control" name="schoolyear_id">
					<?php foreach(array_reverse($data['schoolyear_data']) as $schoolyear_key=>$schoolyear): ?>
						<option value="<?php echo $schoolyear['id'] ?>"><?php echo $schoolyear['schoolyear'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Current Semester Status:</label>
				<select class="form-control" name="semester_id">
					<?php foreach(array_reverse($data['semester_data']) as $semester_key=>$semester): ?>
						<option value="<?php echo $semester['id'] ?>"><?php echo $semester['semester'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<?php else: ?>
			<input type="hidden" name="id" value="<?php echo $data['school_status_data'][0]['id'] ?>">
			<div class="form-group">
				<label>Current School Year Status: </label>
				<select class="form-control" name="schoolyear_id">
					<?php foreach(array_reverse($data['schoolyear_data']) as $schoolyear_key=>$schoolyear): ?>
						<option <?php if($schoolyear['id']==$data['school_status_data'][0]['schoolyear_id']): ?> selected <?php endif; ?> value="<?php echo $schoolyear['id'] ?>"><?php echo $schoolyear['schoolyear'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label>Current Semester Status:</label>
				<select class="form-control" name="semester_id">
					<?php foreach(array_reverse($data['semester_data']) as $semester_key=>$semester): ?>
						<option <?php if($semester['id']==$data['school_status_data'][0]['semester_id']): ?> selected <?php endif; ?> value="<?php echo $semester['id'] ?>"><?php echo $semester['semester'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		<?php endif;?>


		<div class="form-group">
			<input type="submit" class="form-control btn btn-success" name="" value="Update Status" />
		</div>
	</form>
	
</div>