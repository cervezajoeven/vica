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
    <link rel="stylesheet" href="<?php echo $general_class->ben_css('lms/lesson/slideshow/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo $general_class->ben_css('general/w3.css')?>">

	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script> -->
	<script src="<?php echo $general_class->ben_js('general/home/js/jquery.min.js') ?>"></script>
	<script src="<?php echo $general_class->ben_js('general/home/js/Chart.min.js') ?>"></script>
	<script src="<?php echo $general_class->ben_js('general/home/js/utils.js') ?>"></script>
	<script src="<?php echo $general_class->ben_js('general/home/js/chartjs-plugin-datalabels.min.js') ?>"></script>
		
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

		canvas{
			margin: 0 auto;
		}

		.question_container{
			border: 2px solid black;
			margin-bottom: 20px;
			page-break-inside: avoid;
		}
		.question_container .radio{
			margin: 0;
			background-color: rgb(100,100,100);
			color: white;
		}
		.w3-center{
			color: white;

			background-color: rgb(72, 159, 72);
		}
		.w3-center h4{
			margin: 0;
			padding:10px;
		}

		.for_print{
			display: none;
		}
		li{
			list-style-type: circle;
		}

		@media print {
			.left {
				display: none;
			}
			.right, .right * {
				visibility: visible;
				display: block;
				width: auto;
				height: auto;
				overflow: visible;
			}
			.for_print{
				display: block;
			}
			.for_display{
				display: none;
			}
			li{
				list-style-type: circle;
				margin-bottom: 10px;
			}
			body
			{
			  margin: 25mm 25mm 25mm 25mm;
			}

		}
    </style>
</head>
<body style="margin: 0">
	<div class = "container-fluid">
      	<div class = "row row-height">
	        <div class = "col-sm-6 left">		        
				<a href="<?php echo $general_class->ben_link('general/survey_report/index')?>"><button class="btn btn-success form-control" type="button">Back</button></a>
	        	<iframe style="height: 96%;width: 100%;" id="optical_pdf" class="embed-responsive-item" src="<?php echo $general_class->ben_resources('pdfjs/web/viewer.html?file=').urlencode($general_class->ben_resources('uploads/survey/'.$data[0]['survey_id'].'/'.$data[0]['survey_pdf_file_name'])); ?>"></iframe>
	        </div>
	        <div class="col-sm-6 right">
	        	<table class="table table-bordered table-striped" style="margin:0">
                    <!-- <tr>
                        <a href="<?php //echo $general_class->ben_link('general/survey_report/index')?>"><button class="btn btn-success form-control" type="button">Back</button></a>
                    </tr> -->
	        		<tr>
	        			<td style="width: 24%"><b>Survey Name: </b></td>
	        			<td><?php echo $data[0]['survey_name']?></td>
	        			<td><b>Date Created: </b></td>
	        			<td><?php echo date("F d, Y",strtotime($data[0]['survey_date_created'])) ?></td>
	        		</tr>	        		
	        	</table>

                <div class="w3-container" id="resp-container">
					<?php
						if ($data[0]['respond'] != null) {
							$respond = json_decode($data[0]['respond']);							
							$idx = 0;

							foreach($respond as $resp) {
								if ($resp->type == "long_answer" || $resp->type == "short_answer") {
									print('<div class="w3-panel w3-card-2 question_container">');
									print('<div class="radio">');
									printf('<label class="sort_number" style="font-size: 1.5em">%s</label>', $idx+1);
									print('</div>');
									printf('<div id="remark_%s" style="max-height:250px; overflow:auto;"></div>', $idx+1);
									printf('<div id="resp_%s" class="w3-center"></div>', $idx+1);
									print('</div>');
								}

								$idx++;
							}
						} else {

						}						
					?>
                </div>

	        </div>
      	</div>
    </div>
</body>
</html>

<script type="text/javascript">   	
	var resp_data;

	async function showRemarks() {
		await getRemarks();	
	}

	$(document).ready(function() {
		showRemarks();				
	});

	function getRemarks() {
		fetch('<?php echo $general_class->ben_link('general/survey_report/get_remarks/'.$data[0]['survey_id'])?>') 
		.then((resp) => resp.json())
		.then(function(data) {
			//alert(data);
			console.log(data);
			resp_data = data;

			var display="";
			var remarks_ctr = 1;

			//-- Show charts
			$.each(data, function() {				
				$remarks_data = data[remarks_ctr-1].remarks;
				$list = '';

				for(i=0; i<$remarks_data.length; i++) {
					$list += '<li>' + $remarks_data[i] + '</ti>';
				}

				$("#remark_"+remarks_ctr).html('<ul class="w3-ul">'+$list+'</ul>');

				$('#resp_' + remarks_ctr).html('<h4>RESPONDENTS: '+data[remarks_ctr-1].respondents+'</h4>');				
				remarks_ctr++;
			});					
		})
		.catch(function(error) {
			// This is where you run code if the server returns any errors
			console.log(error);
		});
	}
</script>