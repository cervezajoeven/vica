<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Quizzes</h2>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                    <!-- <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                        </ul>
                    </li> -->
                </ul>
            </div>
            <div class="body">
                <!-- <pre> -->
                <?php //print_r($data); ?>

                <table id="example" class="display responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Quiz</th>
                            <th>Attempts</th>
                            <th>Passing</th>
                            <th>Assigned By</th>
                            <th>Assigned Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['quizzes'] as $data_key=>$data_value): ?>
                            <tr data="<?php echo $data_value['quiz_assign_id']?>">
                                <td><?php echo $data_value['quiz_name'] ?></td>
                                <td><?php echo $data_value['attempts_done'] ?>/<?php echo $data_value['attempts'] ?></td>
                                <td><?php echo $data_value['percentage'] ?>%</td>
                                <td><?php echo ucfirst($data_value['full_name']) ?></td>
                                <td><?php echo ($data_value['date_updated']?$data_value['date_updated']:$data_value['date_created']) ?></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>


                    <tfoot>
                        <tr>
                            <th>Quiz</th>
                            <th>Attempts</th>
                            <th>Passing</th>
                            <th>Assigned By</th>
                            <th>Assigned Date</th>
                        </tr>
                    </tfoot>
                </table>


            </div>
        </div>
    </div>
</div>
<?php $general_class->datatable_clear() ?>
<script type="text/javascript">
    var table = $('#example').DataTable();
    $('#example tbody').on('click', 'tr', function () {
        if(confirm("Are you sure you want to take this quiz?")){
            var data = $(this).attr('data');
            $(this).css('pointer-events','none');
            
                window.location.href='<?php echo $general_class->ben_link('lms/answer_sheet/attempt/')?>'+data;
            }
        
    });
</script>