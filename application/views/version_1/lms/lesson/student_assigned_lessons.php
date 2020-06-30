<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Assigned Lessons</h2>
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
                <?php print_r($data); ?>

                <!-- <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Subject</th>
                            <th>Level</th>
                            <th>Trime</th>
                            <th>Topic/Lesson</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['lesson_packages'] as $lesson_key=>$lesson_value): ?>
                            <tr>
                                <td></td>
                                <td data-id=""></td>
                                <td><?php echo ucfirst($lesson_value['subject_name']) ?></td>
                                <td>Grade <?php echo $lesson_value['grade_name'] ?></td>
                                <td><?php echo $lesson_value['semester'] ?></td>
                                <td><?php echo $lesson_value['lesson_name'] ?></td>
                                <td>December 10, 2018 7:52 PM</td>
                            </tr>
                        <?php endforeach?>
                    </tbody>


                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Subject</th>
                            <th>Level</th>
                            <th>Trime</th>
                            <th>Topic/Lesson</th>
                            <th>Date Created</th>
                        </tr>
                    </tfoot>
                </table> -->


            </div>
        </div>
    </div>
</div>
<?php $general_class->datatable() ?>
