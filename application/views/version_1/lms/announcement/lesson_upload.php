<style>
*, *:before, *:after {
  -webkit-box-sizing:border-box;
  -moz-box-sizing:border-box;
  box-sizing:border-box;
}

input:focus, select:focus, textarea:focus, button:focus {
  outline:none;
}

.drop {
  width:100%;
  height:220px;
  border:3px dashed #DADFE3;
  border-radius:15px;
  overflow:hidden;
  text-align:center;
  background:transparent;
  -webkit-transition:all 0.5s ease-out;
  -moz-transition:all 0.5s ease-out;
  transition:all 0.5s ease-out;
  margin-top:0px;
  margin-right:auto;
  margin-left:auto;
  margin-bottom:10px;
  position:absolute;
  bottom:auto;
  left:0;
  right:0;
}

.drop .cont {
  height:50%;
  color:#8E99A5;
  -webkit-transition:all 0.5s ease-out;
  -moz-transition:all 0.5s ease-out;
  transition:all 0.5s ease-out;
  margin:auto;
  position:absolute;
  top:0;
  left:0;
  bottom:0;
  right:0;
}

.drop .cont i {
  font-size:30px;
  color:#787e85;
  position:relative;
}

.drop .cont .tit {
  font-size:26px;
  text-transform:uppercase;
  font-weight:900;
}

.drop .cont .desc {
  color:#787e85;
  font-size:12px;
}

.drop .cont .browse {
  margin:10px 25%;
  color:white;
  padding:4px 8px;
  border-radius:4px;
  background:#00c993;
}

.drop input {
  width:100%;
  height:100%;
  cursor:pointer;
  background:red;
  opacity:0;
  margin:auto;
  position:absolute;
  top:0;
  left:0;
  bottom:0;
  right:0;
}

#list {
  width:100%;
  text-align:left;
  position:absolute;
  left:0;
  top:0;
}

.dashed_upload {
  height:200px;
}

.nav-tabs {
    width:100%;
  border-bottom:none;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  color:#555;
  cursor:default;
  border:none;
  border-bottom:solid 5px red;
  line-height:normal;
}

.nav > li > a:focus, .nav > li > a {
  text-decoration:none;
  margin:0;
  line-height:normal;
  border:none;
  border-bottom:solid 5px gray;
}

.nav-tabs > li > a:hover {
  border:none;
  border-bottom:solid 5px gray;
}

.tab-content {
  padding:10px;
}

.nav-tabs > li > a {
  border-radius:0;
  margin:0;
  line-height:normal;
  color:black;
  font-size:20px;
}

.nav-tabs > li {
  float:left;
  margin-bottom:-1px;
  width:20%;
}

.nav-tabs {
  border-bottom:none;
}

.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
  color:#555;
  cursor:default;
  border:none;
  border-bottom:solid 5px red;
  line-height:normal;
}

.nav > li > a:focus, .nav > li > a {
  text-decoration:none;
  margin:0;
  line-height:normal;
  border:none;
  border-bottom:solid 5px #222;
}

.nav-tabs > li > a:hover {
  border:none;
  border-bottom:solid 5px gray;
}

.tab-content {
  padding:10px;
}

.nav-tabs > li > a {
  border-radius:0;
  margin:0;
  line-height:normal;
  color:black;
  font-size:20px;
}

.nav-tabs > li {
  float:left;
  margin-bottom:-1px;
  width:20%;
}


</style>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LESSON</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Drag--Drop-Upload-Form.css">
    <link rel="stylesheet" href="assets/css/Minimal-tabs-1.css">
    <link rel="stylesheet" href="assets/css/Minimal-tabs.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="minimal-tabs">
       <h2 style="margin-left:5px">Title of lesson</h2>
        <ul class="nav nav-tabs">
            <li  class="active"><a href="#tab-1" role="tab" data-toggle="tab">Engage</a></li>
            <li><a href="#tab-2" role="tab" data-toggle="tab">Explore</a></li>
            <li><a href="#tab-3" role="tab" data-toggle="tab">Explain</a></li>
            <li><a href="#tab-4" role="tab" data-toggle="tab">Extend</a></li>
            <li><a href="#tab-5" role="tab" data-toggle="tab">Evaluate</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                <h1>Engage</h1>
                
                <div class="col-md-3 relative">
                <div class="container">
        <div class="dashed_upload"><div class="wrapper">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple name="files[]" type="file" />
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </div>
    </div>
         <br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button>
          
           </div>
           <div class="col-md-9" style="box-shadow: 1px 1px 1px 1px #888888;">
           
           Preview Content
           <iframe src="http://docs.google.com/viewer?url={HTTP PATH OF THE PDF FILE}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>
                </div>
           
           
           
           </div>
            <div class="tab-pane" role="tabpanel" id="tab-2">
                <h1>Explore</h1>
                <div class="col-md-3 relative">
                <div class="container">
        <div class="dashed_upload"><div class="wrapper">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple name="files[]" type="file" />
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </div>
    </div>
          
          <br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button>
          
           </div>
           <div class="col-md-9" style="box-shadow: 1px 1px 1px 1px #888888;">
           
           Preview Content
           <iframe src="http://docs.google.com/viewer?url={HTTP PATH OF THE PDF FILE}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab-3">
                <h1>Explain</h1>
               <div class="col-md-3 relative">
                <div class="container">
        <div class="dashed_upload"><div class="wrapper">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple name="files[]" type="file" />
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </div>
    </div>
          <br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button>
          
           </div>
           <div class="col-md-9" style="box-shadow: 1px 1px 1px 1px #888888;">
           
           Preview Content
           <iframe src="http://docs.google.com/viewer?url={HTTP PATH OF THE PDF FILE}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab-4">
                <h1>Extend</h1>
                <div class="col-md-3 relative">
                <div class="container">
        <div class="dashed_upload"><div class="wrapper">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple name="files[]" type="file" />
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </div>
    </div>
           <br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button>
          
           </div>
           <div class="col-md-9" style="box-shadow: 1px 1px 1px 1px #888888;">
           
           Preview Content
           <iframe src="http://docs.google.com/viewer?url={HTTP PATH OF THE PDF FILE}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab-5">
                <h1>Evaluate</h1>
                <div class="col-md-3 relative">
                <div class="container">
        <div class="dashed_upload"><div class="wrapper">
  <div class="drop">
    <div class="cont">
      <i class="fa fa-cloud-upload"></i>
      <div class="tit">
        Drag & Drop
      </div>
      <div class="desc">
        or 
      </div>
      <div class="browse">
        click here to browse
      </div>
    </div>
    <output id="list"></output><input id="files" multiple name="files[]" type="file" />
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    </div>
    </div>
          
           <br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button><br><br>
          <button class="btn btn-primary form-btn">Content</button>
          
           </div>
           <div class="col-md-9" style="box-shadow: 1px 1px 1px 1px #888888;">
           
           Preview Content
           <iframe src="http://docs.google.com/viewer?url={HTTP PATH OF THE PDF FILE}&embedded=true" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

    <script>
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});</script>