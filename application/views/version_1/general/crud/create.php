<form action="<?php echo $general_class->ben_link('general/crud/save')?>" method="post">
	<div class="brainee-page_container col-lg-12">
		<div class="brainee-page_titlebar">
			<div class="brainee-page_titlebar_title">
				<span><?php echo $general_class->page_title ?> (Create)</span>
			</div>
			<div class="brainee-page_titlebar_controls_container">
				<a><button type="submit" class="btn btn-success" id="action_add">Done</button></a>
				<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
			</div>
		</div>

		<div class="brainee-page">
			<div class="container">

				<div class="form-group">
					<label for="module">Module</label>
					<input type="text" name="module" class="form-control" required="" placeholder="Module" />
				</div>
				<div class="form-group">
					<label for="controller">Controller</label>
					<input type="text" name="controller" class="form-control" required="" placeholder="Controller" />
				</div>
				<div class="form-group">
					<label for="action_function">Function</label>
					<input type="text" name="action_function" class="form-control" required="" placeholder="Function" />
				</div>
				<div class="form-group">
					<label for="account_type_id">Account Type</label>
					<select name="account_type_id" class="form-control" required="" placeholder="Select">
						<option value="">Select Account Type</option>
						<?php foreach($general_class->data['all_data'] as $all_account_type_key=>$all_account_type_value): ?>
							<option value="<?php echo $all_account_type_value['main_account_type_id']?>"><?php echo ucwords($all_account_type_value['account_type_name']); ?> - (<?php echo ucwords($all_account_type_value['company_name']); ?>)</option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

	</div>
</form>