<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("lms/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Blackboard</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <a href="<?php echo $general_class->ben_link('lms/lesson/create');?>"><button class="btn btn-success waves-effect" type="button">Create</button></a>
                        </div>
                        

                    </ul>
                </div>
                <div class="body">

          			    
                </div>
            </form>
        </div>
    </div>
</div>


<?php $general_class->datatable_clear() ?>

<script type="text/javascript">

</script>