<?php $views_data = $general_class->data; ?>
<?php echo $general_class->ben_open_form("general/account/update_save/"); ?>
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
			<input type="hidden" name="account[id]" value="<?php echo $value['id']?>" />
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" id="<?php echo $field?>" value="<?php echo $value[$field]?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<div class="form-group">
				<label for="account_type_id">Account Type</label>
				<select name="account[account_type_id]" class="form-control" required="" placeholder="Select">
					<option value="">Select Account Type</option>
					<?php foreach($general_class->data['all_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['main_account_type_id']?>" <?php if($all_data_value['main_account_type_id']==$value['account_type_id']): echo "selected"; endif;?> ><?php echo ucwords($all_data_value['account_type_name']); ?> - (<?php echo ucwords($all_data_value['company_name']); ?>)</option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="form-group">
				<label for="account_type_id">Password Reset</label>
				<!-- <a href="<?php echo $general_class->ben_link('general/account/reset/'.$value['id']); ?>"> -->
					<button type="button" id="reset_password" class="form-control btn btn-warning">Reset Password </button>
				<!-- </a> -->
			</div>

			<div id="reset_modal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Notice</h4>
						</div>
						<div class="modal-body">
							<div id="alert_content" class="alert btn-warning">
								Are you sure you want to reset this user's password?
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="button" id="reset_confirm" class="btn btn-warning">Confirm</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
</form>
<script type="text/javascript">
	$("#reset_password").click(function(){
		var type="warning";
		$("#reset_modal").modal();
	});
	$("#reset_confirm").click(function(){
		var reset_url = "<?php echo $general_class->ben_link('general/account/reset/'.$value['id']); ?>";
        window.location.replace(reset_url);
    });
</script>