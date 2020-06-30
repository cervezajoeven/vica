<style type="text/css">
    .ui-autocomplete { max-height: 300px; overflow-y: scroll; overflow-x: hidden;}
</style>

<div style="padding:0px;">
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                
                <?php echo $general_class->ben_open_form("sms/".$general_class->current_page['controller']."/save"); ?>
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>Log</h2>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                        </ul>
                    </div>
                    <div class="body">
                        <table width="100%">
                            <tr>                                
                                <td width="30%" style="5px; padding-right: 5px;">
                                    <label for="datefilter">Date</label>
                                    <input type="text" id="datefilter" name="datefilter" class="form-control input-md col-sm-6" value="" placeholder="Select Date"/>
                                </td>
                                <td width="30%" style="5px; padding-right: 5px;">
                                    <label for="full_name">Name</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control input-md col-sm-6" autocomplete="off" placeholder="Search Name" aria-describedby="basic-addon2">
                                </td>
                                <td width="40%" style="padding-left: 5px; padding-right: 5px;">
                                    <button id="btnshow" class="btn btn-success">Show Logs</button>
                                </td>
                            </tr>
                        </table>
                        
                        <table id="attendance_log" class="display responsive" style="width:100%" >
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Type</th>
                                </tr>
                            </tfoot>
                        </table>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $general_class->datatable_clear() ?>
<?php $css_directory = $general_class->ben_resources('version_1/css/general/home/'); ?>
<?php $js_directory = $general_class->ben_resources('version_1/js/general/home/'); ?>

<!-- <script src="<?php //echo $general_class->ben_resources('lms/jquery-1.12.4.js'); ?>"></script> -->

<!-- Bootstrap core JavaScript -->
<!-- <script src="<?php //echo $css_directory; ?>vendor/jquery/jquery.min.js"></script> -->
<!-- autocomplete -->
<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jquery-ui.css'); ?>">
<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/jqueryui.com/style.css'); ?>">
<script src="<?php echo $general_class->ben_resources('lms/jquery-ui.js'); ?>"></script>    

<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms'); ?>/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms'); ?>/daterangepicker.css">
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms'); ?>/daterangepicker.min.js"></script>

<script>
    var account_id = "";
    var start_date = "";
    var end_date = "";

    var table = $('#attendance_log').DataTable({
        prerender: true,
        responsive: true,
        searching: false,
        dom: 'Bfrtip',
        //buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
        buttons: [
            { extend: 'excelHtml5',
            text : 'Export to EXCEL',
            customize: function ( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
            
                $('c[r=A1] t', sheet).text($('#full_name').val() + ' (Log Date: ' + ($('#datefilter').val()==""?"ALL":$('#datefilter').val()) + ')');
            },
            filename: function(){
                            var d = new Date();
                            var n = d.getTime();
                            return $('#full_name').val() + '-' + n;
                        }, 
            },
            { extend: 'pdfHtml5',
            text : 'Export to PDF',
            title: function() {
                return $('#full_name').val() + ' (Log Date: ' + ($('#datefilter').val()==""?"ALL":$('#datefilter').val()) + ')';
            },
            filename: function(){
                            var d = new Date();
                            var n = d.getTime();
                            return $('#full_name').val() + '-' + n;
                        }, 
            }
        ],
        ajax: {
            "url": "<?php echo $general_class->ben_link('sms/attendance/log_ajax/0/0/0') ?>",
            // "data": {
            //     "id": '',
            //     "start": '',
            //     "end": ''
            // },
            "type": "POST"
        }
    });

    // Single Select
    $( "#full_name" ).autocomplete({
        autofocus: true,
        source: function( request, response ) {
            // Fetch data
            $.ajax({
                url: '<?php echo $general_class->ben_link("sms/attendance/autocomplete_user/")?>',
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function (event, ui) {
            // Set selection
            $('#full_name').val(ui.item.label); // display the selected text
            //$('#selectuser_id').val(ui.item.value); // save selected id to input
            account_id = ui.item.value;

            //ShowResult();
            return false;
        }
    }).keyup(function() {
        //alert($( "#full_name" ).data);
        account_id = "";
        table.clear().draw();
    })

    $('input[name="datefilter"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }, 
        function(start, end, label) {
            // var years = moment().diff(start, 'years');
            // alert("You are " + years + " years old!");
            // start_date = start.format('YYYY-MM-DD');
            // end_date = end.format('YYYY-MM-DD');
        }
    });

    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));

        start_date = picker.startDate.format('YYYY-MM-DD');
        end_date = picker.endDate.format('YYYY-MM-DD');
    });

    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
        start_date = '';
        end_date = '';
    });

    $('#btnshow').on('click', function(e) {
        e.preventDefault();
        ShowResult();
    });

    function ShowResult() {
        if ($( "#full_name" ).val() != "" && account_id != "") {
            var url = "<?php echo $general_class->ben_link('sms/attendance/log_ajax/') ?>" + account_id + "/" + (start_date==""?"0":start_date)+ "/" + (end_date==""?"0":end_date);
            table.ajax.data = { "id": account_id, "start": start_date, "end": end_date };
            table.ajax.url(url);
            table.ajax.reload();
        }        
    }
    
</script>
<!-- autocomplete -->
<script src="<?php echo $css_directory; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
