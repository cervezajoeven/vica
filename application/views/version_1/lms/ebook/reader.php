<style type="text/css">
    iframe{
        width: 100%;
        height: 800px;
    }
    .ebook_title{
        font-size: 20px;
        text-align: center;
        padding: 10px;
    }
</style>
<div class="row clearfix">
    
    <a href="">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="ebook_title">
                    <p><?php echo ucwords(str_replace("_", " ", $general_class->data['ebook'])) ?></p>
                </div>
                <iframe src="<?php echo $general_class->ben_resources('uploads/ebooks/').$general_class->data['ebook']; ?>"></iframe>
            </div>
        </div>
    </a>
    
</div>


<?php $general_class->datatable_clear() ?>
