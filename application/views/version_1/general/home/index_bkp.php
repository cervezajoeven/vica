<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $general_class->ben_image('general/school.png') ?>">
    <title><?php echo $data['school_status']['full_name']?></title>
    <?php $css_directory = $general_class->ben_resources('version_1/css/general/home/'); ?>
    <?php $js_directory = $general_class->ben_resources('version_1/js/general/home/'); ?>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="<?php echo $css_directory; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo $css_directory; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
        .navbar-brand {
            display: inline-block;
            padding-top: .3125rem;
            padding-bottom: .3125rem;
            margin-right: 1rem;
            line-height: inherit;
            white-space: nowrap;
            top: -20px;
            position: relative;

        }
        .navbar-brand>img {
            display: inline;
        }
        #mainNav .navbar-brand {
            color: white;
            font-size: 2.75em;
        }
        #mainNav.navbar-shrink {
            padding-top: 0;
            padding-bottom: 0;
            background-color: #212529;
            font-size: 1.75rem;
        }
        .navbar {
            min-height: 100px!important;
        }
        div#navbarResponsive {
          font-size: 1.75rem;
        }
        .item{
          
        }
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
          <!-- <img src="/sanisidro/resources/version_1/images/general/school.png" /> -->
          <img src="<?php echo $general_class->ben_image('general/school.png') ?>" /><?php echo $data['school_status']['full_name']?>
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
              <a class="nav-link js-scroll-trigger" href="#about">History</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact"><b>Login</b></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome!</div>
          <div class="intro-heading text-uppercase"><?php echo $data['school_status']['full_name']?></div>
          <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#contact">View LRN</a> -->
          <!-- <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="<?php echo $general_class->ben_link('general/home/index_parallax') ?>">Easy Login</a> -->
        </div>
      </div>
    </header>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo $general_class->ben_resources('uploads/banners/image.png') ?>" alt="Los Angeles">
        </div>
        <div class="item">
          <img src="<?php echo $general_class->ben_resources('uploads/banners/image.png') ?>" alt="Los Angeles">
        </div>


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

    <!-- Services -->
    <!-- <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Admission</h2>
            <h3 class="section-subheading text-muted">Admission Policy</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 text-center">
            <h3 class="section-heading text-muted">Online Admission Procedures</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-list-alt fa-stack-1x fa-inverse"></i>

            </span>
            <h4 class="service-heading">Step 1</h4>
            <p class="text-muted">Fill up SICS application form</p>
          </div>
          <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Step 2</h4>
            <p class="text-muted">Payment Method</p>
          </div>
          <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-calendar-alt fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Step 3</h4>
            <p class="text-muted">Present Reference Code and Get Test Schedule</p>
          </div>
          <div class="col-md-3">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-file-alt fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Step 4</h4>
            <p class="text-muted">Enrollment</p>
          </div>

        </div>
        <div class="col-md-12">
          <button class="btn btn-primary">Apply Here</button>
        </div>
      </div>
    </section> -->

    <!-- Portfolio Grid -->
    <!-- <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <h3 class="section-subheading text-muted">Click the image to see our further information</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo $css_directory; ?>img/portfolio/02-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Mission - Vision & Core Values</h4>
              <p class="text-muted">Read our Mission - Vision and the Theresian 10 Core Values</p>
            </div>

          </div>

          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#philosophy">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo $css_directory; ?>img/portfolio/03-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Philosophy</h4>
              <p class="text-muted">The STePs Philosophy<br><br><br><br></p>
            </div>

          </div>

          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#logo">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo $css_directory; ?>img/portfolio/04-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Logo</h4>
              <p class="text-muted">Our Logo and It's Meaning<br><br><br><br></p>
            </div>
          </div>
          
          <div class="col-md-3 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#hymn">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="<?php echo $css_directory; ?>img/portfolio/05-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Hymn</h4>
              <p class="text-muted">Our Hymn<br><br><br><br></p>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About Us</h2>
            <h3 class="section-subheading text-muted">In the beginning, there was a great toil. In the end, there is a bountiful harvest.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">

              <?php foreach($this->data['school_history'] as $school_history_key=>$school_history_value): ?>
                <li <?php if((($school_history_key+1)%2) == 0): ?> class="timeline-inverted" <?php endif; ?>>
                  <div class="timeline-image">
                    <img class="rounded-circle img-fluid" style="height: 100%" src="<?php echo $css_directory; ?>img/about/<?php echo $school_history_key+1 ?>.jpg" alt="">
                  </div>
                  <div class="timeline-panel">
                    <div class="timeline-heading">
                      <h4><?php echo $school_history_value['year']; ?></h4>
                      <h4 class="subheading"><?php echo $school_history_value['title']; ?></h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted"><?php echo $school_history_value['description']; ?></p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>

              <!-- <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo $css_directory; ?>img/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4></h4>
                    <h4 class="subheading">What We Offer</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">The school mainly provides the K-12 program.  Currently, it offers 3 academic tracks in Senior High School (SHS) which are Science, Technology, Engineering, and Mathematics (STEM), Accountancy, Business, and Management (ABM), and Humanities and Social Sciences (HUMSS). Various school clubs and organizations are also present to enhance the multiple intelligence of the students.</p>
                  </div>
                </div>
              </li>
              
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="<?php echo $css_directory; ?>img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4></h4>
                    <h4 class="subheading">Our Graduates</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">HSAM is notable for the high-quality education it provides to its students and commitment to developing them into service-oriented individuals that will become agents of change in the society.</p>
                  </div>
                </div>
              </li>
              
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" style="height: 155px" src="<?php echo $css_directory; ?>img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4></h4>
                    <h4 class="subheading">Organizations</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Holy Spirit Academy of Malolos is duly recognized by the Department of Education (DepEd) and the Catholic Educational Association of the Philippines (CEAP). It has also been granted Level II accreditation status for its Grade School and High School programs by the Philippine Accrediting Association of Schools, Colleges and Universities (PAASCU).</p>
                  </div>
                </div>
              </li> -->
              
              <li class="timeline-inverted">
                <a href="">
                  <div class="timeline-image">
                    <h4>Be Part
                      <br>Of Our
                      <br>Community!</h4>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <!-- <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Location & Directories</h2>
            <h3 class="section-subheading text-muted" style="margin-bottom: 20px;">Sgt. Bumatay Mandaluyong</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto" src="http://stepsmandaluyong.com/brainee/resources/version_1/css/general/home/img/team/steps_map.png" alt="" style="border: 1px solid #999;height: 260px;width: 400px;">
              <h4>Thelma C. Go</h4>
              <p class="text-muted">School Directress</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="https://web.facebook.com/thelma.go.5">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 mx-auto text-center">
            <p class="large text-muted">533-2731/703-0473 Accounting office</p>
          </div>
          <div class="col-lg-3 mx-auto text-center">
            <p class="large text-muted">532-4243 Registrar</p>
          </div>
          <div class="col-lg-3 mx-auto text-center">
            <p class="large text-muted">533-4146 Kindergarten (Bumatay)</p>
          </div>
          <div class="col-lg-3 mx-auto text-center">
            <p class="large text-muted">359-1664 Bus Service</p>
          </div>
          <div class="col-lg-3 mx-auto text-center">
            <p class="large text-muted">533-4146 Other Concern</p>
          </div>

        </div>
      </div>
    </section> -->

    <!-- Clients -->
    <!-- <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              533-2731/703-0473 Accounting office
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              532-4243 Registrar
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              533-4146 Kindergarten (Bumatay)
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              359-1664 Bus Service
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              533-4146 Other Concern
            </a>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Login</h2>
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
            <span class="copyright">Copyright &copy; Cloud IT Consultancy 2017</span>
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

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo $css_directory; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo $css_directory; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo $css_directory; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo $js_directory; ?>js/jqBootstrapValidation.js"></script>
    <script src="<?php echo $js_directory; ?>js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo $js_directory; ?>js/agency.min.js"></script>

  </body>

</html>