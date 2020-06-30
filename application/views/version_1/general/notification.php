<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Notification</h4>
			</div>
			<div class="modal-body">
				<?php foreach($notification as $notification_key=>$notification_value):?>
					<div class="alert alert-<?php echo $notification_value[0] ?>">
						<?php echo $notification_value[1] ?>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>
