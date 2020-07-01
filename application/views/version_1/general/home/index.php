<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $general_class->ben_image('general/school.png') ?>">
    <title>Vicarish LMS</title>
    <?php $css_directory = $general_class->ben_resources('version_1/css/general/home/'); ?>
    <?php $js_directory = $general_class->ben_resources('version_1/js/general/home/'); ?>
    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

    <!-- Custom fonts for this template -->
    <script src="<?php echo $general_class->ben_resources('lms/jquery_carousel.js'); ?>"></script>
    <script src="<?php echo $general_class->ben_resources('lms/carousel_js.js'); ?>"></script>
    <link href="<?php echo $css_directory; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $css_directory; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>



    <!-- Custom styles for this template -->
    <link href="<?php echo $css_directory; ?>css/agency.min.css" rel="stylesheet">
    <style type="text/css">
        .navbar-brand img{
            height: 70px;
            margin-right: 15px;
        }
        #mainNav .navbar-brand{
            color: white;
        }
        .text-primary {
            color: #fe3636!important;
        }
        #mainNav .navbar-nav .nav-item .nav-link.active, #mainNav .navbar-nav .nav-item .nav-link:hover {
            color: <?php echo $data['school_status']['color']?>;
        }
        .btn-primary {
            background-color: <?php echo $data['school_status']['color']?>;
            border-color: <?php echo $data['school_status']['color']?>;
        }
        .btn-primary:active, .btn-primary:focus, .btn-primary:hover {
            background-color: <?php echo $data['school_status']['color']?>!important;
            border-color: <?php echo $data['school_status']['color']?>!important;
            color: #fff;
        }
        .timeline>li .timeline-image {
            background-color: <?php echo $data['school_status']['color']?>;
        }
        #mainNav .navbar-brand.active, #mainNav .navbar-brand:active, #mainNav .navbar-brand:focus, #mainNav .navbar-brand:hover {
            color: <?php echo $data['school_status']['color']?>;
        }
        #portfolio .portfolio-item .portfolio-link .portfolio-hover {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-transition: all ease .5s;
            transition: all ease .5s;
            opacity: 0;
            background: rgba(254, 54, 54, 0.9);
        }
        #mainNav .navbar-toggler {
            background-color: <?php echo $data['school_status']['color']?>;
        }
        a {
            color: #fe3636;
        }
        header.masthead {
            background-size: 100% 100%;
        }

        .sr-only{
          position: absolute;
          left: -9999999px;
        }
        .img-responsive,
        .thumbnail > img,
        .thumbnail a > img,
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
          display: block;
          max-width: 100%;
          height: auto;
        }
        //carousel start
        .carousel {
          position: relative;
        }
        .carousel-inner {
          position: relative;
          width: 100%;
          overflow: hidden;
        }
        .carousel-inner > .item {
          position: relative;
          display: none;
          -webkit-transition: .6s ease-in-out left;
               -o-transition: .6s ease-in-out left;
                  transition: .6s ease-in-out left;
        }
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
          line-height: 1;
        }
        @media all and (transform-3d), (-webkit-transform-3d) {
          .carousel-inner > .item {
            -webkit-transition: -webkit-transform .6s ease-in-out;
                 -o-transition:      -o-transform .6s ease-in-out;
                    transition:         transform .6s ease-in-out;

            -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
            -webkit-perspective: 1000px;
                    perspective: 1000px;
          }
          .carousel-inner > .item.next,
          .carousel-inner > .item.active.right {
            left: 0;
            -webkit-transform: translate3d(100%, 0, 0);
                    transform: translate3d(100%, 0, 0);
          }
          .carousel-inner > .item.prev,
          .carousel-inner > .item.active.left {
            left: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
                    transform: translate3d(-100%, 0, 0);
          }
          .carousel-inner > .item.next.left,
          .carousel-inner > .item.prev.right,
          .carousel-inner > .item.active {
            left: 0;
            -webkit-transform: translate3d(0, 0, 0);
                    transform: translate3d(0, 0, 0);
          }
        }
        .carousel-inner > .active,
        .carousel-inner > .next,
        .carousel-inner > .prev {
          display: block;
        }
        .carousel-inner > .active {
          left: 0;
        }
        .carousel-inner > .next,
        .carousel-inner > .prev {
          position: absolute;
          top: 0;
          width: 100%;
        }
        .carousel-inner > .next {
          left: 100%;
        }
        .carousel-inner > .prev {
          left: -100%;
        }
        .carousel-inner > .next.left,
        .carousel-inner > .prev.right {
          left: 0;
        }
        .carousel-inner > .active.left {
          left: -100%;
        }
        .carousel-inner > .active.right {
          left: 100%;
        }
        .carousel-control {
          position: absolute;
          top: 0;
          bottom: 0;
          left: 0;
          width: 15%;
          font-size: 20px;
          color: #fff;
          text-align: center;
          text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
          filter: alpha(opacity=50);
          opacity: .5;
        }
        .carousel-control.left {
          background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
          background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
          background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
          background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
          background-repeat: repeat-x;
        }
        .carousel-control.right {
          right: 0;
          left: auto;
          background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
          background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
          background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
          background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
          background-repeat: repeat-x;
        }
        .carousel-control:hover,
        .carousel-control:focus {
          color: #fff;
          text-decoration: none;
          filter: alpha(opacity=90);
          outline: 0;
          opacity: .9;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-left,
        .carousel-control .glyphicon-chevron-right {
          position: absolute;
          top: 50%;
          z-index: 5;
          display: inline-block;
          margin-top: -10px;
        }
        .carousel-control .icon-prev,
        .carousel-control .glyphicon-chevron-left {
          left: 50%;
          margin-left: -10px;
        }
        .carousel-control .icon-next,
        .carousel-control .glyphicon-chevron-right {
          right: 50%;
          margin-right: -10px;
        }
        .carousel-control .icon-prev,
        .carousel-control .icon-next {
          width: 20px;
          height: 20px;
          font-family: serif;
          line-height: 1;
        }
        .carousel-control .icon-prev:before {
          content: '\2039';
        }
        .carousel-control .icon-next:before {
          content: '\203a';
        }
        .carousel-indicators {
          position: absolute;
          bottom: 10px;
          left: 50%;
          z-index: 15;
          width: 60%;
          padding-left: 0;
          margin-left: -30%;
          text-align: center;
          list-style: none;
        }
        .carousel-indicators li {
          display: inline-block;
          width: 10px;
          height: 10px;
          margin: 1px;
          text-indent: -999px;
          cursor: pointer;
          background-color: #000 \9;
          background-color: rgba(0, 0, 0, 0);
          border: 1px solid #fff;
          border-radius: 10px;
        }
        .carousel-indicators .active {
          width: 12px;
          height: 12px;
          margin: 0;
          background-color: #fff;
        }
        .carousel-caption {
          position: absolute;
          right: 15%;
          bottom: 20px;
          left: 15%;
          z-index: 10;
          padding-top: 20px;
          padding-bottom: 20px;
          color: #fff;
          text-align: center;
          text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
        }
        .carousel-caption .btn {
          text-shadow: none;
        }
        @media screen and (min-width: 768px) {
          .carousel-control .glyphicon-chevron-left,
          .carousel-control .glyphicon-chevron-right,
          .carousel-control .icon-prev,
          .carousel-control .icon-next {
            width: 30px;
            height: 30px;
            margin-top: -15px;
            font-size: 30px;
          }
          .carousel-control .glyphicon-chevron-left,
          .carousel-control .icon-prev {
            margin-left: -15px;
          }
          .carousel-control .glyphicon-chevron-right,
          .carousel-control .icon-next {
            margin-right: -15px;
          }
          .carousel-caption {
            right: 20%;
            left: 20%;
            padding-bottom: 30px;
          }
          .carousel-indicators {
            bottom: 20px;
          }
        }

        .carousel-inner{
          height: 500px;
        }
        .item{
          height: 100%;
        }
        .item img{
          width: 100%;
          height: 100%!important;
        }

    </style>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->


  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <!-- <img src="/sanisidro/resources/version_1/images/general/school.png" /> -->
            Vicarish
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">Announcements</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact"><b>Login</b></a>
              </li>
            </ul>
          </div>
      </div>
    </nav>

    
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase" id="login_label">Login</h2>
            <h3 class="section-subheading text-muted"></h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?php echo $general_class->ben_open_form("general/login/login"); ?>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input class="form-control" id="username" type="text" name="username" placeholder="Username" value="<?php echo $general_class->data['username'] ?>" required="required" autocomplete="off" data-validation-required-message="Please enter your username.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" value="<?php echo $general_class->data['username'] ?>" autocomplete="off" required="required" data-validation-required-message="Please enter your password">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <input id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" value="Login" type="submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <span class="copyright">Copyright &copy;</span>
          </div>
          <!-- <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div> -->
          <!-- <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div> -->
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3>Mission - Vision</h3>
                  <!-- <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/01-full.jpg" alt=""> -->
                  <p>We, the St. Thérèse Private School of Mandaluyong, envision a learning community committed to develop the young to become confident, compassionate, collaborative and prayerful Christians who are prepared to meet the challenges of higher learning and of the present life. Inspired by the holy life of St. Thérèse of the Child Jesus, we provide quality education through a holistic formation that animates the young to cultivate utmost respect of individuality amidst differences.</p>

                  <h3>The 10 Theresian Core Values</h3>
                  <!-- <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/01-full.jpg" alt=""> -->
                  <p>I am a Thérèsian. St. Thérèse of the Child Jesus is my model. As a St. Thérèsian:

                    <li>• I am SIMPLE. I am modest in my thoughts, speech, action and bearing.</li>
                    <li>• I am HUMBLE. I acknowledge that without God there is nothing I can do. So I always seek divine assistance in all my nedeavors.</li>
                    <li>• I am HONEST. I do only what is right.</li>
                    <li>• I am TRUTHFUL. I say only what is true.</li>
                    <li>• I am a MISSIONARY. I help the missions by praying for the missionaries. I save money to give to the mission.</li>
                    <li>• I am OBEDIENT. I willingly and punctually do what I am asked to do. I recognize and follow the rules at home, in school, and in the community.</li>
                    <li>• I am GENEROUS. I share things, time, and talent with anyone in need and for the good of the community.</li>
                    <li>• I am RESPECTFUL. I treat everybody with propriety and consideration.</li>
                    <li>• I am RESPONSIBLE. I do as I see as my duty to the best of my capability.</li>
                    <li>• I am JUST. I gladly and sincerely accept persons as they are.</li>
</p>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="logo" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Logo</h2>
                  <p class="item-intro text-muted">STePs Logo and It's Meaning</p>

                  <p>Just like St. Thérèse of the Child Jesus, the school’s logo is free from complication that anyone who looks at it will see it as the embodiment of one of her most endearing virtues: SIMPLICITY.

• As a whole, the circular logo symbolizes unity, wholeness and infinity.
• The curved edges of the circle symbolize a flower’s petals which is associated with femininity and motherly love.
• Enveloped by the curved edges are:

o the outer red layer symbolizing the color of the roses that St. Thérèse promised to shower upon all on earth

o the middle layer – which is beige in color – is the color of the Carmelites to which congregation the saint belonged. Within this layer is the name of the school separated by two roses from its acronym, STePS

o the center of the circle with the image of St. Thérèse carrying a bouquet of red roses and a crucifix close to her heart

• “CURA PERSONALIS” (CARE FOR THE ENTIRE PERSON) is the school’s motto chosen to embody the motherly love that our pupils experience in school. Like a mother, the school does not love a person by his color, race, creed, and orientation; it sees him as a whole being, a child of God who deserves to be cared for, nurtured and loved in his entirety.

The school’s aim is for everyone involved in the education of the children enrolled in STePS – the pupils’ parents and guardians, benefactors, the school administrators, the faculty and the staff of the school – to be united, to move as one in helping these budding children develop into full-bloomed flowers in their quest for learning that goes even beyond time, without losing the Christian values inculcated in them.</p>

                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="hymn" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="">STePS Hymn</h2>

                  <p>Step by step we climb the ladder, Step by step we go,
Onward children of St. Thérèse
Onward to success

Lift high the banner of our Alma Mater
The vision is clear, the mission is here
Hone gentle souls into pillars of stone

Step by step we climb the ladder, Step by step we go,
Onward children of St. Thérèse
Onward to success

With dignity and pride, Together we stand side by side
With heads lifted high, We go marching by
Hearts on fire and spirits alive
Step by step we climb the ladder, Step by step we go,
Onward children of St. Thérèse
Onward to success

Onward little children of God To the greatness we dream of.</p>

                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="portfolio-modal modal fade" id="philosophy" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3>Philosophy</h3>
                  <!-- <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/01-full.jpg" alt=""> -->
                  <p>The St. Thérèse Private School of Mandaluyong is an institution of learning and formation that offers pre-school and grade school. It conforms to the Department of Education’s prescribed curriculum enhanced with a modified individualized and group instruction program that is “distinctly St. Thérèse’s”. The curriculum is structured in a sequenced scenario, built on pre-requisite subjects that are interrelated and integrated towards the overall objectives of the school.

The STePS community joins the parents in taking a personal interest in the development of each pupil – “CURA PERSONALIS (care and concern for the individual) – helping each one develop a sense of self-worth and to become a responsible member of the community.

The STePS educational and formative process recognizes the stages of development each student undergoes – intellectual, emotional, affective, psychological, etc. and assists each one to mature gradually in these areas.</p>


                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/02-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/03-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/04-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/05-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="<?php echo $css_directory; ?>img/portfolio/06-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade " role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="bg-warning" style="color: white;padding: 10px;text-align: center;">Please check the username or password.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $css_directory; ?>vendor/jquery/jquery.min.js"></script>
    <!-- autocomplete -->
    <link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jquery-ui.css'); ?>">

    <link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jqueryui.com/style.css'); ?>">
    <script src="<?php echo $general_class->ben_resources('lms/jquery-1.12.4.js'); ?>"></script>
    <script src="<?php echo $general_class->ben_resources('lms/jquery-ui.js'); ?>"></script>
    <script>
      var usernames = '<?php echo $general_class->data["usernames"]; ?>';
      usernames = JSON.parse(usernames);
  
      $( function() {
        var availableTags = usernames;
        $( "#username" ).autocomplete({
          source: availableTags
        });
      } );
    </script>
    <!-- autocomplete -->
    <script src="<?php echo $css_directory; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo $css_directory; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo $js_directory; ?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo $js_directory; ?>js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo $js_directory; ?>js/agency.min.js"></script>

    <?php if($general_class->session->flashdata('wrong_credentials')!=""): ?>
        <script>
            alert("<?php echo $general_class->session->flashdata('wrong_credentials')?>");

            $('#myModal').modal('show');
        </script>
    <?php endif; ?>

  </body>

</html>