<div class="mailqueue">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Date Queued</th>
				<th>Date Sent</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mails as $mail): ?>
			<tr class="<?=URL::title($mail->getStatus())?>">
				<td><?=$mail->getId()?></td>
				<td><?=$mail->getDateQueued()?></td>
				<td><?=$mail->getDateSent()?></td>
				<td class="status">
					<?=$mail->getStatus()?>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
