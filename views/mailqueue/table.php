<table class="mailqueue table">
	<thead>
		<tr>
			<th>From</th>
			<th>To</th>
			<th>Date Queued</th>
			<th>Date Sent</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($mails as $mail): ?>
		<tr>
			<td><?=$mail->getFrom()?></td>
			<td><?=$mail->getTo()?></td>
			<td><?=$mail->getDateQueued()?></td>
			<td><?=$mail->getDateSent()?></td>
			<td class="status <?=URL::title($mail->getStatus())?>">
				<?=$mail->getStatus()?>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
