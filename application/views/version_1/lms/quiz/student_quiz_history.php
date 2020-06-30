<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Quiz History</h2>
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
                <?php //print_r($data['quizzes']); ?>

                <table id="example" class="display responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Quiz Name</th>
                            <th>Score</th>
                            <th>Percentage</th>
                            <th>Remarks</th>
                            <th>Passing Percentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($data['quizzes']):?>
                            <?php foreach($data['quizzes'] as $data_key=>$data_value): ?>
                                <?php 

                                    $percentage = ($data_value['score']/$data_value['total_score'])*100;
                                    if($percentage>=$data_value['percentage']){
                                        $remarks = "Passed";
                                    }else{
                                        $remarks = "Failed";
                                    }
                                ?>
                                <tr data="<?php echo $data_value['quiz_id']?>" quiz_id="<?php echo $data_value['account_id']?>" >

                                    <td><?php echo ucfirst($data_value['quiz_name']) ?></td>
                                    <td><?php echo $data_value['score'] ?>/<?php echo $data_value['total_score']?></td>
                                    <td><?php echo round($percentage) ?>%</td>
                                    <td><?php echo $remarks; ?></td>
                                    <td><?php echo $data_value['percentage'] ?>%</td>
                                </tr>
                            <?php endforeach?>
                        <?php endif;?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Quiz Name</th>
                            <th>Score</th>
                            <th>Percentage</th>
                            <th>Remarks</th>
                            <th>Passing Percentage</th>
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
        var data = $(this).attr('data');
        var quiz_id = $(this).attr('quiz_id');
        window.location.href='<?php echo $general_class->ben_link('lms/optical/optical_review/')?>'+data+"/"+quiz_id;
    });
</script>