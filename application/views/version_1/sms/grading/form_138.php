<!-- Default Example -->
                <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Form 138
                                <small>View or Print student's Form 138</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="clearfix m-b-20">
                                <style type="text/css">
                                    .drag_disabled{
                                        pointer-events: none;
                                    }
                                </style>
                                <div class="dd" id="student_tree">
                                    <ol class="dd-list">
                                        <?php foreach($general_class->data['filtered_students'] as $filtered_students_key=>$filtered_students_value): ?>
                                            <li class="dd-item dd-collapsed" data-id="2">
                                                <div class="dd-handle drag_disabled">Grade <?php echo $filtered_students_key ?></div>
                                                <ol class="dd-list">
                                                    <?php foreach($filtered_students_value as $section_key=>$section_value): ?>
                                                        <li class="dd-item dd-collapsed" data-id="5">
                                                            <div class="dd-handle drag_disabled"><?php echo $section_key ?></div>
                                                            <ol class="dd-list">
                                                                <?php foreach($section_value as $student_key=>$student_value): ?>
                                                                    <a href="<?php echo $general_class->ben_link('sms/grading/view/'); ?>2018-2019/2/<?php echo $student_value['grade_name'] ?>/<?php echo $student_value['section_name'] ?>/<?php echo $student_value['gender'] ?>/<?php echo $student_value['account_id'] ?>">
                                                                        <li class="dd-item dd-collapsed" data-id="6">
                                                                            <div class="dd-handle drag_disabled"><?php echo $student_value['first_name'] ?> <?php echo $student_value['last_name'] ?></div>
                                                                        </li>
                                                                    </a>
                                                                <?php endforeach;?>
                                                            </ol>
                                                        </li>
                                                    <?php endforeach;?>
                                                </ol>
                                            </li>
                                        <?php endforeach;?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    <!-- Jquery Nestable -->
    <script src="<?php echo $general_class->ben_resources('sms'); ?>/plugins/nestable/jquery.nestable.js"></script>

    <script src="<?php echo $general_class->ben_resources('sms'); ?>/js/pages/ui/sortable-nestable.js"></script>

    <script type="text/javascript">
        $("#student_tree").nestable({
            collapsedClass:'dd-collapsed',
        }).nestable('collapseAll');
    </script>
</body>

</html>
