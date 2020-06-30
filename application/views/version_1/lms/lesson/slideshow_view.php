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
		    /*border-right: 1px solid gray;*/
		    padding: 0px;
    	}
    	.folder:last-child{
		    /*border-right: 1px solid gray;*/
    	}
    	.folder_title_container{
    		width: 100%;
    	}
    	.folder_title {
		    font-size: 20px;
		    padding: 10px;
		    min-height: 76px;
		    text-align: center;
		    background-color: rgb(43, 102, 153);
		    color: white;
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
		.glyphicon {
		    position: relative;
		    top: 4px;
		    display: inline-block;
		    font-family: 'Glyphicons Halflings';
		    font-style: normal;
		    font-weight: 400;
		    font-size: 21px;
		    line-height: 1;
		    -webkit-font-smoothing: antialiased;
		    -moz-osx-font-smoothing: grayscale;
		}
		.ppt_icon{
			text-decoration: none!important;
		}
		.ppt_icon:hover{
			cursor: pointer;
			opacity: .6;
		}
		.icon_file p{
			display: block;
		}
		.icon_file i{
			display: block;
		}
		.previous_button{
			margin-bottom: 20px;
		}

    </style>
</head>
<body style="margin-top: 10px">
	
	<?php $views_data = $general_class->data; ?>
	<!-- <pre> -->
		<!-- <?php var_dump(trim($views_data['lesson_data']['objective'])); ?> -->
	<!-- </pre> -->
	<div class="row">
		<div class="col-md-5 col-sm-12 col-xs-12" id="holder">
			<div class="col-xs-12 col-sm-12">
				<a href="<?php echo $general_class->ben_link('lms/lesson/index'); ?>"><button class="btn btn-success form-control">Done</button></a>
				<h3>Topic</h3>
				<input type="text" disabled="" id="lesson_name" name="" class="form-control" value="<?php print_r($views_data['lesson_data']['lesson_name'])?>">
				<h3 style="display: inline;">Objective : </h3>
				<textarea class="form-control" disabled="" id="objective" style="display: inline;"><?php if($views_data['lesson_data']['objective']): ?><?php echo trim($views_data['lesson_data']['objective']); ?><?php endif; ?></textarea>
				<?php if($general_class->session->userdata('account_type_id') == '4'): ?>
					<center>
						<h3>Learning Plan</h3>
						<div class="col-xs-12" style="border-bottom: 2px solid black;"></div>

						<a class="col-xs-12" href="" data-toggle="modal" data-target="#show_learning_plan_modal"><button class="btn btn-primary form-control" style="margin:20px 0px">View</button></a>

					</center>
				<?php endif;?>
				<div class="col-xs-12" style="border-bottom: 2px solid black; margin-bottom: 45px"></div>
			</div>
			<div class="folders_holder">
				<?php foreach($data['lesson_folders'] as $folder_key=>$folder_value): ?>
					<?php $folder_number = $folder_key+1; ?>
					<div class="col-xs-2 folder">
							<div class="folder_title_container">
								<p class="folder_title"><?php echo $folder_value; ?></p>
							</div>
							<div class="folder_contents">
								
								<ul id="folder_<?php echo $folder_number; ?>" class="files_container" lesson_id="<?php echo $views_data['lesson_id']; ?>" folder="<?php echo $folder_number; ?>" >
									
								</ul>
							</div>
							
						</div>
				<?php endforeach; ?>
			</div>
			
		</div>
		<div class="preview_side col-md-7 col-xs-12">
			
			<div class="col-xs-12">
				<h1>Preview</h1>
			</div>
			<div class="col-xs-12" style="margin-bottom: 20px">
				<button class="btn btn-success slideshow form-control" style="display: none;">Slideshow</button>
				<button class="btn btn-danger close_slideshow form-control" style="display: none;">Close Slideshow</button>
			</div>
			<div class="col-xs-12">

				<div class="preview_container" style="display: none;">
					<button style="width: 45%" class="btn btn-warning previous_button">Previous</button>
					<button style="width: 45%" class="btn btn-success pull-right next_button" style="margin-bottom: 10px">Next</button>

					<img src="" class="file-preview-image kv-preview-data rotate-1 preview_class" title="" alt="" style="display:none;width:auto;height:650px;width:100%;max-height:100%;">
					<iframe class="kv-preview-data file-preview-pdf preview_class" style="height: 650px;width: 100%;" id="optical_pdf" class="embed-responsive-item" src=""></iframe>

					
					<a href="" class="ppt_icon ppt preview_class" style="display: block; text-align: center;"><img src="<?php echo $general_class->ben_resources('datatables')?>/ppt.png" style="width: 50%;height:500px" /> <h1>Click to Download Powerpoint</h1></a>
					<a href="" class="ppt_icon word preview_class" style="display: block; text-align: center;"><img src="<?php echo $general_class->ben_resources('datatables')?>/word.png" style="width: 50%;height:500px" /> <h1>Click to Download Microsoft Word</h1></a>
					<div class="notes_container">
						<h1>Notes</h1>
						<textarea class="notes form-control" file_id="" disabled=""></textarea>
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

	<div class="modal fade" id="upload_learning_plan_modal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	    	<form>
			    <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">Upload Learning Plan</h4>
			        </div>
			        <div class="modal-body">
			          	<input class="learning_plan_upload" type="file" accept="application/pdf" name="upload_files[]" multiple>
			          	<div class="alert alert-success" style="display: none">
							<strong>Success!</strong> Learning Plan Successfully uploaded!
						</div>
			        </div>
			        <div class="modal-footer">
			        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        </div>
			    </div>
	    	</form>
	    </div>
	</div>

	<div class="modal fade" id="show_learning_plan_modal" role="dialog">
	    <div class="modal-dialog modal-lg">
	    
	      <!-- Modal content-->
		    <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Learning Plan</h4>
		        </div>
		        <div class="modal-body">
		        		
		        		<iframe style="height: 600px;width: 100%;<?php if($data['lesson_data']['learning_plan']==""): ?>display: none <?php endif; ?>" id="learning_plan_pdf" class="embed-responsive-item" src="<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/learning_plan/'.$general_class->data['lesson_id'].'/learning_plan.pdf')); ?>"></iframe>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		    </div>
	      
	    </div>
	</div>

	<!-- Dummy Shit!!! -->
	<li id="render_clone" lesson_id="<?php echo $views_data['lesson_id']?>" file_id="" folder="" file_order="" class="file-preview-frame ben-default ui-state-default kv-preview-thumb" data-fileindex="0" data-template="image" style="display: none;">
		<div class="kv-file-content" style="margin-bottom:10px">
			<div class="icon_file video_file"><i class="glyphicon glyphicon-play" style="font-size: 80px;color: #ff6b6b;"></i><p>Video</p></div>
			<div class="icon_file image_file"><i class="glyphicon glyphicon-picture" style="font-size: 80px;color:#ed9d2a;"></i><p>Image</p></div>
			<div class="icon_file pdf_file"><i class="glyphicon glyphicon-file" style="font-size: 80px;color: #2b669a;"></i>PDF</div>
			<div class="icon_file audio_file"><i class="glyphicon glyphicon-music" style="font-size: 80px;color:#0fcc38;"></i><p>Audio</p></div>
			<div class="icon_file powerpoint_file"><img src="<?php echo $general_class->ben_resources('datatables')?>/ppt.png" style="width: 100%;height: 84px;"><p>Powerpoint</p></div>
			<div class="icon_file word_file"><img src="<?php echo $general_class->ben_resources('datatables')?>/word.png" style="width: 100%;height: 84px;"><p>Word</p></div>
			<!-- <img src="" class="file-preview-image kv-preview-data rotate-1" title="" alt="" style="width:auto;height:100px;max-width:100%;max-height:100%;"> -->
			<!-- <video class="kv-preview-data file-preview-video" controls="" style="width:100%;height:100px;">
				<source src="" type="video/mp4">
			</video> -->
			<!-- <audio class="kv-preview-data file-preview-video" controls="" style="width:100%;height:100px;">
				<source src="" type="audio/mpeg">
			</audio> -->
			<!-- <iframe class="kv-preview-data file-preview-pdf" style="height: 100%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src=""></iframe> -->
			<!-- <embed class="kv-preview-data file-preview-pdf" src="" type="application/pdf" style="width:100%;height:100px;" internalinstanceid="13"> -->
		</div>
		<div class="file-thumbnail-footer">
			<div class="file-actions">
			    <input type="text" disabled="" value="" name="" lesson_id="<?php echo $views_data['lesson_id']?>" file_id="" class="thumbnail_text form-control" placeholder="(File Name Here)" />
			    <div class="file-footer-buttons">

			    	<button type="button" id="" class="preview_button kv-file-zoom btn btn-kv btn-default btn-outline-secondary" style="width: 100%" folder="" file_name="" file_type="" title="Preview"><i class="glyphicon glyphicon-eye-open"></i></button>
			          
			    </div>
			</div>


		</div>
	</li>

	<video id="dummy_video" class="kv-preview-data file-preview-video" controls="" style="width:100%;height:700px;display:none;">
		<source src="" type="video/mp4">
	</video>
	<audio id="dummy_audio" class="kv-preview-data file-preview-video" controls="" style="width:100%;height:700px;display:none;">
		<source src="" type="audio/mpeg">
	</audio>
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
	var learning_plan_url = '<?php echo $general_class->ben_link('lms/lesson/upload_learning_plan/'); ?>';
	var learning_plan_file = '<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/learning_plan/'.$general_class->data['lesson_id'].'/learning_plan.pdf')); ?>';
	var files_path = "<?php echo $general_class->ben_resources('uploads/lessons/'.$views_data['lesson_id'].'/'); ?>";
	var lesson_id = '<?php echo $views_data["lesson_id"]; ?>';
	var active_preview_data = {};
	var child_status = false;
	var child = "";
	var timer = setInterval(checkChild, 500);
	var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
	$(".close_slideshow").hide();

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

	$(".close_slideshow").click(function(){
		if(width<1000){
			$(".preview_side").hide();
			$(".folders_holder").show();
		}
		
	});

	function render_preview(data){
		var render = $(".preview_container");
		var slideshow_button = $(".slideshow");
		slideshow_button.show();
		 $(".close_slideshow").show();
		render.show();
		if(data.file_type == 'image'){
			render.find(".file-preview-image").show();
			render.find(".file-preview-image").attr("src",files_path+data.folder+"/"+data.file_name);
			render.find(".notes").attr("file_id",data.id);
			notes(render,data.id);
			render.find("audio").remove();
			render.find("video").remove();
			render.find("iframe").hide();
			render.find("a").hide();
		}else if(data.file_type == 'video'){
			render.find("video").remove();
			var dummy_video = $("#dummy_video").clone();
			dummy_video.show();
			dummy_video.find("source").attr("src",files_path+data.folder+"/"+data.file_name);
			$(".notes_container").before(dummy_video);
			render.find(".file-preview-image").hide();
			render.find("audio").remove();
			render.find("iframe").hide();
			render.find("a").hide();
		}else if(data.file_type == 'audio'){
			render.find("audio").remove();
			var dummy_video = $("#dummy_audio").clone();
			dummy_video.show();
			dummy_video.find("source").attr("src",files_path+data.folder+"/"+data.file_name);
			$(".notes_container").before(dummy_video);
			render.find(".file-preview-image").hide();
			render.find("video").remove();
			render.find("iframe").hide();
			render.find("a").hide();
		}else{

			if(data.file_name.includes(".pdf")){
				var iframe = "<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=');?>"+encodeURIComponent(files_path+data.folder+"/"+data.file_name);
				render.find("iframe").show();
				render.find("iframe").attr("src",iframe);
				render.find("a").hide();
				render.find("audio").remove();
				render.find("video").remove();
			}else if(data.file_name.includes(".ppt")){
				
				var url = files_path+data.folder+"/"+data.file_name;
				// render.find("iframe").show();
				render.find("a").attr("href",url);
				render.find("a").show();
				// render.find("a").text(url);
				render.find(".file-preview-image").hide();
				render.find(".preview_class").hide();
				render.find("iframe").hide();
				render.find("audio").remove();
				render.find("video").remove();
				render.find(".ppt").show();
			}else if(data.file_name.includes(".doc")||data.file_name.includes(".docx")){
				
				var url = files_path+data.folder+"/"+data.file_name;
				// render.find("iframe").show();
				render.find("a").attr("href",url);
				render.find("a").show();
				// render.find("a").text(url);
				render.find(".file-preview-image").hide();
				render.find("iframe").hide();
				render.find(".preview_class").hide();
				render.find("audio").remove();
				render.find("video").remove();
				
				render.find(".word").show();
			}
			
		}
	}

	function render_file(render_data){
		
		var render = $("#render_clone").clone();
		if(render_data.file_type == 'image'){
			// render.css("background-color","#74c374");
			// render.find("img").attr("src",files_path+render_data.folder+"/"+render_data.file_name);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			render.attr("file_order",render_data.file_order);
			// render.find("video").remove();
			// render.find("audio").remove();
			// render.find("iframe").remove();
			render.find(".icon_file").hide();
			render.find(".image_file").show();
		}else if(render_data.file_type == 'video'){
			// render.css("background-color","#f6fbac");
			// render.find("video").find("source").attr("src",files_path+render_data.folder+"/"+render_data.file_name);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.attr("file_order",render_data.file_order);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			// render.find("img").remove();
			// render.find("audio").remove();
			// render.find("iframe").remove();
			render.find(".icon_file").hide();
			render.find(".video_file").show();
		}else if(render_data.file_type == 'audio'){
			// render.css("background-color","#f6fbac");
			// render.find("audio").find("source").attr("src",files_path+render_data.folder+"/"+render_data.file_name);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.attr("file_order",render_data.file_order);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			// render.find("img").remove();
			// render.find("video").remove();
			// render.find("iframe").remove();
			render.find(".icon_file").hide();
			render.find(".audio_file").show();
		}else if(render_data.file_type == 'application'){
			// render.css("background-color","#f6fbac");
			// render.find("audio").find("source").attr("src",files_path+render_data.folder+"/"+render_data.file_name);

			if(render_data.file_name.includes(".pdf")){
				render.attr("file_id",render_data.id);
				render.attr("folder",render_data.folder);
				render.attr("file_order",render_data.file_order);
				render.find("input").attr("file_id",render_data.id);
				render.find("input").val(render_data.fake_name);
				render.find(".icon_file").hide();
				render.find(".pdf_file").show();
			}else if(render_data.file_name.includes(".ppt")){
				render.attr("file_id",render_data.id);
				render.attr("folder",render_data.folder);
				render.attr("file_order",render_data.file_order);
				render.find("input").attr("file_id",render_data.id);
				render.find("input").val(render_data.fake_name);
				render.find(".icon_file").hide();
				render.find(".powerpoint_file").show();

			}else if(render_data.file_name.includes(".doc")||render_data.file_name.includes(".docx")){
				render.attr("file_id",render_data.id);
				render.attr("folder",render_data.folder);
				render.attr("file_order",render_data.file_order);
				render.find("input").attr("file_id",render_data.id);
				render.find("input").val(render_data.fake_name);
				render.find(".icon_file").hide();
				render.find(".word_file").show();

			}
			
		}else{
			// render.css("background-color","#a19bff");
			// var iframe = "<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=');?>"+encodeURIComponent(files_path+render_data.folder+"/"+render_data.file_name);
			// render.find("iframe").attr("src",iframe);
			render.attr("file_id",render_data.id);
			render.attr("folder",render_data.folder);
			render.attr("file_order",render_data.file_order);
			render.find("input").attr("file_id",render_data.id);
			render.find("input").val(render_data.fake_name);
			render.find(".icon_file").hide();
			render.find(".pdf_file").show();
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
		
		if(width<1000){
			$(".folders_holder").hide();
			$(".preview_side").show();
		}
		

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

	$(".learning_plan_upload").fileinput({
    	previewFileType:['pdf'],
        multiple:true,
        uploadUrl: learning_plan_url,
        uploadExtraData: function() {
            return file_data;
        },
        initialPreviewAsData: true // identify if you are sending preview data only and not the markup
    }).on('filepreajax', function(event, previewId, index) {
	    console.log('File pre ajax triggered');
    	file_data = {lesson_id:lesson_id};

	}).on('fileuploaded', function(event, data, id, index) {
		var file_name = data.response.initialPreviewConfig[0].caption;
		// var new_src = src+'/'+lesson_id+'/'+file_name;
		// console.log();
		$('.upload').fileinput('unlock');
		$('.kv-hidden').hide();
		$(".file-input").hide();
		$(".alert").show();
		$("#learning_plan_pdf").show();
		$("#learning_plan_pdf").attr("src",learning_plan_file);

		// $(".reupload").show();
		$(".cancel_reupload").hide();
		// $("iframe").show();
		// $("iframe").attr("src",new_src);
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