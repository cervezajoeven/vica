<!DOCTYPE html>
<html>
	<head>
		<title></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<style type="text/css">
			/*input[type=text] {
				height:17px;
				border: 0;
				width: calc(100% - 2px);
				margin-left:1px;
				box-shadow: -8px 10px 0px -7px #ebebeb, 8px 10px 0px -7px #ebebeb;
				-webkit-transition: box-shadow 0.3s;
				transition: box-shadow 0.3s;
			}
			input[type=text]:focus {
				outline: none;
				box-shadow: -8px 10px 0px -7px #4EA6EA, 8px 10px 0px -7px #4EA6EA;
			}*/
			.mt-20{
				margin-top: 20px;
			}
			.ebook-logo img {
			    height: 100px;
			}
			.ebook{
				cursor: pointer;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<a href="/"><h1>Home</h1></a>
				</div>
				<div class="col-lg-3">
					<div class="form-group">
						<input placeholder="Search Campus Books" id="search" type="text" class="form-control" value=""/>
					</div>
				</div>
				<!-- <div class="col-lg-12">
					<div class="col-lg-2">
						<div class="form-group">
							<select class="form-control">
								<option>Grade</option>
								<option>Grade 1</option>
								<option>Grade 2</option>
								<option>Grade 3</option>
								<option>Grade 4</option>
								<option>Grade 5</option>
								<option>Grade 6</option>
								<option>Grade 7</option>
							</select>
						</div>
					</div>
				</div> -->

				<div class="col-lg-12">
					<hr>
					<h4>Grade 2</h4>
				</div>

				<div class="col-lg-12">
					<div class="ebook-container col-lg-12">
						<a href="<?php echo $general_class->ben_resources('ebook/grade_2/christian'); ?>">
							<div class="ebook col-lg-3">
								<div class="ebook-logo_container">
									<div class="ebook-logo">
										<img src="https://image.flaticon.com/icons/svg/29/29302.svg" >
									</div>
								</div>
								<div class="ebook-text_container">
									<div class="ebook-text">
										<span>Christian Living</span>
									</div>
								</div>
									
							</div>
						</a>
						
					</div>
				</div>

				<div class="col-lg-12">
					<hr>
					<h4>Grade 3</h4>
				</div>

				<div class="col-lg-12">
					<div class="ebook-container col-lg-12">
						<a href="<?php echo $general_class->ben_resources('ebook/grade_3/christian'); ?>">
							<div class="ebook col-lg-3">
								<div class="ebook-logo_container">
									<div class="ebook-logo">
										<img src="https://image.flaticon.com/icons/svg/29/29302.svg" >
									</div>
								</div>
								<div class="ebook-text_container">
									<div class="ebook-text">
										<span>Christian Living</span>
									</div>
								</div>
									
							</div>
						</a>
						
					</div>
				</div>

				<div class="col-lg-12">
					<hr>
					<h4>Grade 4</h4>
				</div>

				<div class="col-lg-12">
					<div class="ebook-container col-lg-12">
						<a href="<?php echo $general_class->ben_resources('ebook/grade_4/christian'); ?>">
							<div class="ebook col-lg-3">
								<div class="ebook-logo_container">
									<div class="ebook-logo">
										<img src="https://image.flaticon.com/icons/svg/29/29302.svg" >
									</div>
								</div>
								<div class="ebook-text_container">
									<div class="ebook-text">
										<span>Christian Living</span>
									</div>
								</div>
									
							</div>
						</a>
						
					</div>
				</div>

				<div class="col-lg-12">
					<hr>
					<h4>Grade 5</h4>
				</div>

				<div class="col-lg-12">
					<div class="ebook-container col-lg-12">
						<a href="<?php echo $general_class->ben_resources('ebook/grade_5/christian'); ?>">
							<div class="ebook col-lg-3">
								<div class="ebook-logo_container">
									<div class="ebook-logo">
										<img src="https://image.flaticon.com/icons/svg/29/29302.svg" >
									</div>
								</div>
								<div class="ebook-text_container">
									<div class="ebook-text">
										<span>Christian Living</span>
									</div>
								</div>
									
							</div>
						</a>
						
					</div>
				</div>

				<div class="col-lg-12">
					<hr>
					<h4>Grade 6</h4>
				</div>

				<div class="col-lg-12">
					<div class="ebook-container col-lg-12">
						<a href="<?php echo $general_class->ben_resources('ebook/grade_6/christian'); ?>">
							<div class="ebook col-lg-3">
								<div class="ebook-logo_container">
									<div class="ebook-logo">
										<img src="https://image.flaticon.com/icons/svg/29/29302.svg" >
									</div>
								</div>
								<div class="ebook-text_container">
									<div class="ebook-text">
										<span>Christian Living</span>
									</div>
								</div>
									
							</div>
						</a>
						
					</div>
				</div>
			</div>
		</div>
	</body>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	<script type="text/javascript">
		$(document).ready(function(){
		  	$("#search").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $(".ebook-container .ebook-text").filter(function() {
			      	$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
		  	});
		});
	</script>

</html>