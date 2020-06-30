<form action="<?php echo $general_class->ben_link('general/'.$general_class->current_page['controller'].'/save'); ?>" method="POST" enctype="multipart/form-data" >
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Next</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.$general_class->current_page['controller']); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">

			<?php $field = "announcement_title" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" min="1" id="<?php echo $field?>" name="<?php echo $field?>" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "announcement_content" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<textarea type="number" min="1" id="<?php echo $field?>" name="<?php echo $field?>" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" ></textarea>
			</div>

			<?php if($general_class->session->userdata('company_id') == 1): ?>
				<?php $field = "company_name" ?>
				<div class="form-group">
					<label for="company_id">Company</label>
					<select name="subject[company_id]" class="form-control" required="" placeholder="Select">
						<option value="">Select Company</option>
						<?php foreach($general_class->data['company_data'] as $all_data_key=>$all_data_value): ?>
							<option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<?php $field = "company_owner" ?>
					<label for="<?php echo $field?>">Company Owner</label>
					<select name="subject[<?php echo $field?>]" class="form-control" required="" placeholder="Select">
						<option value="">Select <?php echo underscore_convert(ucwords($field)); ?></option>
						<?php foreach($general_class->data['company_data'] as $all_data_key=>$all_data_value): ?>
							<option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>

			<?php else: ?>

			<?php endif;?>
			

		</div>
	</div>

</div>
</form>