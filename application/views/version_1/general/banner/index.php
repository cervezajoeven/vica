<div class="brainee-page_container col-lg-12">
    <?php $general_class->ben_titlebar();?>
    <?php $datatable = array(
            "th"=>array(
                "Banner Name",
                "Banner Order",
            ),
            "td"=>array(
                "banner_name",
                "banner_order",
            ),
            "data"=>$data,
        );
    ?>
    <?php $general_class->ben_datatable($datatable);?>
</div>