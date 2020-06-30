<form id="titlebar_form" action="" method="POST" >
	<input type="hidden" name="id_storage" id="id_storage">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?></span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<?php $module_controller = $page_structure['module']."/".$page_structure['controller']."/"?>

			<?php 
				$parameter_string['create'] = "";
				$parameter_string['read'] = "";
				$parameter_string['update'] = "";
				$parameter_string['delete'] = "";
			?>
			<?php if(!empty($parameters)){
				
				foreach ($parameters as $parameters_key => $parameters_value) {
					$parameter_string[$parameters_key] .= $parameters_value."/";
				}
				
			}?>
			<?php if($accesses_array): ?>
				
				<?php if(in_array($module_controller."create", $accesses_array)): ?>
					<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/create/<?php echo $parameter_string['create']?>"><button class="btn btn-success" type="button" id="action_add">Add</button></a>
				<?php endif;?>
				<?php if(in_array($module_controller."read", $accesses_array)): ?>
					<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/read/<?php echo $parameter_string['create']?>"><button class="btn btn-primary" id="action_view">View</button></a>
				<?php endif;?>

				<?php if(in_array($module_controller."update", $accesses_array)): ?>
					<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/update/<?php echo $parameter_string['create']?>"><button class="btn btn-warning" id="action_update">Update</button></a>
				<?php endif;?>

				<?php if(in_array($module_controller."delete", $accesses_array)): ?>
					<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.strtolower($general_class->view_folder)); ?>/delete/<?php echo $parameter_string['create']?>"><button class="btn btn-danger" id="action_delete">Delete</button></a>
				<?php endif;?>
				
			<?php endif;?>

		</div>
	</div>
</form>