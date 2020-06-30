<link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms/multi-select.css') ?>">
<style type="text/css">
    .form-control{
        border-bottom: 1px solid #e9e9e9;
    }
    .hrline {
       width: 100%; 
       text-align: center; 
       border-bottom: 1px solid #000; 
       line-height: 0.1em;
       margin: 10px 0 20px; 
    } 

    .hrline span { 
        background:#fff; 
        padding:0 10px;
    }
    .custom-header{
        background-color: rgb(50,50,50);
        color:white;
        text-align: center;
    }
</style>
<div class="row clearfix">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            
            <?php echo $general_class->ben_open_form("general/".$general_class->current_page['controller']."/text_blast_send"); ?>
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>Text Blast</h2>
                        </div>
                    </div>
                    <ul class="header-dropdown m-r--5">

                    </ul>
                </div>
                <div class="body">
                    <div class="form-group">
                        <div class="form-line">
                            <label>Title</label>
                            <input type="text" class="form-control" name="sms_title" name="" placeholder="Title">
                        </div>
                        
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="form-line">
                            <label>Text Message</label>
                            <textarea class="form-control" name="sms_message" placeholder="Enter message here..." onkeyup="countChar(this)"></textarea>

                        </div>
                        <label id="charNum"></label>
                    </div>

                  
                    
                    <label>Send To</label>
                    <div class="demo-checkbox">
                        <input type="checkbox" id="all" checked/>
                        <label for="all">All</label>
                    </div>
                    <p class="hrline"><span>OR</span></p>
                    <?php $grade_array = array(); ?>
                    <?php foreach ($data['sections'] as $section_key => $section_value) :?>
                        <?php array_push($grade_array, array($section_value['grade_id'],$section_value['grade_name'])) ?>
                    <?php endforeach; ?>
                    <div class="section_container">
                        <select id="section" class="form-control hidden" multiple="">
                            
                            <!-- <option value="faculty">Faculty</option> -->
                            <?php foreach ($data['sections'] as $section_key => $section_value): ?>
                                <!-- <option><?php echo $section_value['section_name']?></option> -->
                                <option value="<?php echo $section_value['id'] ?>">
                                    <?php echo $section_value['section_name']; ?></option>
                                
                            <?php endforeach; ?>
                            
                        </select>
                    </div>
                    <input type="hidden" name="recipient" id="recipient">
                    <input type="submit" class="btn btn-success form-control" value="Blast!" name="">
                </div>
            </form>
        </div>
    </div>
</div>

<?php $general_class->datatable_clear() ?>
<script src="<?php echo $general_class->ben_resources('lms/jquery.multi-select.js') ?>"></script>
<script type="text/javascript">
    var selected = [];
    $(".section_container").hide();
    $(".hrline").hide();
    $("#all").click(function(){
        var atLeastOneIsChecked = $('#all:checkbox:checked').length > 0;
        if(atLeastOneIsChecked){
            $("#section").attr("disabled","");
            $(".hrline").slideUp();
            $(".section_container").slideUp();
        }else{
            $(".hrline").slideDown();
            $(".section_container").slideDown();
        }
        $('#section').multiSelect('refresh');
    });

    Array.prototype.remove = function() {
        var what, a = arguments, L = a.length, ax;
        while (L && this.length) {
            what = a[--L];
            while ((ax = this.indexOf(what)) !== -1) {
                this.splice(ax, 1);
            }
        }
        return this;
    };
    $('#section').multiSelect({
        selectableHeader: "<div class='custom-header'>Recipients</div>",
        selectionHeader: "<div class='custom-header'>Send To</div>",
        afterSelect: function(values){
            selected.push(values[0]);
            
            $("#recipient").val(selected.join(","));

            console.log($("#recipient").val());
        },
        afterDeselect: function(values){
            selected.remove(values[0]);
            $("#recipient").val(selected.join(","));
            console.log($("#recipient").val());
        },

    });
    function countChar(val) {
        var len = val.value.length;
        if (len >= 160) {
          val.value = val.value.substring(0, 160);
        } else {
            var total_count = 160 - len;
            $('#charNum').text(total_count+"/160");
        }
    };
</script>