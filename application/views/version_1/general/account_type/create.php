<form action="<?php echo $general_class->ben_link('general/'.$general_class->current_page['controller'].'/save')?>" method="post">
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

				<div class="form-group">
					<label for="account_type_name">Account Type Name</label>
					<input type="text" name="account_type_name" class="form-control" required="" placeholder="Module" />
				</div>
				<div class="form-group">
					<label for="company_id">Company</label>
					<select name="company_id" class="form-control" required="" placeholder="Select">
						<option value="">Select Company</option>
						<?php foreach($general_class->data['all_data'] as $all_data_key=>$all_data_value): ?>
							<option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['company_name']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>

	</div>
</form>