<?php $data = $general_class->data; ?>
<?php $account_ids = $general_class->data['account_ids']; ?>
<?php $quiz_assign = $general_class->data['quiz_assign']; ?>

<?php if($quiz_assign): ?>
	<?php $date_start = date('Y-m-d',strtotime($quiz_assign['start_date'])); ?>
	<?php $date_end = date('Y-m-d', strtotime($quiz_assign['end_date'])); ?>
	<?php $attempts = $quiz_assign['attempts']; ?>
	<?php $duration = $quiz_assign['duration']; ?>
	<?php $percentage = $quiz_assign['percentage']; ?>
<?php else: ?>
	<?php $date_start = date('Y-m-d'); ?>
	<?php $date_end = date('Y-m-d', strtotime($date_start . ' +1 day')); ?>
	<?php $attempts = 1; ?>
	<?php $duration = 10; ?>
	<?php $percentage = 75; ?>
<?php endif; ?>
<div class="row clearfix">
    <div class="col-sm-12">
        <div class="card">
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save_assign/".$data['quiz_id']); ?>
				<?php $date_start = date('Y-m-d'); ?>
				<?php $date_end = date('Y-m-d', strtotime($date_start . ' +1 day')); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Assigned Quizzes</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                        	<a href="<?php echo $general_class->ben_link('lms/quiz/index')?>"><button class="btn btn-danger waves-effect" type="button">Cancel</button></a>
                           	<button class="btn btn-success waves-effect">Done</button>
                        </div>


                    </ul>
                </div>
                <div class="body"> 
                    <link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jstree/dist/themes/default/')?>/style.min.css" />
					<input type="hidden" name="quiz_id" value="<?php echo $data['quiz_id']; ?>" />
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
									          					<?php if($class['account_id']): ?>
												          			<li <?php if(in_array($class['account_id'], $account_ids)): ?> data-checkstate="checked" <?php endif;?> data-jstree='{"value":<?php echo $class['account_id'];?>'><?php echo $class['first_name']; ?> <?php echo $class['last_name']; ?></li>
												          		<?php endif;?>
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
					    <input type="date" name="start_date" value="<?php echo $date_start; ?>" id="start_date" class="form-control" />
					</div>
					<div class="form-group">
						<label>End Date: </label>
					    <input type="date" name="end_date" value="<?php echo $date_end; ?>" id="end_date" class="form-control" />
					</div>
					<div class="form-group">
						<label>Attempts: </label>
					    <input type="number" min="1" value="<?php echo $attempts; ?>" name="attempts" id="attempts" class="form-control" />
					</div>
					<div class="form-group">
						<label>Duration (Minutes): </label>
					    <input type="number" min="1" value="<?php echo $duration; ?>" name="duration" id="duration" class="form-control" />
					</div>
					<div class="form-group">
						<label>Passing Percentage(%): </label>
					    <input type="number" min="1" value="<?php echo $percentage; ?>" name="percentage" id="percentage" class="form-control" />
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
		$.each(checked_data,function(key,value){
			
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
		
	});
</script>
