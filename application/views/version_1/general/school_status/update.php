<?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/save"); ?>
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Next</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">
			<?php $field = "username" ?>
			<?php if(array_key_exists('update_data', $general_class->data)){$value = $general_class->data['update_data'];}else{$value="";}
			?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" id="<?php echo $field?>" value="<?php echo $value[$field]?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>
			<?php $field = "password" ?>
			<?php if(array_key_exists('update_data', $general_class->data)){$value = $general_class->data['update_data'];}else{$value="";}
			?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="password" id="<?php echo $field?>" value="<?php echo $value[$field]?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="account[confirm_password]" id="confirm_password" class="form-control" required="" placeholder="Confirm Password" />
			</div>
			
			<div class="form-group">
				<label for="account_type_id">Account Type</label>
				<select name="account[account_type_id]" class="form-control" required="" placeholder="Select">
					<option value="">Select Account Type</option>
					<?php foreach($general_class->data['all_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['main_account_type_id']?>"><?php echo ucwords($all_data_value['account_type_name']); ?> - (<?php echo ucwords($all_data_value['company_name']); ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
	</div>

</div>
</form>
<script type="text/javascript">
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Password and Confirm Password does not match.");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>