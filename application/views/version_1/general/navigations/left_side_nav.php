    <style>

    .navbar{
        background-color: #24904f!important;
    }
    .sidebar .user-info {
    
        background: url("<?php echo $general_class->ben_resources('sms/images/').'/user-img-background2.jpg'?>") no-repeat no-repeat;
        background-size: 100% 100%;
    }
    .bars::before{
        width: 200px;
    }
    .list{
        padding-bottom: 50px;
    }
    #leftsidebar{
        width: 250px;
    }
    section.content{
        margin: 100px 15px 0 275px;
    }
    div#navbar-collapse{
        height: 58px;
    }
    </style>
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand">VICA Learning Tools</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">person</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Profile</li>
                            <li class="body">
                                <ul class="menu">
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle">
                                            <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                        </div>
                                        <?php echo $general_class->session->userdata('first_name') ?> <?php echo $general_class->session->userdata('last_name') ?>
                                    </a>
                                    <li>
                                        <?php echo $general_class->session->userdata('id') ?>
                                    
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Edit Profile</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

    </nav>
    <!-- #Top Bar -->



    <section>
        
        <aside id="leftsidebar" class="sidebar">
           
            <div class="menu">
                <ul class="list">
                    
                    <li>
                        <a href="<?php echo $general_class->ben_link('general/dashboard/sms_index')?>">
                            <i class="material-icons" style="color: red!important;">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="<?php if(in_array('ebook', $general_class->toggled)): echo 'active'; endif; ?>">
                        <a href="<?php echo $general_class->ben_link('lms/ebook/index')?>">
                            <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/lesson.png')?>">
                            <span>Cloud eBooks</span>
                        </a>
                    </li>
                    
                    


                    <?php if(strtolower($general_class->session->userdata('account_type_name'))=="student"):?>
                            
                            <li class="<?php if(in_array('student_assigned_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('lms/quiz/student_assigned_quizzes')?>" class="">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                    <span>Quizzes</span>
                                </a>
                            </li>

                            <li class="<?php if(in_array('student_quiz_history', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('lms/quiz/student_quiz_history')?>" class="">
                                    <i class="material-icons">assignment</i>
                                    <span>Quiz History</span>
                                </a>
                            </li>
                        <?php elseif($general_class->session->userdata('account_type_id')==3): ?>

                            <li class="<?php if(in_array('assessment', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">
                                    <span>Assessment</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/packages')?>" class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Quiz Packages</span>
                                        </a>
                                    </li>
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/quiz_bank')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Shared Quizzes</span>
                                        </a>
                                        
                                    </li>
                                    <li class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/index')?>" class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>My Quizzes</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('schedule', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="margin-left:-215px">calendar_today</i>
                                    <span>Schedules</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/admin_assessment')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Assessment</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <li class="<?php if(in_array('lessons', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="<?php echo $general_class->ben_link('general/account/index') ?>">
                                    <i class="material-icons">book</i>
                                    <span>Accounts</span>
                                </a>
                                
                            </li>
                            
                        <?php else: ?>


                            <li class="<?php if(in_array('assessment', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <img style="height: 30px" src="<?php echo $general_class->ben_resources('images/assessment.png')?>">

                                    <span>Assessment</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/quiz_bank')?>" class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Shared Quizzes</span>
                                        </a>
                                        
                                    </li>
                                    <li class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('lms/quiz/index')?>" class="<?php if(in_array('my_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>My Quizzes</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>

                            <li class="<?php if(in_array('schedule', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="color: blue!important;margin-left:-215px;">calendar_today</i>
                                    <span>Schedules</span>
                                </a>
                                <ul class="ml-menu">
                                    <li class="<?php if(in_array('shared_quizzes', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('general/schedule/assessment')?>" class="<?php if(in_array('schedule_quizzes', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Assessment</span>
                                        </a>
                                        
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php if(in_array('attendance', $general_class->toggled)): echo 'active'; endif; ?>">
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons" style="color: violet">person</i>
                                    <span>Attendance</span>
                                </a>
                                <ul class="ml-menu">

                                    <li class="<?php if(in_array('quiz_packages', $general_class->toggled)): echo 'active'; endif; ?>">
                                        <a href="<?php echo $general_class->ben_link('sms/attendance/log')?>" class="<?php if(in_array('attendance_log', $general_class->toggled)): echo 'toggled'; endif; ?>">
                                            <span>Logs</span>
                                        </a>
                                    </li>

                                    
                                </ul>
                            </li>

                    <?php endif; ?>
                    
                    <li>
                        <a href="<?php echo $general_class->ben_link('general/login/logout')?>">
                            <i class="material-icons">power_settings_new</i>
                            <span>Logout</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </div>
            <!-- #Menu -->
            
        </aside>
        <!-- #END# Left Sidebar -->
    </section>
<script type="text/javascript">

    $(document).ready(function(){
        // $('.leftsidebar').slimScroll({
        //     height:'1000px',
        //     size: '20px',
        // });
        $('.list').slimScroll({
            height:'auto',
            size: '20px',
            railVisible: true,
            alwaysVisible: true,
        });
    });
    
</script>
<?php if($general_class->session->userdata('account_type_id')==3||$general_class->session->userdata('account_type_id')==4): ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d9ed53bfbec0f2fe3b90207/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<?php endif; ?>