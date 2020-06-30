<?php $data = $general_class->data['all_data']; ?>
<form action="<?php echo $general_class->ben_link('general/'.$general_class->current_page['controller'].'/update_save')?>" method="post">
	<div class="brainee-page_container col-lg-12">
		<div class="brainee-page_titlebar">
			<div class="brainee-page_titlebar_title">
				<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
			</div>
			<div class="brainee-page_titlebar_controls_container">
				<a><button type="submit" class="btn btn-success" id="action_add">Done</button></a>
				<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
			</div>
		</div>

		<div class="brainee-page">
			<div class="container">
				<?php $update_data = $general_class->data['update_data']?>
				<input type="hidden" name="<?php echo $general_class->current_page['controller']?>[id]" value="<?php echo $update_data['id'] ?>">
				<?php $field = "company_name" ?>
				<div class="form-group">
					<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
					<input type="text" value="<?php echo $update_data[$field] ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
				</div>

				<?php $field = "company_code" ?>
				<div class="form-group">
					<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
					<input type="text" value="<?php echo $update_data[$field] ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
				</div>
				
				<div class="form-group">
					<label for="account_type_id">Status</label>
					<select name="status" class="form-control" required="" placeholder="Select">
						<option <?php echo ($general_class->data['update_data']['status'] == 1) ? "selected" : "" ?> value="1">Active</option>
						<option <?php echo ($general_class->data['update_data']['status'] == 0) ? "selected" : "" ?> value="0">Inactive</option>
					</select>
				</div>
			</div>
		</div>

	</div>
</form>