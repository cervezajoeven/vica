<style>
    
    body {
      font-family:'Poppins', sans-serif;
      background:#fafafa;
    }

    p {
      font-family:'Poppins', sans-serif;
      font-size:1.1em;
      font-weight:300;
      line-height:1.7em;
      color:#999;
    }

    a, a:hover, a:focus {
      color:inherit;
      text-decoration:none;
      transition:all 0.3s;
    }

    .navbar {
      padding:15px 10px;
      background:#fff;
      border:none;
      border-radius:0;
      margin-bottom:40px;
      box-shadow:1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
      box-shadow:none;
      outline:none !important;
      border:none;
    }

    .line {
      width:100%;
      height:1px;
      border-bottom:1px dashed #ddd;
      margin:40px 0;
    }

    i, span {
      display:inline-block;
    }

    .wrapper {
        display:flex;
        align-items:stretch;
    }

    #sidebar {
        min-width:250px;
        max-width:250px;
        background:#7386D5;
        color:#fff;
        transition:all 0.3s;
    }

    #sidebar.active {
        min-width:80px;
        max-width:80px;
        text-align:center;
    }

    #sidebar.active .sidebar-header h3, #sidebar.active .CTAs {
        display:none;
    }

    #sidebar.active .sidebar-header strong {
        display:block;
    }

    #sidebar ul li a {
        text-align:left;
    }

    #sidebar.active ul li a {
        padding:20px 10px;
        text-align:center;
        font-size:0.85em;
    }

    #sidebar.active ul li a i {
        margin-right:0;
        display:block;
        font-size:1.8em;
        margin-bottom:5px;
    }

    #sidebar.active ul ul a {
        padding:10px !important;
    }

    #sidebar.active a[aria-expanded="false"]::before, #sidebar.active a[aria-expanded="true"]::before {
        top:auto;
        bottom:5px;
        right:50%;
        -webkit-transform:translateX(50%);
        -ms-transform:translateX(50%);
        transform:translateX(50%);
    }

    #sidebar .sidebar-header {
      padding:20px;
      background:#000;
    }

    #sidebar .sidebar-header strong {
      display:none;
      font-size:1.8em;
    }

    #sidebar ul.components {
      padding:20px 0;
      border-bottom:1px solid #47748b;
    }

    #sidebar ul li a {
      padding:10px;
      font-size:1.1em;
      display:block;
    }

    #sidebar ul li a:hover {
      color:#7386D5;
      background:#fff;
    }

    #sidebar ul li a i {
      margin-right:10px;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
      color:#fff;
      background:#000;
    }

    a[data-toggle="collapse"] {
      position:relative;
    }

    a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
      content:'\e259';
      display:block;
      position:absolute;
      right:20px;
      font-family:'Glyphicons Halflings';
      font-size:0.6em;
    }

    a[aria-expanded="true"]::before {
      content:'\e260';
    }

    ul ul a {
      font-size:0.9em !important;
      padding-left:30px !important;
      background:#000;
    }

    ul.CTAs {
      padding:20px;
    }

    ul.CTAs a {
      text-align:center;
      font-size:0.9em !important;
      display:block;
      border-radius:5px;
      margin-bottom:5px;
    }

    a.download {
      background:#fff;
      color:#7386D5;
    }

    a.article, a.article:hover {
      background:#000 !important;
      color:#fff !important;
    }

    #content {
      padding:20px;
      min-height:100vh;
      transition:all 0.3s;
    }

    @media (max-width: 768px) {
      #sidebar {
        min-width:80px;
        max-width:80px;
        text-align:center;
        margin-left:-80px !important;
      }
    }

    @media (max-width: 768px) {
      a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
        top:auto;
        bottom:5px;
        right:50%;
        -webkit-transform:translateX(50%);
        -ms-transform:translateX(50%);
        transform:translateX(50%);
      }
    }

    @media (max-width: 768px) {
      #sidebar.active {
        margin-left:0 !important;
      }
    }

    @media (max-width: 768px) {
      #sidebar .sidebar-header h3, #sidebar .CTAs {
        display:none;
      }
    }

    @media (max-width: 768px) {
      #sidebar .sidebar-header strong {
        display:block;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a {
        padding:20px 10px;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a span {
        font-size:0.85em;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a i {
        margin-right:0;
        display:block;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul ul a {
        padding:10px !important;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a i {
        font-size:1.3em;
      }
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left:0;
      }
    }

    @media (max-width: 768px) {
      #sidebarCollapse span {
        display:none;
      }
    }

    body {
      overflow-x:hidden;
    }

    #wrapper {
      padding-left:0;
      -webkit-transition:all 0.5s ease;
      -moz-transition:all 0.5s ease;
      -o-transition:all 0.5s ease;
      transition:all 0.5s ease;
    }

    #wrapper.toggled {
      padding-left:250px;
    }

    #sidebar-wrapper {
      z-index:1000;
      position:fixed;
      left:250px;
      width:0;
      height:100%;
      margin-left:-250px;
      overflow-y:auto;
      background:#000;
      -webkit-transition:all 0.5s ease;
      -moz-transition:all 0.5s ease;
      -o-transition:all 0.5s ease;
      transition:all 0.5s ease;
    }

    #wrapper.toggled #sidebar-wrapper {
      width:250px;
    }

    #page-content-wrapper {
      width:100%;
      position:absolute;
      padding:15px;
    }

    #wrapper.toggled #page-content-wrapper {
      position:absolute;
      margin-right:-250px;
    }

    .sidebar-nav {
      position:absolute;
      top:0;
      width:250px;
      margin:0;
      padding:0;
      list-style:none;
    }

    .sidebar-nav li {
      text-indent:20px;
      line-height:40px;
    }

    .sidebar-nav li a {
      display:block;
      text-decoration:none;
      color:#999999;
    }

    .sidebar-nav li a:hover {
      text-decoration:none;
      color:#fff;
      background:rgba(255,255,255,0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
      text-decoration:none;
    }

    .sidebar-nav > .sidebar-brand {
      height:65px;
      font-size:18px;
      line-height:60px;
    }

    .sidebar-nav > .sidebar-brand a {
      color:#999999;
    }

    .sidebar-nav > .sidebar-brand a:hover {
      color:#fff;
      background:none;
    }

    @media (min-width:768px) {
      #wrapper {
        padding-left:250px;
      }
    }

    @media (min-width:768px) {
      #wrapper.toggled {
        padding-left:0;
      }
    }

    @media (min-width:768px) {
      #sidebar-wrapper {
        width:250px;
      }
    }

    @media (min-width:768px) {
      #wrapper.toggled #sidebar-wrapper {
        width:0;
      }
    }

    @media (min-width:768px) {
      #page-content-wrapper {
        padding:20px;
        position:relative;
      }
    }

    @media (min-width:768px) {
      #wrapper.toggled #page-content-wrapper {
        position:relative;
        margin-right:0;
      }
    }

    #wrapper {
      padding-left:0;
      -webkit-transition:all 0.5s ease;
      -moz-transition:all 0.5s ease;
      -o-transition:all 0.5s ease;
      transition:all 0.5s ease;
    }

    #sidebar-wrapper {
      z-index:1000;
      position:fixed;
      left:250px;
      width:0;
      height:100%;
      margin-left:-250px;
      overflow-y:auto;
      background:#000;
      -webkit-transition:all 0.5s ease;
      -moz-transition:all 0.5s ease;
      -o-transition:all 0.5s ease;
      transition:all 0.5s ease;
    }

    .sidebar-nav {
      position:absolute;
      top:0;
      width:250px;
      margin:0;
      padding:0;
      list-style:none;
    }

    .sidebar-nav li {
      text-indent:20px;
      line-height:40px;
    }

    .sidebar-nav li a {
      display:block;
      text-decoration:none;
      color:#999999;
    }

    .sidebar-nav li a:hover {
      text-decoration:none;
      color:#fff;
      background:rgba(255,255,255,0.2);
    }

    .sidebar-nav li a:active, .sidebar-nav li a:focus {
      text-decoration:none;
    }

    .sidebar-nav > .sidebar-brand {
      height:65px;
      font-size:18px;
      line-height:60px;
    }

    .sidebar-nav > .sidebar-brand a {
      color:#999999;
    }

    .sidebar-nav > .sidebar-brand a:hover {
      color:#fff;
      background:none;
    }

    @media (min-width:768px) {
      #wrapper {
        padding-left:250px;
      }
    }

    @media (min-width:768px) {
      #sidebar-wrapper {
        width:250px;
      }
    }

    a, a:hover, a:focus {
      color:inherit;
      text-decoration:none;
      transition:all 0.3s;
    }

    .navbar {
      padding:15px 10px;
      background:#fff;
      border:none;
      border-radius:0;
      margin-bottom:40px;
      box-shadow:1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
      box-shadow:none;
      outline:none !important;
      border:none;
    }

    i, span {
      display:inline-block;
    }

    .wrapper {
      display:flex;
      align-items:stretch;
    }

    #sidebar {
      min-width:250px;
      max-width:250px;
      background:#7386D5;
      color:#fff;
      transition:all 0.3s;
    }

    #sidebar ul li a {
      text-align:left;
    }

    #sidebar .sidebar-header {
      padding:20px;
      background:#000;
    }

    #sidebar .sidebar-header strong {
      display:none;
      font-size:1.8em;
    }

    #sidebar ul.components {
      padding:20px 0;
      border-bottom:1px solid #47748b;
    }

    #sidebar ul li a {
      padding:10px;
      font-size:1.1em;
      display:block;
    }

    #sidebar ul li a:hover {
      color:#7386D5;
      background:#fff;
    }

    #sidebar ul li a i {
      margin-right:10px;
    }

    #sidebar ul li.active > a, a[aria-expanded="true"] {
      color:#fff;
      background:#000;
    }

    a[data-toggle="collapse"] {
      position:relative;
    }

    ul ul a {
      font-size:0.9em !important;
      padding-left:30px !important;
      background:#000;
    }

    #content {
      padding:20px;
      min-height:100vh;
      transition:all 0.3s;
    }

    @media (max-width: 768px) {
      #sidebar {
        min-width:80px;
        max-width:80px;
        text-align:center;
        margin-left:-80px !important;
      }
    }

    @media (max-width: 768px) {
      #sidebar .sidebar-header h3, #sidebar .CTAs {
        display:none;
      }
    }

    @media (max-width: 768px) {
      #sidebar .sidebar-header strong {
        display:block;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a {
        padding:20px 10px;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul li a i {
        margin-right:0;
        display:block;
      }
    }

    @media (max-width: 768px) {
      #sidebar ul ul a {
        padding:10px !important;
      }
    }

    @media (max-width: 768px) {
        #sidebar ul li a i {
            font-size:1.3em;
        }
    }

    @media (max-width: 768px) {
      #sidebar {
        margin-left:0;
      }
    }

    @media (max-width: 768px) {
        #sidebarCollapse span {
            display:none;
        }
    }
</style>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LESSON UPLOAD</title>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"> 
                
                    <a href="javascript:history.back(1)">
                        <i class="glyphicon glyphicon-home"></i>
                        Home 
                    </a>
                </li>
                <li class="active">
                        <a href="#engageSubmenu" data-toggle="collapse" aria-expanded="false">
                           <i class="glyphicon glyphicon-star"></i>
                             Engage
                        </a>
                        <ul class="collapse list-unstyled" id="engageSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#exploreSubmenu" data-toggle="collapse" aria-expanded="false">
                           <i class="glyphicon glyphicon-zoom-in"></i>
                            Explore
                        </a>
                        <ul class="collapse list-unstyled" id="exploreSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#explainSubmenu" data-toggle="collapse" aria-expanded="false">
                           <i class="glyphicon glyphicon-book"></i>
                            Explain
                        </a>
                        <ul class="collapse list-unstyled" id="explainSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#extendSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-blackboard"></i>
                            Extend
                        </a>
                        <ul class="collapse list-unstyled" id="extendSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
                            <i class="glyphicon glyphicon-edit"></i>
                            Evaluate
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="#">Home 1</a></li>
                            <li><a href="#">Home 2</a></li>
                            <li><a href="#">Home 3</a></li>
                        </ul>
                    </li>
                    
            </ul>
        </div>
        
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <b style="font-size: 25px">Title of content</b>
                   <div class="row">
                    <div class="col-md-12">        
                        <div class="well">
                            <div class="tab-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="assets/js/jquery.min.js"></script> -->
    <!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="assets/js/Sidebar-Menu.js"></script>
</body>

</html>
   <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});</script>

