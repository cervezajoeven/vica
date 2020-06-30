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
	<link rel="stylesheet" href="<?php echo $general_class->ben_resources('lms/font-awesome.min.css')?>">
	<link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/font-awesome.min.css')?>">

    
    <style type="text/css">

    	li {
		  list-style-type: none;
		}
		.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
		    border: 1px solid #c5c5c5;
		    background: white;
		    font-weight: normal;
		    color: #454545;
		}
		.kv-upload-progress .kv-hidden{
			display: none;
		}

    	.sortable{
    		background-color: none;
    	}

    	/*Set the row height to the viewport*/
		.row-height{
		  height: 100vh;
		}

		/*Set up the columns with a 100% height, body color and overflow scroll*/

		.left{
	  		height: 100%;
	  		overflow-y: scroll;
	  		padding: 0;
		}

		.right{
		  	height: 100%;
		  	overflow-y: scroll;
		  	padding: 0;
		}

		.mid{
		  background-color: green;
		  height: 100%;
		  overflow-y: scroll;
		}

		/*Remove the scrollbar from Chrome, Safari, Edge and IE*/
		::-webkit-scrollbar {
		    width: 0px;
		    background: transparent;
		}

		* {
		  -ms-overflow-style: none !important;
		}

    	.radio-inline{
    		width: 100%;
    	}



    	/*checkbox*/
    	.checkbox label:after, 
		.radio label:after {
		    content: '';
		    display: table;
		    clear: both;
		}

		.checkbox .cr,
		.radio .cr {
		    position: relative;
		    display: inline-block;
		    border: 1px solid #a9a9a9;
		    border-radius: .25em;
		    width: 1.3em;
		    height: 1.3em;
		    float: left;
		    margin-right: .5em;
		}

		.radio .cr {
		    border-radius: 50%;
		}

		.checkbox .cr .cr-icon,
		.radio .cr .cr-icon {
		    position: absolute;
		    font-size: .8em;
		    line-height: 0;
		    top: 50%;
		    left: 20%;
		}

		.radio .cr .cr-icon {
		    margin-left: 0.04em;
		}

		.checkbox label input[type="checkbox"],
		.radio label input[type="radio"] {
		    display: none;
		}

		.checkbox label input[type="checkbox"] + .cr > .cr-icon,
		.radio label input[type="radio"] + .cr > .cr-icon {
		    transform: scale(3) rotateZ(-20deg);
		    opacity: 0;
		    transition: all .3s ease-in;
		}

		.checkbox label input[type="checkbox"]:checked + .cr > .cr-icon,
		.radio label input[type="radio"]:checked + .cr > .cr-icon {
		    transform: scale(1) rotateZ(0deg);
		    opacity: 1;
		}

		.checkbox label input[type="checkbox"]:disabled + .cr,
		.radio label input[type="radio"]:disabled + .cr {
		    opacity: .5;
		}
    	/*checkbox*/

    	.sortable{
    		padding: 0;
    	}
    	::-webkit-scrollbar {
		  width: 15px;
		}

		/* Track */
		::-webkit-scrollbar-track {
		  background: #f1f1f1; 
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
		  background: #888; 
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
		  background: #555; 
		}
    </style>
</head>
<body>
	<div class = "container-fluid">
      	<div class = "row row-height">
	        <div class = "col-sm-7 left">
	        	<?php if($this->session->userdata('account_type_id')==5){ $back_button = 'lms/quiz/student_assigned_quizzes'; } else { $back_button = 'lms/quiz/index'; } ?>
		        	<a href="<?php echo $general_class->ben_link($back_button)?>"><button class="reupload btn btn-success form-control" type="button">Home</button></a>
	        	<?php if($general_class->session->userdata('account_type_id')!=5):?>
		        	<button type="button" class="reupload btn btn-primary form-control">Reupload</button>
		        	<button type="button" class="cancel_reupload btn btn-danger form-control">Cancel</button>
	        		<input class="upload" type="file" name="upload_files[]">
		        <?php endif;?>
	            	<iframe style="height: 100%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src="<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/optical/'.$general_class->data['optical'][0]['quiz_id'].'/'.$general_class->data['optical'][0]['file_name'])); ?>"></iframe>
	            	
	        </div>

	        <div class="col-sm-5 right">
	        	<table class="table table-bordered table-striped" style="margin:0">
	        		<tr>
	        			<td style="width: 24%"><b>Name :</b></td>
	        			<td><?php echo $this->session->userdata('first_name')?> <?php echo $this->session->userdata('last_name')?></td>
	        			<td><b>Time : </b></td>
	        			<td>
	        				<?php if($general_class->session->userdata('account_type_id')==5): ?>
		        				<input type="hidden" name="expiration_value" id="expiration_value" value="<?php echo $data['attempt'][0]['expiration']?>">
								<div id="time"></div>
							<?php endif; ?>
						</td>
	        		</tr>
	        		<tr>
	        			<td><b>Level and Section :</b></td>
	        			<td>Grade <?php echo $this->data['student_data'][0]['grade_name'] ?> - <?php echo $this->data['student_data'][0]['section_name'] ?></td>
	        			<td><b> Date : </b></td>
	        			<td><?php echo date("M d, Y"); ?></td>
	        		</tr>
	        		<tr>
	        			<td><b>Topic Title :</b></td>
	        			<td colspan="3"><input type="" <?php if($general_class->session->userdata('account_type_id')==5):?> disabled <?php endif; ?> class="form-control" id="quiz_name" value="<?php echo $this->data['quiz'][0]['quiz_name']?>" name=""></td>
	        			
	        		</tr>
	        	</table>
	        	<div class="clearfix"></div>
	        	<ul class="sortable ui-sortable">
	        		<?php if($this->data['optical']): ?>
	        			<?php echo $this->data['optical'][0]['answer_key']?>
	        		<?php endif; ?>
	        	</ul>
	        	

	        	<table class="admin_action table">
	        		<tr>
	        			<td>
	        				<div class="input-group">
								<select class="form-control" id="add_key_select">
									<option value="multiple_choice">Multiple Choice</option>
									<option value="identification">Identification</option>
									<option value="multiple_answers">Multiple Answers</option>
									<option value="true_or_false">True or False</option>
									<option value="matching_type">Matching Type</option>
									<option value="essay">Essay</option>
								</select>
								<span class="input-group-btn">
									<button class="btn btn-success" id="add_key" type="button">
										<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										Add
									</button>
								</span>
							</div>
	        			</td>
	        		</tr>
	        	</table>


	        	<?php $general_class->ben_html("keys"); ?>

	        	<table class="table">
	        		<tr>
	        			<td>
	        				<?php if($general_class->session->userdata('account_type_id')==5):?>
	        					<button class="submit form-control btn btn-success">Submit</button>
	        					<button style="display: none;" class="time_up form-control btn btn-success">Submit</button>
	        				<?php else: ?>
	        					<button class="save form-control btn btn-success">Save</button>
	        				<?php endif;?>

	        			</td>
	        		</tr>
	        	</table>
	            
	        </div>
      	</div>
    </div>



</body>
</html>
<script type="text/javascript">
	var uploadUrl = '<?php echo $general_class->ben_link('lms/optical/ajax_upload/'); ?>';
	var id = '<?php echo $general_class->data["optical"][0]['id']; ?>';
	var quiz_id = '<?php echo $general_class->data["optical"][0]['quiz_id']; ?>';
	var file_data = {id:id,quiz_id:quiz_id};
	var content_url = "<?php echo $general_class->ben_resources('uploads/optical/'.$general_class->data['optical'][0]['quiz_id'].'/'.$general_class->data['optical'][0]['file_name']); ?>";
	$("body").hide();
	<?php if($general_class->data['optical'][0]['file_name']==""):?>
		$(document).ready(function(){
			$("iframe").hide();
			$(".file-input").show();
			$("body").show();
		});
		
	<?php else: ?>
		$(document).ready(function(){
			$("iframe").show();
			$(".file-input").hide();
			$(".reupload").show();
			$("body").show();
		});
		
    <?php endif; ?>
	
	$(".reupload").hide();
	$(".cancel_reupload").hide();
	var src = "<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/optical/')); ?>";
	$(".upload").fileinput({
    	previewFileType:['pdf'],
        multiple:false,
        uploadUrl:uploadUrl,
        uploadExtraData: function() {
            return file_data;
        },
        initialPreviewAsData: true // identify if you are sending preview data only and not the markup
    }).on('filepreajax', function(event, previewId, index) {
	    // console.log('File pre ajax triggered');
    	// file_data = file_data;

	}).on('fileuploaded', function(event, data, id, index) {
		var file_name = data.response.initialPreviewConfig[0].caption;
		var new_src = src+'/'+quiz_id+'/'+file_name;
		// console.log();
		$('.upload').fileinput('unlock');
		$('.kv-hidden').hide();
		$(".file-input").hide();
		$(".reupload").show();
		$(".cancel_reupload").hide();
		$("iframe").show();
		$("iframe").attr("src",new_src);
    });

	$(".slideshow").click(function(){
		child_status = true;
		
		child = window.open(files_path+active_preview_data.folder+'/'+active_preview_data.file_name,"Ratting","width=auto,height=auto,0,status=0,");
		
	});
	$(".reupload").click(function(){
		$(".file-input").show();
		$("iframe").hide();
		$(this).hide();
		$(".cancel_reupload").show();
	});
	$(".cancel_reupload").click(function(){
		$(".file-input").hide();
		$("iframe").show();
		$(".reupload").show();
		$(".cancel_reupload").hide();
	});
<?php if($general_class->session->userdata('account_type_id')==5): ?>
	var expiration_date = parseInt($("#expiration_value").val());
	var time_now = parseInt('<?php echo time(); ?>');
	// console.log(parseInt(expiration_date));
	// console.log(parseInt(time_now));
	$(document).ready(function(){
		startTime();
	});



	function startTime() {
		// Set the date we're counting down to
		var countDownDate = new Date(expiration_date).getTime();
		

		// Update the count down every 1 second
		var x = setInterval(function() {

			// Get todays date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			if(hours<10){
				hours = '0'+hours;
			}
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

			if(minutes<10){
				minutes = '0'+minutes;
			}
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			if(seconds<10){
				seconds = '0'+seconds;
			}
			// Display the result in the element with id="demo"
			document.getElementById("time").innerHTML = hours + ":"
			+ minutes + ":" + seconds;

			// If the count down is finished, write some text 
			if (distance < 0) {
				clearInterval(x);
				document.getElementById("time").innerHTML = "Time's Up!";
				alert("Time's Up!");
				$(".time_up").click();
			}
		}, 1000);
	}
<?php endif; ?>
	setInterval(function(){
		function cheeeeeck() {
		    if (cheeee.closed) {
		        location.reload();
		        clearInterval(timeeer);
		    }
		}
		
		console.log($("iframe").contents().find('#errorMessage'));
		if($("iframe").contents().find('#errorMessage').text() == 'Invalid or corrupted PDF file.'){
			
			var first = confirm("Is the PDF not working properly? Click yes and reload the document. Then close. Or use firefox browser");
			if(first === true){
				
				var cheeee = window.open(content_url);
				var timeeer = setInterval(cheeeeeck, 500);
			}else{
				
			}
		}
		
	},15000);
	// $(document).ready(function(){
	// 	console.log($("iframe").contents().find('#errorMessage'));
	// 	if($("iframe").contents().find('#errorMessage').length > 0){
	// 		if(confirm("Is the PDF not working properly? Click yes and reload the document. Then go back here and refresh the page")){
	// 			alert("Yeah");
	// 		}else{
	// 			alert("Yoowh");
	// 		}
	// 	}
		
	// });
</script>