<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-pink hover-expand-effect">
        <div class="icon">
            <i class="material-icons">playlist_add_check</i>
        </div>
        <div class="content">
            <div class="text">Lessons</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $data['total_lessons']?>" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-red hover-expand-effect">
        <div class="icon">
            <i class="material-icons">assignment_turned_in</i>
        </div>
        <div class="content">
            <div class="text">Assigned Lessons</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $data['assigned_lessons']?>" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-blue hover-expand-effect">
        <div class="icon">
            <i class="material-icons">assessment</i>
        </div>
        <div class="content">
            <div class="text">Quizzes</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $data['total_quiz']?>" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">assignment_ind</i>
        </div>
        <div class="content">
            <div class="text">Assigned Quizzes</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $data['assigned_quizzes']?>" data-speed="1000" data-fresh-interval="20"></div>
        </div>
    </div>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>DONUT CHART</h2>
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
            <div id="donut_chart" class="graph"></div>
        </div>
    </div>
</div>
<script src="<?php echo $general_class->ben_resources('morrisjs/morris.js');?>"></script>
<script>
    $(function () {
        getMorris('line', 'line_chart');
        getMorris('bar', 'bar_chart');
        getMorris('area', 'area_chart');
        getMorris('donut', 'donut_chart');
    });
</script>

<?php $general_class->datatable_clear() ?>

