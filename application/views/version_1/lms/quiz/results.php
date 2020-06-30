<style type="text/css">
    td:first-child{
        text-align: left;
    }
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
                            <h2>Quiz Results</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">

                            <button class="btn btn-success waves-effect" type="button" id="assign">View Answer Sheet</button>

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
                                <th>Account ID</th>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Total Score</th>
                                <th>Percentage</th>
                                <th>Remarks</th>
                                <th>Duration</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
	                            <?php 
                                    $remarks = "";
                                    if($data_value['quiz_type']=="mastery"){
                                        if($data_value['the_percent']<=50){
                                            $remarks = "Below Average";
                                        }else if($data_value['the_percent']<=75){
                                            $remarks = "Average";
                                        }else{
                                            $remarks = "Above Average";
                                        }
                                    }else{
                                        if($data_value['the_percent']>=$data_value['percentage']){
                                            $remarks = "Passed";
                                        }else{
                                            $remarks = "Failed";
                                        }
                                    }
                                ?>
                                <tr>
	                                <td><?php echo $data_value['quiz_id']?></td>
                                    <td><?php echo $data_value['account_id']?></td>
                                    <td><?php echo ucfirst($data_value['last_name']) ?>, <?php echo ucfirst($data_value['first_name']) ?></td>
                                    <td><?php echo round($data_value['score']) ?></td>
                                    <td><?php echo ucfirst($data_value['total_score']) ?></td>
                                    <td><?php echo round($data_value['the_percent']) ?>%</td>
                                    <td><?php echo $remarks; ?></td>
                                    <?php if($data_value['time_done']!="0"): ?>
                                    <td><?php echo convert_to_hh_mm_ss(($data_value['time_done']-$data_value['time_started'])/1000) ?></td>
                                    <?php else: ?>
                                        <td>Unfinished</td>
                                    <?php endif; ?>
	                            </tr>
	                        <?php endforeach; ?>
	                    </tbody>

	                    <tfoot>
	                        <tr>
                                <th>ID</th>
                                <th>Account ID</th>
                                <th>Name</th>
                                <th>Score</th>
                                <th>Total Score</th>
                                <th>Percentage</th>
                                <th>Remarks</th>
                                <th>Duration</th>
	                        </tr>
	                    </tfoot>
	                </table>          
                    

                </div>
            </form>
        </div>
    </div>
</div>

<?php $general_class->datatable_clear() ?>

<script type="text/javascript">

    $("#update").hide();
    $("#assign").hide();
    $("#share").hide();
    $("#unshare").hide();
    $("#delete").hide();
    $("#review_answers").hide();

    var data = "";
    var quiz_type = "";
    var account_id = "";
    var section_id = "<?php echo $data['section_id']?>";
    var table = $('#example').DataTable({
        dom: 'Bfrtip',
        select: {
            style: 'single'
        },
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        buttons: [
            {
                extend: 'copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            },
        ],
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
            account_id = table.rows( indexes ).data().eq(0)[1];
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
    $("#assign").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/optical/optical_review/');?>"+data+"/"+account_id+"/"+section_id);
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