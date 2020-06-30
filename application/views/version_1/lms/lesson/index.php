<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>My Lessons</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <button class="btn btn-danger waves-effect" type="button" id="delete">Delete</button>
                            <button class="btn btn-info waves-effect" type="button" id="unshare">Unshare</button>
                            <button class="btn btn-default waves-effect" type="button" id="share">Share</button>
                            <button class="btn btn-primary waves-effect" type="button" id="assign">Assign</button>
                            <button class="btn btn-warning waves-effect" type="button" id="update">Update</button>
                            <a href="<?php echo $general_class->ben_link('lms/lesson/create');?>"><button class="btn btn-success waves-effect" type="button">Create</button></a>
                        </div>


                    </ul>
                </div>
                <div class="body">

          			<table id="example" class="display responsive" style="width:100%">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
                                <th>Lesson Name</th>
	                            <th>Grade</th>
	                            <th>Subject</th>
                                <th>Quarter</th>
                                <th>Assigned To</th>
                                <th>Shared</th>
	                            <th>Owner</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>

                                <?php $profile = $this->lesson_model->ben_where("profile","account_id",$data_value['account_id'])[0]?>
                                <?php if(!$profile): $profile['first_name'] = "";$profile['last_name']=""; endif;?>
	                            <tr>
	                                <td><?php echo $data_value['id']?></td>
                                    <td><?php echo ucfirst($data_value['lesson_name']) ?></td>
	                                <td><?php echo $data_value['grade_name'] ?></td>
	                                <td><?php echo $data_value['subject_name'] ?></td>
                                    <td><?php echo $data_value['semester'] ?></td>
                                    <td><?php if($data_value['sections']!=""): ?><a href="#" data-toggle="modal" data-target="#assigned_<?php echo $data_value['id'] ?>">View Assigned</a><?php else: ?> Unassigned<?php endif; ?></td>
                                    <td><?php if($data_value['shared']=='1'):?>Yes<?php else: ?>No<?php endif; ?></td>
	                                <td><?php echo $profile['first_name'] ?> <?php echo $profile['last_name'] ?></td>
	                            </tr>
	                        <?php endforeach?>
	                    </tbody>

	                    <tfoot>
	                        <tr>
	                            <th>ID</th>
                                <th>Lesson Name</th>
	                            <th>Grade</th>
	                            <th>Subject</th>
                                <th>Quarter</th>
                                <th>Assigned To</th>
                                <th>Shared</th>
	                            <th>Owner</th>
	                        </tr>
	                    </tfoot>
	                </table>          
                    

                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
    <div id="assigned_<?php echo $data_value['id']?>" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php echo $data_value['lesson_name']; ?></h4>
          </div>
          <div class="modal-body">
            <table class="table">
                <?php foreach(explode(",", $data_value['sections']) as $section_key=>$section_value): ?>
                    <tr>
                        <td><center><?php echo $section_value; ?></center></td>
                    </tr>
                <?php endforeach; ?>
                
            </table>
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

<?php endforeach?>

<?php $general_class->datatable_clear() ?>

<script type="text/javascript">

    $("#update").hide();
    $("#assign").hide();
    $("#share").hide();
    $("#unshare").hide();
    $("#delete").hide();

    var data = "";
    var table = $('#example').DataTable({
        select: {
            style: 'single'
        },
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            }
        ]
    }).on( 'select', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            data = table.rows( indexes ).data().eq(0).eq(0).join("");
            var share = table.rows( indexes ).data().eq(0)[4];

            $("#update").show();
            $("#assign").show();
            $("#delete").show();
            if(share=="Yes"){
                $("#share").hide();
                $("#unshare").show();
                
            }else{
                $("#share").show();
                $("#unshare").hide();
                
            }
            
        }
    }).on( 'deselect', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            
            $("#update").hide();
            $("#assign").hide();
            $("#share").hide();
            $("#delete").hide();
            $("#unshare").hide();
        }
    });
    $("#assign").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson_assign/create/');?>"+data);
    });

    $("#update").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/slideshow/');?>"+data);
    });

    $("#share").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/share/');?>"+data+"/1");
    });

    $("#unshare").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/share/');?>"+data+"/0");
    });

    $("#delete").click(function(){
        if(confirm("Are you sure you want to delete this lesson?")){
            window.location.replace("<?php echo $general_class->ben_link('lms/lesson/delete/');?>"+data);
        }
        
    });

</script>