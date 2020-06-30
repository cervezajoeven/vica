<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/LANG.js"></script>

<form action="<?php echo $general_class->ben_link('general/'.$general_class->current_page['controller'].'/save'); ?>" method="POST" enctype="multipart/form-data" >
<div class="brainee-page_container col-lg-12">
	<div class="brainee-page_titlebar">
		<div class="brainee-page_titlebar_title">
			<span><?php echo $general_class->page_title ?> (<?php echo ucwords($general_class->current_page['function']); ?>)</span>
		</div>
		<div class="brainee-page_titlebar_controls_container">
			<a><button type="submit" class="btn btn-success" id="action_add">Add</button></a>
			<a href="<?php echo $general_class->ben_link($general_class->module_folder.'/'.$general_class->current_page['controller']); ?>/index"><button type="button" class="btn btn-danger" id="action_add">Cancel</button></a>
		</div>
	</div>

	<div class="brainee-page">
		<div class="container">
			<?php $field = "memo_url" ?>
			<div class="form-group">
				<label for="<?php echo $field?>">Upload Image</label>
				<input id="input-id" type="file" name="memo_file">
			</div>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
			<div id="jstree_demo_div">
				<ul>
					<li>All
						<ul>
							<?php foreach ($data['grades'] as $grade_key => $grade): ?>
								<li>Grade <?php echo $grade['grade_name']; ?>
							        <ul>
							        	<?php foreach ($data['sections'] as $section_key => $section): ?>
							        		<?php if($section['grade_id']==$grade['id']): ?>
									          	<li><?php echo $section['section_name'] ?>
							        				
									          		<ul>
									          			<?php foreach ($data['classes'] as $class_key => $class): ?>
									          				<?php print_r($class);?>
									          				<?php if($section['id']==$class['section_id']): ?>
												          		<li data-checkstate="checked" data-jstree='{"value":<?php echo $class['account_id'];?>'><?php echo $class['first_name']; ?> <?php echo $class['last_name']; ?></li>
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
				    </li>
			    </ul>
			    
			</div>
			<input type="hidden" value="" name="account_ids" id="account_ids" />
		</div>
	</div>

</div>
</form>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>

<script type="text/javascript">
    $("#input-id").fileinput({
        previewFileType:['image'],
        initialCaption : ['Upload your memo image'],
        uploadAsync: false,
    });
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
