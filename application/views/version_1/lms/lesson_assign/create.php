<div class="row clearfix">
    <div class="col-sm-12">
        <div class="card">
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save/".$data['lesson_id']); ?>
				<?php $date_start = date('Y-m-d H:i:s'); ?>
				<?php $date_end = date('Y-m-d H:i:s', strtotime($date_start . ' +1 day')); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Assigned Lessons</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                        	<a href="<?php echo $general_class->ben_link('lms/lesson/index')?>"><button class="btn btn-danger waves-effect" type="button">Cancel</button></a>
                           	<button class="btn btn-success waves-effect">Done</button>
                        </div>


                    </ul>
                </div>
                <div class="body"> 
                    <link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jstree/dist/themes/default/')?>/style.min.css" />
					<input type="hidden" name="lesson_id" value="<?php echo $data['lesson_id']; ?>" />
					<div id="jstree_demo_div" class="col-xs-12">
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
									          					<?php if($class['account_id']): ?>
												          			<li data-checkstate="checked" data-jstree='{"value":<?php echo $class['account_id'];?>'><?php echo $class['first_name']; ?> <?php echo $class['last_name']; ?></li>
												          		<?php endif ?>
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

					<div class="form-group" style="width: 300px">
						<label>Start Date: </label>
					    <input type="datetime-local" name="start_date" value="<?php echo date('Y-m-d\TH:i', strtotime($date_start)); ?>" id="start_date" class="form-control" />
					</div>
					<div class="form-group" style="width: 300px">
						<label>End Date: </label>
					    <input type="datetime-local" name="end_date" value="<?php echo date('Y-m-d\TH:i', strtotime($date_end)); ?>" id="end_date" class="form-control" />
					</div>
					<div class="form-group">
					    <input type="hidden" value="" name="account_ids" id="account_ids" />
					    <input type="hidden" value="" name="grades" id="grades" />
						<input type="hidden" value="" name="sections" id="sections" />
					</div>

                </div>
            </form>

			
        </div>
    </div>
</div>

<script src="<?php echo $general_class->ben_resources('lms/')?>/jquery-1.12.4.js"></script>
<script src="<?php echo $general_class->ben_resources('lms/jstree/dist/')?>/jstree.min.js"></script>
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
		tree.jstree('close_all');
	});

	$("form").submit(function(e){

		var student = [];
		var students = [];
		var street = [];
		var grade = [];
		var section = [];

		$.each(checked_data,function(key,value){

			if(value.children.length>=1){

				if(value.text.trim().includes("Grade")){
					grade.push(value.text.trim());
				}else{
					section.push(value.text.trim());
				}
			}
			if(value.data.jstree){
				student[key] = value.data.jstree;
				street = JSON.parse(student[key]+'}');
				students.push(street.value);
				console.log(students);
			}

		});
		var start_date = $("#start_date").val();
		var end_date = $("#end_date").val();
		if(start_date>end_date){
			alert("Start Date must not be greater than End date.");
			e.preventDefault();
		}

		$("#account_ids").val(students.join(","));
		$("#grades").val(grade.join(","));
		$("#sections").val(section.join(","));
		
	});
</script>
