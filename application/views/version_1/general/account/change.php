<?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/change_save"); ?>
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
				<!-- <?php print_r($general_class->data['update_data']['id'])?> -->
				<input type="hidden" name="account[id]" id="id" class="form-control" value="<?php echo $general_class->data['update_data']['id']?>" required="" placeholder="" />
			<div class="form-group">
				<label for="password">Current Password</label>
				<input type="password" name="account[current_password]" id="current_password" class="form-control" required="" placeholder="Password" />
			</div>

			<div class="form-group">
				<label for="password">New Password</label>
				<input type="password" name="account[password]" id="password" class="form-control" required="" placeholder="Password" />
			</div>
			<div class="form-group">
				<label for="confirm_password">Confirm New Password</label>
				<input type="password" name="account[confirm_password]" id="confirm_password" class="form-control" required="" placeholder="Confirm Password" />
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