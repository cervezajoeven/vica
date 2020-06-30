<?php $data = $general_class->data; ?>
<?php $lesson_assign_data = $data['lesson_assign_data'][0]; ?>
<?php $account_ids = explode(",", $lesson_assign_data['account_ids']); ?>
<?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/update_save/".$data['lesson_id']."/".$data['lesson_assign_id']); ?>

<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<!-- <a><button type="submit" class="btn btn-success" id="action_add">Update</button></a> -->
			<a href="<?php echo $general_class->ben_link('lms/'.$general_class->current_page['controller']."/index/".$data['lesson_id']); ?>"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
			<input type="hidden" name="lesson_id" value="<?php echo $data['lesson_id']; ?>" />
			<div id="jstree_demo_div">
				<ul>
					<?php foreach ($data['grades'] as $grade_key => $grade): ?>
						<li>Grade <?php echo $grade['grade_name']; ?>
					        <ul>
					        	<?php foreach ($data['sections'] as $section_key => $section): ?>
					        		<?php if($section['grade_id']==$grade['id']): ?>
							          	<li><?php echo $section['section_name'] ?>
					        				
							          		<ul>
							          			<?php foreach ($data['classes'] as $class_key => $class): ?>
							          				<?php if($section['id']==$class['section_id']): ?>
										          		<li <?php if(in_array($class['id'], $account_ids)): ?>data-checkstate="checked"<?php endif;?> data-jstree='{"value":<?php echo $class['id'];?>'><?php echo $class['first_name']; ?> <?php echo $class['last_name']; ?></li>
										          	<?php endif; ?>
									          	<?php endforeach; ?>
								      		</ul>
							      		</li>
						      		<?php endif; ?>
						      	<?php endforeach; ?>
					      	</ul>
				      	</li>
						
					<?php endforeach; ?>
			      	
			    </ul>
			    
			</div>
			<div class="form-group">
				<label>Start Date: </label>
			    <input type="date" value="<?php echo remove_time($lesson_assign_data['start_date']); ?>" name="start_date" id="start_date" class="form-control" />
			</div>
			<div class="form-group">
				<label>End Date: </label>
			    <input type="date" value="<?php echo remove_time($lesson_assign_data['end_date']); ?>" name="end_date" id="end_date" class="form-control" />
			</div>
			<div class="form-group">
			    <input type="hidden" value="" name="account_ids" id="account_ids" />
			    <input type="submit" value="Submit" class="form-control btn btn-primary" name="" id="submit" />
			</div>
		</div>	
	</div>
</div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<script type="text/javascript">
	var checked_data = [];
	var tree = $('#jstree_demo_div').jstree({
		icon : "jstree-file",
		plugins : [
					"checkbox",
					"contextmenu",
					"dnd",
					"massload",
					"search",
					"sort",
					"state",
					"types",
					"unique",
					"wholerow",
					"changed",
					"conditionalselect"
		],
	});

	tree.on('changed.jstree', function (e, data) {
		var i, j, r = [];
		for(i = 0, j = data.selected.length; i < j; i++) {
			r.push(data.instance.get_node(data.selected[i]));
		}
		
		checked_data = r;
	}).on('ready.jstree', function (e, data) {
		// alert("asdkjaslkdj");
		tree.jstree('open_all');
		tree.jstree('deselect_all');
		$('li[data-checkstate="checked"]').each(function() {
		    tree.jstree('check_node', $(this));
		});
		tree.jstree('close_all');
	});

	$("form").submit(function(e){

		var student = [];
		var students = [];
		var street = [];
		$.each(checked_data,function(key,value){
			
			if(value.data.jstree){
				student[key] = value.data.jstree;
				street = JSON.parse(student[key]+'}');
				students.push(street.value);
			}

		});

		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		if(start_date>end_date){
			alert("Start Date must not be greater than End date.");
			e.preventDefault();
		}

		$("#account_ids").val(students.join(","));
		
	});
</script>