<style type="text/css">
.col-lg-12.main-box {
    margin-top: 40px;
    font-size: 60px;
    text-align: center;
    margin-bottom: 100px;
}
.box i:hover{
    color:inherit;
    cursor: pointer;
}
.box i{
    color:#ff3838;
}
.box:hover{
    cursor: pointer;
}
.box_title {
    font-size: 24px;
    font-weight: bold;
}
.box_subtitle {
    font-size: 15px;
    color: #777;
}
.brainee-announcement {
    height: 575px;
    overflow: scroll;
}
.brainee-announcement_text{
    padding-bottom: 10px;
}
.brainee-announcement_list{
    max-height: none;
}
</style>
<?php $banner_data = $general_class->data['banner_data']?>
<?php $announcement_data = $general_class->data['announcement_data']?>

<div class="home">
    <div class="brainee-carousel_container col-lg-8">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <?php foreach ($banner_data as $banner_key => $banner_value):?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $banner_key?>" class="<?php if($banner_key==0):?> active <?php endif;?>"></li>
                <?php endforeach; ?>
                
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">

                <?php foreach ($banner_data as $banner_key => $banner_value):?>
                    <div class="item <?php if($banner_key==0):?> active <?php endif;?>">
                        <img src="<?php echo $general_class->ben_image('company/steps/banner/'.$banner_value['banner_url']); ?>" alt="Los Angeles" style="width:<?php echo $banner_value['banner_width']; ?>%;margin:0 auto;">
                    </div>
                <?php endforeach; ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="brainee-announcement_container col-lg-4">
        <div class="brainee-announcement">
            <div class="brainee-announcement_titlebar_container">
                <div class="brainee-announcement_titlebar">
                    <img src="<?php echo $general_class->ben_image('company/steps/logo/logo.png'); ?>" />
                    Memo
                </div>
            </div>
            <div class="brainee-announcement_content_container">
                <div class="brainee-announcement_content">
                    <div class="brainee-announcement_list_container">
                        <?php foreach (array_reverse($announcement_data) as $announcement_key => $announcement_value): ?>
                            <div class="brainee-announcement_list">
                                <div class="brainee-announcement_title_container">
                                    <div class="brainee-announcement_title">
                                        <span><?php echo $announcement_value['announcement_title']; ?></span>
                                    </div>
                                </div>
                                <div class="brainee-announcement_user_container">
                                    <div class="brainee-announcement_text">
                                        <span><?php echo $announcement_value['announcement_content']; ?></span>
                                    </div>
                                </div>
                                <!-- <div class="brainee-announcement_user_container">
                                    <div class="brainee-announcement_user">
                                        <span><i><?php echo $announcement_value['username']; ?> (<?php echo $announcement_value['email_address']?>)</i></span>
                                    </div>
                                </div> -->
                                <div class="brainee-announcement_date_container">
                                    <div class="brainee-announcement_date">
                                        <span>Posted Date: <?php echo ben_date_no_time($announcement_value['date_created']) ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="col-lg-12 main-box">
        <a href="<?php echo $general_class->ben_link('general/home/about_us'); ?>">
            <div class="col-lg-4 box">
                <i class="glyphicon glyphicon-user icon"></i>
                <div class="box_title">About Us</div>
            </div>
        </a>
  
        <div class="col-lg-4 box">
            <i class="glyphicon glyphicon-time icon"></i>
            
            <div class="box_title">School Events</div>
            
        </div>
        <div class="col-lg-4 box">
            <i class="glyphicon glyphicon-calendar icon"></i>
            
            <div class="box_title">Calendar</div>
            
        </div>
    </div>
</div>