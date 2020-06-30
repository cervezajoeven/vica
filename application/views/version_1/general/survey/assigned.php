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
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $data_key=>$data_value): ?>
                            <tr>
                                <td><?php echo $data_value['survey_name']; ?></td>   
                                <td><?php echo date("h:i A, F d, Y",strtotime($data_value['date_created'])); ?></td>
                                <td>
                                    <button class="form-control btn btn-warning respond" data-id="<?php echo $data_value['id']; ?>">Respond</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Survey Name</th>
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

    $(".respond").click(function(){
        if(confirm("Respond to this survey?")){
            window.location.replace("<?php echo $general_class->ben_link('general/survey/respond') ?>/"+$(this).attr('data-id'));
        }
    });

   

</script>