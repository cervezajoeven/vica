<style type="text/css">
    h4.lms{
        color: white;
        position: relative;
        top: 0px;
        font-size: 15px;
    }
    .navbar-brand{
        margin-left: 0px;
    }
    .navbar-default {
        background-color: #24904f!important;
        border: 0;
        border-radius: 0px;
        margin-bottom: 0px;
    }
    .brainee-page_titlebar {
        background-color: #2fba66fa!important;
        margin-bottom: 10px;
    }
    .brainee-page_titlebar_controls_container {
        position: relative;
        background-color: #fdff86;
        height: 45px;
        padding: 0px;
    }
</style>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $general_class->ben_link('general/dashboard/index')?>"><img src="<?php echo $general_class->ben_image('general/school.png'); ?>"></a>
            
            <!-- <h3 class="company_name"><?php if($general_class->session->has_userdata('username')){ echo ucfirst($general_class->session->userdata('company_name')); }else{ echo "Steps";} ?> </h3> -->
            <h3 class="company_name">SICS &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </h3>
            <h4 class="lms">LMS</h4>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!$this->session->has_userdata('username')):?>
                        <li><a href="<?php echo $general_class->ben_link('general/home/index')?>">Home</a></li>

                <?php else:?>
                        <li><a href="<?php echo $general_class->ben_link('general/dashboard/sms_index')?>">Home</a></li>

                <?php endif; ?>
                
                <?php if(!$this->session->has_userdata('username')):?>
                    <li><a href="<?php echo $general_class->ben_link('general/login')?>">Login</a></li>
                <?php endif; ?>
                <?php if($this->session->has_userdata('username')):?>
                    <!-- <?php if($this->session->userdata['account_type_id']==5): ?>
                        <li class="dropdown">
                            <li><a href="<?php echo $general_class->ben_link('lms/lesson/assigned_lesson')?>">Lessons</a></li> 
                            
                        </li>
                            
                    <?php else: ?> -->
                        <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lessons <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if($this->session->userdata['account_type_id']==1||$this->session->userdata['account_type_id']==3): ?>
                                    <li><a href="<?php echo $general_class->ben_link('lms/lesson/index')?>">Lessons</a></li>
                                    <li><a href="<?php echo $general_class->ben_link('lms/lesson/lesson_bank')?>">Lesson Bank</a></li>
                                <?php endif; ?>

                                <?php if($this->session->userdata['account_type_id']==4||$this->session->userdata['account_type_id']==4): ?>
                                    <li><a href="<?php echo $general_class->ben_link('lms/lesson/index')?>">Lessons</a></li>
                                    <li><a href="<?php echo $general_class->ben_link('lms/lesson/lesson_bank')?>">Lesson Bank</a></li>
                                <?php endif; ?>

                                <?php if($this->session->userdata['account_type_id']==5): ?>
                                    <li><a href="<?php echo $general_class->ben_link('lms/lesson/assigned_lesson')?>">Assigned Lessons</a></li>
                                <?php endif; ?>

                            </ul>
                        </li> -->
                    <?php endif; ?>
                <?php endif; ?>
                <!-- 
                <?php if($this->session->has_userdata('username')):?>
                    <?php if(!$this->session->userdata['account_type_id']==5): ?>
                        <li><a href="<?php echo $general_class->ben_link('general/login')?>">Calendar</a></li>     
                    <?php endif; ?>
                    
                    
                    <?php if($this->session->userdata['account_type_id']==5): ?>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $general_class->ben_link('lms/quiz/assigned_quizzes')?>">Quizzes</a></li>
                                <li><a href="<?php echo $general_class->ben_link('lms/quiz/quiz_history')?>">Quiz History</a></li> 
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Assessment <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php if($this->session->userdata['account_type_id']==1||$this->session->userdata['account_type_id']==3||$this->session->userdata['account_type_id']==4): ?>
                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/formative'); ?>">Evaluation</a></li>
                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/mastery'); ?>">Mastery Test</a></li>
                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/index'); ?>">Summative Test</a></li>
                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/quiz_bank'); ?>">Test Bank</a></li>
                                   
                                <?php endif; ?>
                                <?php if($this->session->userdata['account_type_id']==4): ?>
                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/teacher_quiz_bank'); ?>">Your Shared Test</a></li>
                                <?php endif; ?>

                                <?php if($this->session->userdata['account_type_id']==5): ?>

                                    <li><a href="<?php echo $general_class->ben_link('lms/quiz/assigned_quizzes'); ?>">Assigned Quizzes</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    
                    <?php if($this->session->userdata['account_type_id']==3||$this->session->userdata['account_type_id']==1): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">School Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $general_class->ben_link('general/subject/index')?>">Subjects</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/grade/index')?>">Grades</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/section/index')?>">Sections</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/section/index')?>">Classes</a></li>
                                
                                <li><a href="<?php echo $general_class->ben_link('general/school_status/index')?>">School Status</a></li>
                            </ul>   
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $general_class->ben_link('general/account/index')?>">Accounts</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/banner/index')?>">Banners</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/announcement/index')?>">Announcements</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/banner/index')?>">Notificaton</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/banner/index')?>">Calendar</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/school_events/index')?>">School Events</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/logo/index')?>">Logo</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php if($this->session->userdata['account_type_id']==1): ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Developer <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $general_class->ben_link('general/account_type/index')?>">Account Types</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/company/index')?>">Company</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/semester/index')?>">Semesters</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/schoolyear/index')?>">School Years</a></li>
                                <li><a href="<?php echo $general_class->ben_link('general/crud/index')?>">CRUD</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo $general_class->ben_link('general/login/logout'); ?>">Logout</a></li>
                            </ul>
                        </li>
                    <?php endif;?>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata['first_name'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $general_class->ben_link('general/account/change/'.$this->session->userdata('id'));?>">Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo $general_class->ben_link('general/login/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php endif; ?>  -->
            </ul>
        </div>
    </div>
</nav>