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
                            <button class="btn btn-primary waves-effect" type="button" id="import">Import</button>
                            <button class="btn btn-warning waves-effect" type="button" id="view">View</button>
                        </div>


                    </ul>
                </div>
                <div class="body">
                
                    <table id="example" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lesson Name</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Shared</th>
                                <th>Owner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
                                <?php $profile = $this->lesson_model->ben_where("profile","account_id",$data_value['account_id'])[0]?>
                                <tr data="<?php echo $data_value['id']?>">
                                    <td><?php echo $data_value['id']?></td>
                                    <td><?php echo ucfirst($data_value['lesson_name']) ?></td>
                                    <td><?php echo $data_value['grade_name'] ?></td>
                                    <td><?php echo $data_value['subject_name'] ?></td>
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

    $("#import").hide();
    $("#view").hide();

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

            $("#import").show();
            $("#view").show();
        }
    }).on( 'deselect', function ( e, dt, type, indexes ) {
        if ( type === 'row' ) {
            
            $("#import").hide();
            $("#view").hide();
        }
    });
    $("#import").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/import/');?>"+data);
    });

    $("#view").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/slideshow_view/');?>"+data);
    });

</script>