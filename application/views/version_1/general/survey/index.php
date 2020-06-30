<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">

            <?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Create Survey</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">
                            <input type="submit" name="" class="btn btn-success waves-effect" value="Create">
                        </div>


                    </ul>
                </div>
                <div class="body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" required="" name="survey_name" class="form-control" placeholder="Survey Name">
                        </div>
                        
                    </div>

                    
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Survey</h2>
                    </div>
                </div>
                <ul class="header-dropdown m-r--5">
                

                </ul>
            </div>
            <div class="body">
      			<table id="example" class="display responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>Survey Name</th>
                            <th>Creator</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $data_key=>$data_value): ?>
                            <tr>
                                <td><?php echo $data_value['survey_name']; ?></td>   
                                <td><?php echo $data_value['first_name']; ?> <?php echo $data_value['last_name']; ?></td>
                                <td><?php echo date("h:i A, F d, Y",strtotime($data_value['date_created'])); ?></td>
                                <td>
                                    <button data-id="<?php echo $data_value['id']; ?>" class="form-control btn btn-warning update">Update</button>
                                    <button data-id="<?php echo $data_value['id']; ?>" class="form-control btn btn-danger delete">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Survey Name</th>
                            <th>Creator</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>          
                

            </div>
        </div>
    </div>
</div>


<?php $general_class->datatable_clear() ?>

<script type="text/javascript">

    var table = $('#example').DataTable({
        "aaSorting": []
    });

    $(".delete").click(function(){
        if(confirm("Are you sure you want to delete this survey?")){
            window.location.replace("<?php echo $general_class->ben_link('general/survey/delete') ?>/"+$(this).attr('data-id'));
        }
    });
    $(".update").click(function(){
        if(confirm("Are you sure you want to update this survey?")){
            window.location.replace("<?php echo $general_class->ben_link('general/survey/edit') ?>/"+$(this).attr('data-id'));
        }
    });

   

</script>