<style type="text/css">
    .bootstrap-select .dropdown-toggle .filter-option{
        padding:0!important;
    }
    .bs-caret{
        display: none;
    }
</style>

<?php $banner_data = $general_class->data['banner_data']?>
<?php $announcement_data = $general_class->data['announcement_data']?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12">
                        <h1>Welcome to <?php echo $school_status['shortcut'] ?> Community</h1>
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
                <!-- Modal Size Example -->

                <div class="col-lg-12 text-center">
                  <h3 class="section-heading text-uppercase">Announcements</h3>
                </div>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                  </ol>

                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">

                    <div class="item active">
                      <img src="<?php echo $general_class->ben_resources('uploads/banners/image_1.png'); ?>" alt="">
                    </div>
                    <div class="item">
                      <img src="<?php echo $general_class->ben_resources('uploads/banners/image_2.png'); ?>" alt="">
                    </div>
                    <div class="item">
                      <img src="<?php echo $general_class->ben_resources('uploads/banners/image_3.png'); ?>" alt="">
                    </div>
                    <div class="item">
                      <img src="<?php echo $general_class->ben_resources('uploads/banners/image_4.png'); ?>" alt="">
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

                <button type="button" id="change_password_button" data-backdrop="static" data-keyboard="false" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#defaultModal" style="display: none;">Change Password</button>
                <button type="button" id="change_password_success_button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-color="green" data-target="#change_password_success" style="display: none;">Show Success</button>
                


            </div>
            
        </div>
    </div>
</div>

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo $general_class->ben_link('general/account/change_password') ?>" method="POST" >
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Please Change Your Password Here</h4>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td><?php echo $data['the_user']['first_name']?> <?php echo $data['the_user']['last_name']?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input id="password" type="password" class="form-control" autocomplete="new-password" required="" name="password"></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input id="confirm_password" class="form-control" autocomplete="autocomplete" type="password" name="confirm_password"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-link waves-effect">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="change_password_success" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-col-green">
                
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Success</h4>
            </div>
            <div class="modal-body">
                <h1>You have successfully changed your password!</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss='modal'>Close</button>
            </div>
            
        </div>
    </div>
</div>
<script type="text/javascript">
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){

        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    <?php if($data['trigger_change_password']): ?>
        $(document).ready(function(){
            $("#change_password_button").click();
        });
    <?php endif;?>
    <?php if($this->session->flashdata('change_password_successful')): ?>
        $(document).ready(function(){
            $("#change_password_success_button").click();
        });
    <?php endif;?>
    
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>