<style type="text/css">
	.photo_view{
		width: 100%;
		height: 350px;
	}
</style>
<link href="https://www.jqueryscript.net/demo/Responsive-Photo-Viewer/css/photoviewer.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-12-lg">
			<h1>Memos</h1>
			<hr/><hr/>
		</div>
		<?php $memo_data = $general_class->data['memo_data']; ?>
		<?php $url = $general_class->ben_image("company/steps/memo/"); ?>
		<?php foreach ($memo_data as $memo_data_key => $memo_data_value) : ?>
			<?php $date_month_array[$memo_data_key] = (int)date("m",strtotime($memo_data_value['date_created'])); ?>
		<?php endforeach; ?>

		<?php for ($x=12; $x > 0 ; $x--):  ?>
			<?php if(in_array($x, $date_month_array)):?>
				<?php 
					$dateObj   = DateTime::createFromFormat('!m', $x);
					$monthName = $dateObj->format('F');
				?>
				<div class="col-lg-12" id="month_id_<?php echo $x?>">
					<h1><?php echo $monthName; ?></h1>
					<hr/>
				</div>

				<?php foreach ($memo_data as $memo_data_key => $memo_data_value) : ?>
					<?php //print_r(in_array($general_class->session->userdata()['id'], explode(",",$memo_data_value['account_ids']))); ?>
					<?php //print_r($general_class->session->userdata()['id']); ?>
					<?php //print_r(explode(",",$memo_data_value['account_ids'])); ?>
					<?php if($general_class->session->userdata()['account_type_id']==5): ?>



						<?php if(in_array($general_class->session->userdata()['id'], explode(",",$memo_data_value['account_ids']))): ?>
							<?php $the_month = (int)date("m",strtotime($memo_data_value['date_created'])); ?>
							<?php if($the_month == $x): ?>
								<div class="col-lg-4">
									<a data-gallery="example" data-caption="Caption 1" data-group="a" href="<?php echo $url.$memo_data_value['memo_url']?>">
		                                                <!-- <img class="image" src="<?php echo $url.$memo_data_value['memo_url']?>"> -->
		                               	<img class="photo_view" src="<?php echo $url.$memo_data_value['memo_url']?>" alt="Image 1">
		                            </a>
									
								</div>
							<?php endif; ?>
						<?php endif; ?>




						
					<?php else: ?>

						<?php $the_month = (int)date("m",strtotime($memo_data_value['date_created'])); ?>
						<?php if($the_month == $x): ?>
							<div class="col-lg-4">
								<a data-gallery="example" data-caption="Caption 1" data-group="a" href="<?php echo $url.$memo_data_value['memo_url']?>">
		                                <!-- <img class="image" src="<?php echo $url.$memo_data_value['memo_url']?>"> -->
		                            	<img class="photo_view" src="<?php echo $url.$memo_data_value['memo_url']?>" alt="Image 1">
		                         </a>
							</div>
						<?php endif; ?>
						
					<?php endif; ?>
				<?php endforeach; ?>


			<?php endif; ?>
		<?php endfor; ?>
		
	</div>
</div>

<script src="https://www.jqueryscript.net/demo/Responsive-Photo-Viewer/js/photoviewer.js"></script>

<script type="text/javascript">

    $('[data-gallery=example]').photoviewer();

</script>