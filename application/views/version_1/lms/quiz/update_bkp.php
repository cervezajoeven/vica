<?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/update_save"); ?>
<?php $quiz_data = $general_class->data['quiz_data']; ?>
<?php $subject_data = $general_class->data['subject_data']; ?>
<?php $grade_data = $general_class->data['grade_data']; ?>
<?php $account_data = $general_class->data['account_data']; ?>
<?php $semester_data = $general_class->data['semester_data']; ?>
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
			<input type="hidden" value="<?php echo $quiz_data['id']?>" id="id" name="quiz[id]" />
			<?php $field = "quiz_name" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" value="<?php echo $quiz_data[$field]?>" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>

			<?php $field = "subject_id" ?>
			<?php $field_name = "subject" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
				<select required="" name="<?php echo $general_class->current_page['controller'] ?>[<?php echo $field?>]" class="form-control" required="" placeholder="Select">
					<option value="">Select <?php echo ucfirst($field_name); ?></option>
					<?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['id']?>" <?php if($all_data_value['id'] == $quiz_data[$field]): ?> selected <?php endif; ?> ><?php echo ucwords($all_data_value[$field_name.'_name']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<?php $field = "grade_id" ?>
			<?php $field_name = "grade" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
				<select required="" name="<?php echo $general_class->current_page['controller'] ?>[<?php echo $field?>]" class="form-control" required="" placeholder="Select">
					<option value="">Select <?php echo ucfirst($field_name); ?></option>
					<?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['id']?>" <?php if($all_data_value['id'] == $quiz_data[$field]): ?> selected <?php endif; ?> >Grade <?php echo ucwords($all_data_value[$field_name.'_name']); ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<?php $field = "semester_id" ?>
			<?php $field_name = "semester" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
				<select required="" name="<?php echo $general_class->current_page['controller'] ?>[<?php echo $field?>]" class="form-control" required="" placeholder="Select">
					<option value="">Select <?php echo ucfirst($field_name); ?></option>
					<?php foreach($general_class->data[$field_name.'_data'] as $all_data_key=>$all_data_value): ?>
						<option value="<?php echo $all_data_value['id']?>" <?php if($all_data_value['id'] == $quiz_data[$field]): ?> selected <?php endif; ?> ><?php echo ucwords($all_data_value[$field_name]); ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<?php $field = "quiz_type" ?>
			<?php $field_name = "quiz type" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucfirst($field_name); ?></label>
				<select required="" name="<?php echo $general_class->current_page['controller'] ?>[<?php echo $field?>]" class="form-control" required="" placeholder="Select">
					<option value="">Select <?php echo ucfirst($field_name); ?></option>
					<option value="mastery_test" <?php if("mastery_test" == $quiz_data[$field]): ?> selected <?php endif; ?> >Mastery Test</option>
					<option value="quiz" <?php if("quiz" == $quiz_data[$field]): ?> selected <?php endif; ?> >Quiz</option>
					<option value="formative_test" <?php if("formative_test" == $quiz_data[$field]): ?> selected <?php endif; ?> >Formative Test</option>
				</select>
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