<!DOCTYPE html>
<html>
<head>
	<title>Control</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/boostrap.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/bootstrap-theme.min.css')?>">

	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/fileinput.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/fileinput.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/jquery-ui.css')?>">

    
    <style type="text/css">
    	.folder{
		    border-top: 1px solid gray;
		    /*border-left: 1px solid gray;*/
		    border-right: 1px solid gray;
		    padding: 0px;
    	}
    	.folder:last-child{
		    border-right: 1px solid gray;
    	}
    	.folder_title_container{
    		width: 100%;
    	}
    	.folder_title{
		    font-size: 20px;
		    padding: 10px;
		    min-height: 76px;
		    text-align: center;
    	}
    	.folder_contents{
    		padding-right: 10px;
    		padding-left: 10px;
    		height: auto;
    	}
    	.ben-default.file-preview-frame {
		    margin: 8px;
		    border: 1px solid #ddd;
		    box-shadow: 1px 1px 5px 0 #a2958a;
		    padding: 6px;
		    float: left;
		    width: 93%;
		    text-align: center;
		    cursor: move;
		}
		table th{
			text-align: center;
			width: 16%;
		}
		ul{
			list-style-type: none;
			margin: 0;
  			padding: 0;
		}
		.thumbnail_text{
			margin-top: 10px;
		}
    </style>
</head>
<body>
	
	<?php $views_data = $general_class->data; ?>
	<!-- <pre> -->
		<!-- <?php var_dump(trim($views_data['lesson_data']['objective'])); ?> -->
		
	<!-- </pre> -->
	<div class="row">
		<div class="col-lg-5 col-xs-5" id="holder">
			<a href="<?php echo $general_class->ben_link('lms/lesson/assigned_lesson'); ?>"><button class="btn btn-success form-control">Done</button></a>
			<div class="col-lg-12">
				<h3>Topic</h3>
				<input type="text" id="lesson_name" name="" class="form-control" readonly="" value="<?php print_r($views_data['lesson_data']['lesson_name'])?>" >
				<h3 style="display: inline;">Objective : </h3>
				<textarea readonly="" class="form-control" id="objective" style="display: inline;"><?php if($views_data['lesson_data']['objective']): ?><?php echo trim($views_data['lesson_data']['objective']); ?><?php endif; ?></textarea>
			</div>
			<?php foreach($data['lesson_folders'] as $folder_key=>$folder_value): ?>
				<?php $folder_number = $folder_key+1; ?>
				<div class="col-lg-2 folder clearfix">
						<div class="folder_title_container">
							<p class="folder_title"><?php echo $folder_value; ?></p>
						</div>
						<div class="folder_contents">
							
							<ul id="folder_<?php echo $folder_number; ?>" class="sortable files_container" lesson_id="<?php echo $views_data['lesson_id']; ?>" folder="<?php echo $folder_number; ?>" >
								
							</ul>
						</div>
						
					</div>
			<?php endforeach; ?>
			
		</div>
		<div class="col-lg-7 col-xs-7">
			
			<div class="col-lg-12">
				<h1>Preview</h1>
			</div>
			<div class="col-lg-12" style="margin-bottom: 20px">
				<!-- <button class="btn btn-success slideshow form-control" style="display: none;">Slideshow</button> -->
			</div>
			<div class="col-lg-12">

				<div class="preview_container" style="display: none;">
					<button class="btn btn-warning previous_button">Previous</button>
					<button class="btn btn-success pull-right next_button" style="margin-bottom: 10px">Next</button>

					<img src="" class="file-preview-image kv-preview-data rotate-1" title="" alt="" style="display:none;width:auto;height:650px;width:100%;max-height:100%;">
					<iframe class="kv-preview-data file-preview-pdf" style="height: 650px;width: 100%;" id="optical_pdf" class="embed-responsive-item" src=""></iframe>
					<!-- <embed class="kv-preview-data file-preview-pdf" src="" type="application/pdf" style="width:100%;height:650px;display:none;" internalinstanceid="13"> -->

					<div class="notes_container">
						<h1>Notes</h1>
						<textarea class="notes form-control" readonly="" file_id=""></textarea>
					</div>
				</div>

				
			</div>

		</div>
		
	</div>
	<?php foreach($data['lesson_folders'] as $folder_key=>$folder_value): ?>
		<?php $folder_number = $folder_key+1; ?>
		<div class="modal fade" id="<?php echo str_replace(' ', '_', $folder_value)?>_modal" role="dialog">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
			    <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Upload Files to <?php echo $folder_value?></h4>
			        </div>
			        <div class="modal-body">
			          <input class="upload" folder="<?php echo $folder_number; ?>" type="file" name="upload_files[]" multiple>
			        </div>
			        <div class="modal-footer">
			          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        </div>
			    </div>
		      
		    </div>
		</div>
	<?php endforeach; ?>

	<!-- Dummy Shit!!! -->
	<li id="render_clone" lesson_id="<?php echo $views_data['lesson_id']?>" file_id="" folder="" file_order="" class="file-preview-frame ben-default ui-state-default kv-preview-thumb" data-fileindex="0" data-template="image" style="display: none;">
		<div class="kv-file-content" style="margin-bottom:10px">
			<img src="" class="file-preview-image kv-preview-data rotate-1" title="" alt="" style="width:auto;height:100px;max-width:100%;max-height:100%;">
			<video class="kv-preview-data file-preview-video" controls="" style="width:100%;height:100px;">
				<source src="" type="video/mp4">
			</video>
			<iframe class="kv-preview-data file-preview-pdf" style="height: 100%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src=""></iframe>
			<!-- <embed class="kv-preview-data file-preview-pdf" src="" type="application/pdf" style="width:100%;height:100px;" internalinstanceid="13"> -->
		</div>
		<div class="file-thumbnail-footer">
			<div class="file-actions">
			    <div class="file-footer-buttons">

			    	<button type="button" id="" class="preview_button kv-file-zoom btn btn-kv btn-default btn-outline-secondary" style="width: 100%" folder="" file_name="" file_type="" title="Preview"><i class="glyphicon glyphicon-film"></i></button>
			          
			    </div>
			    <input type="text" value="" name="" readonly="" lesson_id="<?php echo $views_data['lesson_id']?>" file_id="" class="thumbnail_text form-control" />
			</div>


		</div>
	</li>

	<video id="dummy_video" class="kv-preview-data file-preview-video" controls="" style="width:100%;height:700px;display:none;">
		<source src="" type="video/mp4">
	</video>
	<!-- Dummy Shit!!! -->

<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/jquery-3.2.1.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/bootstrap.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/piexif.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/sortable.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/purify.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/fileinput.min.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/theme.js')?>"></script>
<script src="<?php echo $general_class->ben_js('lms/lesson/slideshow/jquery-ui.js')?>"></script>

<script type="text/javascript">
	
	var current_folder = 0;
	var file_data = {};
	var sort_url = '<?php echo $general_class->ben_link('lms/lesson/update_file_order/'); ?>';
	var order_url = '<?php echo $general_class->ben_link('lms/lesson/get_file_order/'); ?>';
	var update_objective = '<?php echo $general_class->ben_link('lms/lesson/update_objective/'); ?>';
	var update_fake_name = '<?php echo $general_class->ben_link('lms/lesson/update_fake_name/'); ?>';
	var get_file = '<?php echo $general_class->ben_link('lms/lesson/get_file/'); ?>';
	var update_notes = '<?php echo $general_class->ben_link('lms/lesson/update_notes/'); ?>';
	var delete_file = '<?php echo $general_class->ben_link('lms/lesson/delete_file_by_id/'); ?>';
	var uploadUrl = '<?php echo $general_class->ben_link('lms/lesson/ajax_upload/'); ?>';
	var files_path = "<?php echo $general_class->ben_resources('uploads/lessons/'.$views_data['lesson_id'].'/'); ?>";
	var lesson_id = '<?php echo $views_data["lesson_id"]; ?>';
	var active_preview_data = {};
	var child_status = false;
	var child = "";
	var timer = setInterval(checkChild, 500);

	var files_pool = <?php echo json_encode($views_data['files'])?>;
	$( ".sortable" ).sortable({
		update: function( event, ui ) {
			update_sort_order($(this).attr("folder"),$(this).attr("lesson_id"));
		}
			
	});

	function init_pool(){
		$.each(files_pool,function(key,value){
			render_file(value);
		});
	}

	function active_preview(preview_data){
		active_preview_data = preview_data;
		render_preview(active_preview_data);
		// console.log(active_preview_data);
	}

	function next_preview(){
		// console.log(JSON.stringify(active_preview_data));
		data = JSON.stringify(active_preview_data);
		$.ajax({
	      	type: "POST",
	      	url: order_url,
	      	data: {data:data,action:'next'},
	      	success: function (result) {
	      		console.log(result);
	      		if(result != 'no moow'){
	      			active_preview(JSON.parse(result));
	      			active_thumbnail(JSON.parse(result));
	      			if(child_status){
	      				update_slide(JSON.parse(result));
	      			}
	      			

	           		console.log(JSON.parse(result));
	      		}
	           
	      	}
		});
	}

	function previous_preview(){
		data = JSON.stringify(active_preview_data);
		$.ajax({
	      	type: "POST",
	      	url: order_url,
	      	data: {data:data,action:'previous'},
	      	success: function (result) {
	      		if(result != 'no moow'){
	      			active_preview(JSON.parse(result));
	      			active_thumbnail(JSON.parse(result));
	      			if(child_status){
	      				update_slide(JSON.parse(result));
	      			}
	      		}
	           
	      	}
		});
	}

	function update_sort_order(folder,lesson_id){
		var folders_order = [];
		var order;
		var content_order = [];
		$.each($("#folder_"+folder).find("li[lesson_id="+lesson_id+"]"),function(key2,value2){
			order = {
				file_id:$(value2).attr("file_id"),
				file_order:$(value2).attr("file_order"),
			};
			content_order.push(order);
		});
		var the_order = {
			lesson_id: lesson_id,
			content_order:content_order,
		};
		folders_order.push(the_order);
		var ajax_data = JSON.stringify(folders_order);
		$.ajax({
	      	type: "POST",
	      	url: sort_url,
	      	data:{data:ajax_data},
	      	success: function (result) {
	      	}
		});
	}

	function notes(render,file_id){
		$.ajax({
		      	type: "POST",
		      	url: get_file,
		      	data: {id:file_id},
		      	success: function (result) {
		      		var result= JSON.parse(result);
		           	render.find(".notes").val(result.notes);
		      	}
			});
	}

	function render_preview(data){
		var render = $(".preview_container");
		var slideshow_button = $(".slideshow");
		slideshow_button.show();
		render.show();
		if(data.file_type == 'image'){
			render.find("img").show();
			render.find("img").attr("src",files_path+data.folder+"/"+data.file_name);
			render.find(".notes").attr("file_id",data.id);
			notes(render,data.id);
			
			render.find("video").remove();
			render.find("iframe").hide();
		}else if(data.file_type == 'video'){
			render.find("video").remove();
			var dummy_video = $("#dummy_video").clone();
			dummy_video.show();
			dummy_video.find("source").attr("src",files_path+data.folder+"/"+data.file_name);
			$(".notes_container").before(dummy_video);
			render.find("img").hide();
			render.find("iframe").hide();
		}else{
			var iframe = "<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=');?>"+encodeURIComponent(files_path+data.folder+"/"+data.file_name);
			render.find("iframe").show();
			render.find("iframe").attr("src",iframe);
			render.find("img").hide();
			render.find("video").remove();
		}
	}

	function render_file(render_data){
		
		var render = $("#render_clone").clone();
		if(render_data.file_type == 'image'){
			render.css("background-color","#74c374");
			render.find("img").attr("src",files_path+render_data.folder+"/"+render_data.file_name);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			render.attr("file_order",render_data.file_order);
			render.find("video").remove();
			render.find("iframe").remove();
		}else if(render_data.file_type == 'video'){
			render.css("background-color","#f6fbac");
			render.find("video").find("source").attr("src",files_path+render_data.folder+"/"+render_data.file_name);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.attr("file_order",render_data.file_order);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			render.find("img").remove();
			render.find("iframe").remove();
		}else{
			render.css("background-color","#a19bff");
			var iframe = "<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=');?>"+encodeURIComponent(files_path+render_data.folder+"/"+render_data.file_name);
			render.find("iframe").attr("src",iframe);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.attr("file_order",render_data.file_order);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			render.find("img").remove();
			render.find("video").remove();
		}
		render.find("button").eq(0).attr("folder",render_data.folder);
		render.find("button").eq(0).attr("file_name",render_data.file_name);
		render.find("button").eq(0).attr("file_type",render_data.file_type);
		render.find("button").eq(0).attr("id","preview_"+render_data.id);
		render.find("button").eq(1).attr("file_id",render_data.id);
		render.find("button").eq(1).attr("folder",render_data.folder);
		render.find("button").eq(1).attr("file_name",render_data.file_name);
		render.find("button").eq(1).attr("lesson_id",lesson_id);
		render.removeAttr("id");
		$("#folder_"+render_data.folder).append(render.show());
	}

	function active_thumbnail(preview_data){
		$(".ben-default").css("opacity","1");
		$("#preview_"+preview_data.id).parent().parent().parent().parent().css("opacity",".1");
	}

	$(document).ready(function(){
		$('#myModal').on('show.bs.modal', function (e) {
		  if (!data) return e.preventDefault() // stops modal from being shown
		});
		init_pool();
	});
	$(document).on("click",".preview_button",function(){
		
		var preview_data = {
			id:$(this).parent().parent().parent().parent().attr("file_id"),
			lesson_id:$(this).parent().parent().parent().parent().attr("lesson_id"),
			file_name:$(this).attr("file_name"),
			file_type:$(this).attr("file_type"),
			folder:$(this).attr("folder"),
		};
		active_thumbnail(preview_data);
		render_preview(preview_data);
		active_preview(preview_data);

	});

	$(document).on("click",".next_button",function(){
		next_preview();
		
	});
	$(document).on("click",".previous_button",function(){
		previous_preview();
	});
	$(".modal_trigger").click(function(){
		current_folder = $(this).attr("folder");

		file_data = {
			lesson_id:lesson_id,
			folder: current_folder,
		};

	});
	$(".upload").fileinput({
    	previewFileType:['image','video','pdf'],
        multiple:true,
        uploadUrl:uploadUrl,
        uploadExtraData: function() {
            return file_data;
        },
        initialPreviewAsData: true // identify if you are sending preview data only and not the markup
    }).on('filepreajax', function(event, previewId, index) {
	    console.log('File pre ajax triggered');
    	file_data = file_data;

	}).on('fileuploaded', function(event, data, id, index) {
        
    	var render_data = {
    		folder:data.extra.folder,
    		id: data.response.initialPreviewConfig[0].file_id,
    		file_name: data.response.initialPreviewConfig[0].caption,
    		file_type: data.response.initialPreviewConfig[0].type,
    		file_order: data.response.initialPreviewConfig[0].file_order,
    	}
    	render_file(render_data);
    });

	$(".slideshow").click(function(){
		child_status = true;
		
		child = window.open(files_path+active_preview_data.folder+'/'+active_preview_data.file_name,"Ratting","width=auto,height=auto,0,status=0,");
		
	});
	

	function checkChild() {
		if(child){
		    if (child.closed) {
		        child_status = false;
		        clearInterval(timer);
		    }
		}
	}


	function update_slide(active_preview_data){
		window.open(files_path+active_preview_data.folder+'/'+active_preview_data.file_name,"Ratting","width=auto,height=auto,0,status=0,");
	}

	function childWindow() {
      var childWindow = window.open("", "childWindow", "width=500,height=100");
      var script = childWindow.document.createElement("script");
      script.innerHTML = 'if (typeof(jQuery) == "undefined") { window.jQuery = function(selector) { return window.opener.jQuery(selector, document);};jQuery = window.opener.$.extend(jQuery,window.opener.$);window.$ = jQuery;var msg = "Created with jQuery!";$("body").append(\'<button onclick="alert(msg)">Text</button>\');}';
      childWindow.document.getElementsByTagName("head")[0].appendChild(script);
    }
	
	$("#objective,#lesson_name").focusout(function(){
		//$("#objective").val();
		var objective = $("#objective").val();
		var lesson_name = $("#lesson_name").val();
		$.ajax({
	      	type: "POST",
	      	url: update_objective,
	      	data: {id:lesson_id,objective:objective,lesson_name:lesson_name},
	      	success: function (result) {
	      		console.log(result);

	      		// if(result != 'no moow'){
	      		// 	active_preview(JSON.parse(result));
	      		// 	active_thumbnail(JSON.parse(result));
	      		// 	if(child_status){
	      		// 		update_slide(JSON.parse(result));
	      		// 	}
	      		// }
	           
	      	}
		});
	});

	$(document).on("focusout",".thumbnail_text",function(){
		var fake_name = $(this).val();
		var file_id = $(this).attr("file_id");
		console.log(file_id);
		$.ajax({
	      	type: "POST",
	      	url: update_fake_name,
	      	data: {id:file_id,fake_name:fake_name},
	      	success: function (result) {
	      		console.log(result);
	           
	      	}
		});

	});

	$(document).on("focusout",".notes",function(){
		var notes = $(this).val();
		var file_id = $(this).attr("file_id");
		console.log(file_id);
		$.ajax({
	      	type: "POST",
	      	url: update_notes,
	      	data: {id:file_id,notes:notes},
	      	success: function (result) {
	      		console.log(result);
	           	
	      	}
		});

	});


	$(document).on("click",".delete_button",function(){
		if(confirm("Are you sure you want to delete this file?")){
			var file_id = $(this).attr("file_id");
			var lesson_id = $(this).attr("lesson_id");
			var folder = $(this).attr("folder");
			var file_name = $(this).attr("file_name");
			$.ajax({
		      	type: "POST",
		      	url: delete_file,
		      	data: {
		      		file_id:file_id,
					lesson_id:lesson_id,
					folder:folder,
					file_name:file_name,
		      	},
		      	success: function (result) {
		      		var delete_file_id = result.replace("{}","");
		      		$(document).find("li[file_id='"+delete_file_id+"']").remove();
		           	
		      	}
			});
		}else{
			alert("not deleted");
		}

	});


</script>
</body>
</html>