<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">

            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Quiz Bank</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <button class="btn btn-primary waves-effect" type="button" id="assign">Import</button>
                            <button class="btn btn-warning waves-effect" type="button" id="update">View</button>
                        </div>


                    </ul>
                </div>
                <div class="body">

                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Quiz Name</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Semester</th>
                                <th>Type</th>
                                <th>Shared</th>
                                <th>Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>

                                <?php $profile = $this->quiz_model->ben_where("profile","account_id",$data_value['account_id'])[0]?>
                                <?php if(!$profile): $profile['first_name'] = "";$profile['last_name']=""; endif;?>
                                <tr>
                                    <td><?php echo $data_value['id']?></td>
                                    <td><?php echo ucfirst($data_value['quiz_name']) ?></td>
                                    <td><?php echo $data_value['grade_name'] ?></td>
                                    <td><?php echo $data_value['subject_name'] ?></td>
                                    <td><?php echo $data_value['semester'] ?></td>
                                    <td><?php echo ucfirst(str_replace("_", " ", $data_value['quiz_type'])) ?></td>
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
                                <th>Semester</th>
                                <th>Type</th>
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
            var share = table.rows( indexes ).data().eq(0)[6];
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
        if(confirm("Are you sure you want to import this quiz?")){
            window.location.replace("<?php echo $general_class->ben_link('lms/quiz/import/');?>"+data);
        }
        
    });

    $("#update").click(function(){
        // alert(quiz_type);
        if(quiz_type=="Optical"){
            window.location.replace("<?php echo $general_class->ben_link('lms/optical/optical_view/');?>"+data);
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