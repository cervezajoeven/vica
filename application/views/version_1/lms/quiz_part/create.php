<?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Save</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.$general_class->current_page['controller']); ?>/index/<?php echo $general_class->data['quiz_id']; ?>"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">
			<?php $field = "quiz_label" ?>
			<input type="hidden" value="<?php echo $general_class->data['quiz_id']; ?>" name="<?php echo $general_class->current_page['controller'] ?>[quiz_id]">
			<div class="form-group">
				<label for="<?php echo $field?>">Section Name</label>
				<textarea type="text" id="<?php echo $field?>" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="Section Name" ></textarea>	
			</div>
			<?php if(!empty($general_class->data['quiz_part_data'])): ?>
				<?php $field = "quiz_order" ?>
				<?php $field_name = "quiz order" ?>
				<div class="form-group">
					<label for="<?php echo $field?>">Place Before (Not assigning a placement order will automatically be added at the end of the part order)</label>
					<select name="<?php echo $general_class->current_page['controller'] ?>[<?php echo $field?>]" class="form-control" placeholder="Select">
						<option value="">Select Placement</option>
						<?php foreach($general_class->data['quiz_part_data'] as $all_data_key=>$all_data_value): ?>
							<option value="<?php echo $all_data_value['id']?>"><?php echo ucwords($all_data_value['quiz_label']); ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			<?php endif; ?>

		</div>
	</div>

</div>
</form>