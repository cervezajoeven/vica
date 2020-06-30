<style type="text/css">
    td{
        text-align: center;
    }
    th{
        text-align: center;
    }
</style>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">

            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2><?php echo $data['quiz']['quiz_name']?></h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">

                            <button class="btn btn-primary waves-effect" type="button" id="assign">Review Answer</button>

                        </div>


                    </ul>
                </div>
                <div class="body">
                    <!-- <pre>
                        <?php print_r($this->data['all_data'])?>
                    </pre> -->
          			<table id="example" class="display responsive nowrap" style="width:100%">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
                                <th>Section ID</th>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Number of Students Taken the Test</th>
                                <th>Passed</th>
                                <th>Failed</th>
                                <th>Passing</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
	                            
                                <tr>
	                                <td><?php echo $data_value['quiz_id']?></td>
                                    <td><?php echo $data_value['section_id']?></td>
                                    <td><?php echo ucfirst($data_value['grade_name']) ?></td>
                                    <td><?php echo ucfirst($data_value['section_name']) ?></td>
                                    <td><?php echo $data_value['number_of_students'] ?></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#passed_<?php echo $data_value['section_id']?>"><?php echo $data_value['passed'] ?></a>
                                    </td>
                                    <td><a href="#" data-toggle="modal" data-target="#failed_<?php echo $data_value['section_id']?>"><?php echo $data_value['failed'] ?></a></td>
                                    <td><?php echo $data_value['percentage']?>%</td>
	                            </tr>
	                        <?php endforeach?>
	                    </tbody>

	                    <tfoot>
	                        <tr>
                                <th>ID</th>
                                <th>Section ID</th>
                                <th>Grade</th>
                                <th>Section</th>
                                <th>Number of Students Taken the Test</th>
                                <th>Passed</th>
                                <th>Failed</th>
                                <th>Passing</th>
	                        </tr>
	                    </tfoot>
	                </table>          
                    

                </div>
            </form>
        </div>
    </div>
</div>
<?php $general_class->datatable_clear() ?>
<!-- <?php echo implode(",", $data['passed_and_failed'])?> -->
<?php foreach($data['passed_students'] as $key=>$value):?>
<div id="passed_<?php echo $key?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Passed</h4>
      </div>
      <div class="modal-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
            <?php foreach($value as $passed_and_failed_key=>$passed_and_failed_value):?>
                <tr>
                    <td><?php echo $passed_and_failed_value['name']; ?></td>
                    <td><?php echo $passed_and_failed_value['score']; ?></td>
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
<?php endforeach; ?>

<?php foreach($data['failed_students'] as $key=>$value):?>
<div id="failed_<?php echo $key?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Failed</h4>
      </div>
      <div class="modal-body">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
            <?php foreach($value as $passed_and_failed_key=>$passed_and_failed_value):?>
                <tr>
                    <td><?php echo $passed_and_failed_value['name']; ?></td>
                    <td><?php echo $passed_and_failed_value['score']; ?></td>
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
<?php endforeach; ?>
<script type="text/javascript">

    $("#update").hide();
    $("#assign").hide();
    $("#share").hide();
    $("#unshare").hide();
    $("#delete").hide();
    $("#review_answers").hide();
    $(document).ready(function () {
        // Tooltips
        $('.tip').each(function () {
            $(this).tooltip(
            {
                html: true,
                title: $('#' + $(this).data('tip')).html()
            });
        });
    });
    var data = "";
    var quiz_type = "";
    var section_id = "";
    var table = $('#example').DataTable({
        select: {
            style: 'single'
        },
        "columnDefs": [
            {
                "targets": [0,1],
                "visible": false,
                "searchable": false
            }
        ]
    }).on( 'select', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            data = table.rows( indexes ).data().eq(0).eq(0).join("");
            var share = table.rows( indexes ).data().eq(0)[6];
            section_id = table.rows( indexes ).data().eq(0)[1];
            quiz_type = table.rows( indexes ).data().eq(0)[5];

            $("#update").show();
            $("#assign").show();
            $("#delete").show();
            $("#review_answers").show();
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
            
            $("#review_answers").hide();
            $("#update").hide();
            $("#assign").hide();
            $("#share").hide();
            $("#delete").hide();
            $("#unshare").hide();
        }
    });
    // $("#assign").click(function(){
    //     window.location.replace("<?php echo $general_class->ben_link('lms/optical/optical_review/');?>"+data+"/"+account_id);
    // });
    $("#assign").click(function(){

        window.location.replace("<?php echo $general_class->ben_link('lms/quiz/results/');?>"+data+"/"+section_id);
    });

    $("#update").click(function(){
    	if(quiz_type=="Optical"){
    		window.location.replace("<?php echo $general_class->ben_link('lms/optical/optical/');?>"+data);
    	}else{
    		window.location.replace("<?php echo $general_class->ben_link('lms/quiz_part/index/');?>"+data);
    	}
        
    });

    $("#share").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/quiz/share/');?>"+data+"/1");
    });

    $("#unshare").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/quiz/share/');?>"+data+"/0");
    });
    $("#review_answers").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/quiz/review_answers/');?>"+data+"/0");
    });

    $("#delete").click(function(){
        if(confirm("Are you sure you want to delete this quiz?")){
            window.location.replace("<?php echo $general_class->ben_link('lms/quiz/delete/');?>"+data);
        }
        
    });

</script>