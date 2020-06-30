<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Packages</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <button class="btn btn-warning waves-effect" type="button" id="view">View</button>
                        </div>


                    </ul>
                </div>
                <div class="body">
                    <table id="example" class="display responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Lesson Name</th>
                                <th>Date Assigned</th>
                                <th>Teacher</th>
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($this->data['all_data'] as $data_key=>$data_value): ?>
                                <tr data="<?php echo $data_value['id']?>">
                                    <td><?php echo $data_value['id']?></td>
                                    <td><?php echo ucfirst($data_value['lesson_name']) ?></td>
                                    <td><?php echo date('F d, Y',strtotime($data_value['date_assigned'])) ?></td>
                                    <td><?php echo $data_value['first_name'] ?> <?php echo $data_value['last_name'] ?></td>
                                    <td><?php echo $data_value['availability'] ?></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Lesson Name</th>
                                <th>Date Assigned</th>
                                <th>Teacher</th>
                                <th>Availability</th>
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

    $("#view").click(function(){
        window.location.replace("<?php echo $general_class->ben_link('lms/lesson/slideshow_view/');?>"+data);
    });

</script>