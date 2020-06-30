<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Accounts</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <button class="btn btn-warning waves-effect" type="button" id="reset_password">Update</button>
                        </div>


                    </ul>
                </div>
                <div class="body">
          			<table id="example" class="display responsive" style="width:100%">
	                    <thead>
	                        <tr>
                                <th>ID</th>
                                <th>Username</th>
	                            <th>Full Name</th>
	                            <th>Status</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
	                        <tr>
	                        	<td><?php echo $data_value['id']?></td>
	                        	<td><?php echo $data_value['username']?></td>
	                        	<td><?php echo $data_value['first_name']?> <?php echo $data_value['last_name']?></td>
	                        	<td><?php echo $data_value['logged']?></td>
	                        </tr>
	                        <?php endforeach?>
	                    </tbody>

	                    <tfoot>
	                        <tr>
                                <th>ID</th>
                                <th>Username</th>
	                            <th>Full Name</th>
	                            <th>Status</th>
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
    $("#reset_password").hide();
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

            $("#update").show();
            $("#reset_password").show();
            
        }
    }).on( 'deselect', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            
            $("#update").hide();
            $("#assign").hide();
            $("#reset_password").hide();

        }
    });
    $("#assign").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson_assign/create/');?>"+data);
    });

    $("#update").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/slideshow/');?>"+data);
    });

    $("#reset_password").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('general/account/update/');?>"+data);
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