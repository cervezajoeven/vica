<?php $module_controller = $general_class->ben_link("").$page_structure['module']."/".$page_structure['controller']."/"?>
<style type="text/css">
    #example td{
        cursor: pointer;
    }
</style>
<script type="text/javascript">
	$(document).ready(function(){
        var module_controller = "<?php echo $module_controller ?>";

        function alert_box(content,action,type){
            $("#alert_content").text(content);
            $("#alert_content").addClass("btn-"+type);
            $("#alert_confirm_button").addClass("btn-"+type);
            $("#alert_confirm_button").text(action);
            $("#alert_modal").modal();
        }

        $("#alert_confirm_button").click(function(){
            $('#titlebar_form').submit();
        });

		$("#myModal").modal();

        $("#action_view").hide();
        $("#action_update").hide();
        $("#action_delete").hide();
        $('#confimation_modal').modal({ show: false});
		$('#example tfoot th').each(function (key,value) {
            var title = $(this).text();
            if(key!=0&&key!=1){
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            }else{
                $(this).css("width","10px");
            }
        });

        $("#action_delete").on("click", function(e){
            e.preventDefault();
            alert_box("Are you sure you want to delete these data?","Delete","danger");
            $('#titlebar_form').attr('action', "delete");
        });
        $("#action_update").on("click", function(e){
            e.preventDefault();
            $('#titlebar_form').attr('action', "update").submit();
        });
        $("#action_view").on("click", function(e){
            e.preventDefault();
            $('#titlebar_form').attr('action', "read").submit();
        });

        var table = $('#example').DataTable({
            initComplete: function(settings, json) {

            },
            columnDefs: [ 
                {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   1,
                },
                {width:"10px",targets:3},
            ],
            select: {
                style:    'os',
                selector: 'td:nth-child(2)'
            },
            order: [[ 1, 'asc' ]]
        });

        table.on( 'draw', function () {
            
        } );

        // $('#example tbody').on('click', 'tr', function () {
           
        //     if($(this).hasClass('selected')){
        //         var data = table.row( this ).deselect();
        //     }else{
        //         var data = table.row( this ).select();

        //     }
        // } );

        // Apply the search
        table.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
        
        table.on('select', function ( e, dt, type, indexes ) {
            var stored_id = [];
            var select_length = $("tbody").find(".selected").length;
            var selected = table.$(".select-checkbox", {"page": "all"});
            $.each(selected,function(key,value){
                
                if($(value).parent().hasClass("selected")){
                    stored_id.push($(value).attr("data-id"));
                }
            });
            var stringified = JSON.stringify(stored_id);
            $("#id_storage").val(stringified);

            if(select_length==1){
                
                if (typeof one !== 'undefined' && $.isFunction(one)) {
                    one();
                }
                $("#action_view").show();
                $("#action_update").show();
                $("#action_delete").show();
            }else if(select_length>1){
                if (typeof many !== 'undefined' && $.isFunction(many)) {
                    many();
                }
                $("#action_view").hide();
                $("#action_update").hide();
            }
        });

        table.on('deselect', function ( e, dt, type, indexes ) {
            var select_length = $("tbody").find(".selected").length;
            if(select_length==0){
                if (typeof all_deselected !== 'undefined' && $.isFunction(all_deselected)) {
                    all_deselected();
                }
                $("#action_view").hide();
                $("#action_update").hide();
                $("#action_delete").hide();
            }
        });
        var r = $('#example tfoot tr');
        r.find('th').each(function (key,value) {
            $(this).css('padding', 8);
            if(key==0){
                // $(this).addClass("hidden-lg hidden-md hidden-sm");
            }
            
        });
        var selectedRows = table.rows({ selected: true }).ids(true);
        $('#example thead').append(r);
        $('#search_0').css('text-align', 'center');
        
	});
</script>
<script>

</script>
</body>
</html>