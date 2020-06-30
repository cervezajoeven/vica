<style type="text/css">
    .bootstrap-select .dropdown-toggle .filter-option{
        padding:0!important;
    }
    .bs-caret{
        display: none;
    }
    .the_iframe{
        height: 800px;
    }
</style>

<?php $banner_data = $general_class->data['banner_data']?>
<?php $announcement_data = $general_class->data['announcement_data']?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <?php 
                $the_url = urlencode(base_url('resources/uploads/circulation/')."ncov.pdf");

            ?>
           <iframe class="the_iframe" width="100%" src="<?php echo base_url();?>resources/pdfjs/web/viewer.html?file=<?php echo $the_url ?>"></iframe>
            
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
