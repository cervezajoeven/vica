<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">

            <div class="header">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-6">
                        <h2>Survey List</h2>
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
                                    <!-- <a href="<?php //echo $general_class->ben_link('general/survey_report/responses?id='.$data_value['id'])?>" class="btn btn-success">View</a> -->
                                    <button type="button" class="btn btn-success" onclick="viewFunc('<?php echo $data_value['id']?>')">View Result</button>
                                    <button type="button" class="btn btn-primary" onclick="viewRemarks('<?php echo $data_value['id']?>')">View Remarks</button>
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

    function viewFunc(surveyid) {        
        window.location.replace('<?php echo $general_class->ben_link('general/survey_report/respond/') ?>' + surveyid);
    }

    function viewRemarks(surveyid) {
        window.location.replace('<?php echo $general_class->ben_link('general/survey_report/remarks/') ?>' + surveyid);
    }
</script>