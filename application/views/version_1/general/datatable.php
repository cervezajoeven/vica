<table id="example" class="display responsive nowrap" style="width:100%">
	<thead>
		<tr>
			<th></th>
			<th></th>
			<?php foreach($settings['th'] as $settings_th_key=>$settings_th_value):?>
				<th><?php echo $settings_th_value?></th>
			<?php endforeach;?>
			<th>Status</th>
			<th>Date Created</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($settings['data']['all_data'] as $all_data_key=>$all_data_value ):?>
			<?php if(array_key_exists('main_'.$general_class->current_page['controller'].'_id', $all_data_value)){
				$the_id = $all_data_value['main_'.$general_class->current_page['controller'].'_id'];
				$the_status = $all_data_value['main_'.$general_class->current_page['controller'].'_status'];
				$the_date_created = $all_data_value['main_'.$general_class->current_page['controller'].'_date_created'];
			}else{
				$the_id = $all_data_value['id'];
				$the_status = $all_data_value['status'];
				$the_date_created = $all_data_value['date_created'];
			}
			?>
			<tr>
				<td></td>
				
				<td data-id="<?php echo $the_id?>"></td>
				<?php foreach($settings['td'] as $settings_td_key=>$settings_td_value):?>
					<td><?php echo ucwords($all_data_value[$settings_td_value]); ?></td>
				<?php endforeach;?>
				<td><?php echo ucwords(ben_status($the_status)) ?></td>
				<td><?php echo ben_date($the_date_created)?></td>
			</tr>
		<?php endforeach?>

	</tbody>


	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<?php foreach($settings['th'] as $settings_th_key=>$settings_th_value):?>
				<th><?php echo $settings_th_value?></th>
			<?php endforeach;?>
			<th>Status</th>
			<th>Date Created</th>
		</tr>
	</tfoot>
</table>