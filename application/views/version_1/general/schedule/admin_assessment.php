
<link href='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>core/main.css' rel='stylesheet' />
<link href='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>daygrid/main.css' rel='stylesheet' />
<link href='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>timegrid/main.css' rel='stylesheet' />
<link href='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>list/main.css' rel='stylesheet' />
<script src='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>core/main.js'></script>
<script src='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>interaction/main.js'></script>
<script src='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>daygrid/main.js'></script>
<script src='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>timegrid/main.js'></script>
<script src='<?php echo $general_class->ben_resources('lms/fullcalendar/packages/'); ?>list/main.js'></script>
<script src='<?php echo $general_class->ben_resources('lms/'); ?>jscolor.js'></script>
<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/'); ?>jquery-ui.css">
<style type="text/css">
    .fc-event-container{
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    
</script>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/save"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>LMS Assessment Schedule</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">
                        <div class="js-sweetalert">

                            <!-- <a href="<?php echo $general_class->ben_link('lms/lesson/create');?>"><button class="btn btn-success waves-effect" type="button">Save</button></a> -->
                            <a href="#" id="save"><button class="btn btn-success waves-effect" type="button">Save</button></a>
                        </div>


                    </ul>
                </div>
                <div class="body">
           
          			<div id='calendar'></div>

                </div>

                <!-- Start Modal -->
                <div id="modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <form id="add_event">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">New Schedule</h4>
                              </div>
                              <div class="modal-body">
                                
                                    <table class="table">
                                        <tr>
                                            <td>Topic</td>
                                            <td><input id="topic" type="text" name="topic" class="form-control" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Section</td>
                                            <td><input id="sections" type="text" name="" class="form-control" required=""></td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td><input id="color" value="#3788d8" type="text" name="" class="jscolor form-control" required=""></td>
                                        </tr>
                                    </table>

                                <input type="hidden" id="selected_section" name="">
                              </div>
                              <div class="modal-footer">
                                <button id="add" type="submit" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Edit Start Modal -->
                <div id="edit_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <form id="edit_event">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Details</h4>
                              </div>
                              <div class="modal-body">
                                <table class="edit_table table">
                                    <tr>
                                        <td>Topic</td>
                                        <td style="font-weight: bold" id="topic_label"></td>
                                    </tr>
                                    <tr>
                                        <td>Start : </td>
                                        <td id="start_date"></td>
                                    </tr>
                                    <tr>
                                        <td>End : </td>
                                        <td id="end_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Sections : </td>
                                        <td id="assigned_sections">
                                            
                                        </td>
                                    </tr>
                                </table>
                                <input type="hidden" id="edit_selected_section" name="">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                
                                
                              </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Edit End Modal -->
            </form>
        </div>
    </div>
</div>



<?php $general_class->datatable_clear() ?>
<script src="<?php echo $general_class->ben_resources('lms/'); ?>jquery-ui.js"></script>
<script>
var jq = $.noConflict();

var availableTags = [
    <?php foreach ($data['sections'] as $key => $value): ?>
        {value:"<?php echo $value['id']?>",label:"<?php echo $value['section_name']?>"},
    <?php endforeach; ?>
    
];
jq("#sections").autocomplete({
    source: availableTags,
    appendTo: ".table",
    select: function(event, ui) {
        event.preventDefault();
        $("#sections").val(ui.item.label);
        $("#selected_section").val(ui.item.value);
    },
    focus: function(event, ui) {
        event.preventDefault();
        $("#sections").val(ui.item.label);
    },
    change: function (event, ui) {
        if(!ui.item){
            $("#sections").val("");
        }

    }
});
jq("#edit_sections").autocomplete({
    source: availableTags,
    appendTo: ".edit_table",
    select: function(event, ui) {
        event.preventDefault();
        $("#edit_sections").val(ui.item.label);
        $("#edit_selected_section").val(ui.item.value);
    },
    focus: function(event, ui) {
        event.preventDefault();
        $("#edit_sections").val(ui.item.label);
    },
    change: function (event, ui) {
        if(!ui.item){
            $("#edit_sections").val("");
        }

    }
});

document.addEventListener('DOMContentLoaded', function() {
    var current_arg;
    var edit_event = [];
    <?php if(!empty($data['schedule'])): ?>
        // var feed = '<?php echo htmlspecialchars_decode($data['schedule'][0]['schedule']) ?>';
        var feed = '<?php echo htmlspecialchars_decode($data['schedule'][0]['schedule']) ?>';
        console.log(<?php echo $general_class->data['the_schedule']?>);
    <?php else: ?>
        var feed = "[]";
    <?php endif; ?>
    feed = JSON.parse(feed);

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'
        },
        eventRender: function(info) {
            
        },
        defaultDate: '<?php echo date('Y-m-d'); ?>',
        navLinks: true, // can click day/week names to navigate views
        defaultView: 'dayGridMonth',
        weekNumbers: true,
        weekNumbersWithinDays: true,
        weekNumberCalculation: 'ISO',
        minTime: "05:00:00",
        maxTime: "18:00:00",
        // hiddenDays: [0,6],
        selectable: false,
        selectMirror: true,
        select: function(arg) {
            $('#modal').modal('show');
            $("#topic").val("");
            $("#sections").val("");
            current_arg = arg;

        },
        eventClick: function(info) {
            
            $('#edit_modal').modal('show');
            var custom_data = info.event.extendedProps;
            var edit_section = custom_data.section;
            var edit_section_id = custom_data.section_id;
            var edit_topic = custom_data.topic;
            var edit_color = info.event.backgroundColor;
            var start_date = info.event.start.toLocaleString();
            var end_date = info.event.end.toLocaleString();
            $("#topic_label").text(info.event.extendedProps.topic);
            $("#start_date").text(start_date);
            $("#end_date").text(end_date);
            if(info.event.extendedProps.sections){
                $("#assigned_sections").text(info.event.extendedProps.sections);
            }else{
                $("#assigned_sections").text("Unassigned");
            }
            

            console.log(info.event);
            $("#edit_color").css("background-color",edit_color);
            $("#edit_selected_section").val(edit_section_id);
            current_arg = info;
        },

        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: <?php echo $general_class->data['the_schedule']?>,
    });

    calendar.render();

    $(document).submit(function(e){
        $('#modal').modal('hide');
        $('#edit_modal').modal('hide');
        e.preventDefault();

    });
    $(document).on("click","#add",function(e){
        if($("#topic").val()!=''&&$("#sections").val()!=''){
            var topic = $("#topic").val();
            var section = $("#sections").val();
            var color = $("#color").val();
            calendar.addEvent({
                id: new Date().getTime() / 1000,
                title: topic+" - "+section,
                start: current_arg.start,
                end: current_arg.end,
                allDay: current_arg.allDay,
                color  : '#'+color,
                section_id  : $("#selected_section").val(),
                section  : section,
                topic  : topic,
            });
        }
        
    });


    $(document).on("click","#edit",function(){
        var topic = $("#edit_topic").val();
        var section = $("#edit_sections").val();
        var color = $("#edit_color").val();

        var edit_event = calendar.getEventById(current_arg.event.id);
        edit_event.setProp('title',topic+" - "+section);
        if(color.includes('#')){
            edit_event.setProp('color',color);
        }else{
            edit_event.setProp('color',"#"+color);
        }
        edit_event.setExtendedProp('section_id',$("#edit_selected_section").val());
        edit_event.setExtendedProp('section',section);
        edit_event.setExtendedProp('topic',topic);
        
    });
    $(document).on("click","#delete",function(){
        var topic = $("#edit_topic").val();
        var section = $("#edit_sections").val();
        var color = $("#edit_color").val();

        var edit_event = calendar.getEventById(current_arg.event.id).remove();
        
    });
    $("#save").click(function(){

        var save_url = "<?php echo $general_class->ben_link('general/schedule/save') ?>";
        var account_id = "<?php echo $general_class->session->userdata('id') ?>";

        var schedule = calendar.getEvents().map(function(e) {
            return {
                id:e.id,
                title:e.title,
                start:e.start,
                end:e.end,
                allDay:e.allDay,
                color:e.backgroundColor,
                section_id:e.extendedProps.section_id,
                section:e.extendedProps.section,
                topic:e.extendedProps.topic,
            }
        });
        schedule = JSON.stringify(schedule);

        $.ajax({
            type: "POST",
            url: save_url,
            data: {account_id:account_id,schedule:schedule},
            success: function (result) {
                if(result=='success'||result=='update success'){
                    alert("Successfully saved");
                }
               
            }
        });

        
    });
});


</script>