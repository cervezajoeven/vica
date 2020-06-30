<link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms'); ?>/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms'); ?>/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo $general_class->ben_resources('lms'); ?>/select.dataTables.min.css">
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms'); ?>/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms'); ?>/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?php echo $general_class->ben_resources('lms'); ?>/dataTables.select.min.js"></script>
<script type="text/javascript">

    $('#example tfoot th').each(function (key,value) {
        var title = $(this).text();
        // if(key!=0&&key!=1){
            $(this).html('<input type="text" style="width:100%" placeholder="' + title + '" />');
        // }else{
            // $(this).css("width","10px");
        // }
    });
    var table = $('#example').DataTable({
        initComplete: function(settings, json) {

        },
        lengthChange: false,
        pageLength: 10,
        columnDefs: [ 
            {
                // orderable: false,
                // className: 'select-checkbox',
                // targets:   1,
            },
            // {width:"1px",targets:3},
        ],
        // select: {
        //     style:    'os',
        //     selector: 'td:nth-child(2)'
        // },
        // order: [[ 1, 'asc' ]]
    });

    table.on( 'draw', function () {
        
    } );

    $('#example tbody').on('click', 'tr', function () {
       
        if($(this).hasClass('selected')){
            var data = table.row( this ).deselect();
        }else{
            var data = table.row( this ).select();

        }
    });

    // Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });
    

    var r = $('#example tfoot tr');
    $('#example tbody tr').css('cursor','pointer');
    r.find('th').each(function (key,value) {
        $(this).css('padding', 8);
        if(key==0){
            // $(this).addClass("hidden-lg hidden-md hidden-sm");
        }
        
    });
    var selectedRows = table.rows({ selected: true }).ids(true);
    $('#example thead').append(r);
    // $('#search_0').css('text-align', 'center');

</script>