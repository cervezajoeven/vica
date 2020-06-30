<?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/save"); ?>
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Add</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">

			<?php $field = "schoolyear" ?>
			<div class="form-group">
				<label for="<?php echo $field?>"><?php echo ucwords(underscore_convert($field))?></label>
				<input type="text" id="<?php echo $field?>" value="" name="<?php echo $general_class->current_page['controller']?>[<?php echo $field?>]" class="form-control" required="" placeholder="<?php echo ucwords(underscore_convert($field))?>" />
			</div>
		</div>
	</div>

</div>
</form>
