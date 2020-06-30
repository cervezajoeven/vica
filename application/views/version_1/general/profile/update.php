<?php $views_data = $general_class->data; ?>
<?php $profile_data = $views_data['profile_data'][0]; ?>
<?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/update_save/".$general_class->data['account_id']."/".$profile_data['id']); ?>
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Next</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower('account')); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>
	
	<div class="brainee-page">
		<div class="container">
			<?php $field = "first_name" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" id="<?php echo $field?>" value="<?php echo $profile_data[$field]; ?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "middle_name" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" value="<?php echo $profile_data[$field]; ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>
			
			<?php $field = "last_name" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" value="<?php echo $profile_data[$field]; ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "address" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" value="<?php echo $profile_data[$field]; ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "email_address" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="email" value="<?php echo $profile_data[$field]; ?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control"  placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "contact_number" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="number" value="<?php echo $profile_data[$field]; ?>" id="<?php echo $field?>" min="1" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

		</div>
	</div>

</div>
</form>