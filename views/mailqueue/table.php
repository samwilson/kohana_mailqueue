<div class="mailqueue">
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Date Queued</th>
				<th>Date Sent</th>
				<th>To</th>
				<th>Subject</th>
				<th>Message</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($mails as $mail): $msg = $mail->getMessage(); ?>
			<tr>
				<td><?=$mail->getId()?></td>
				<td><?=$mail->getDatetimeQueued()?></td>
				<td><?=$mail->getDatetimeSent()?></td>
				<td>
					<?php
					foreach ($msg->getTo() as $email=>$name)
					{
						if ($name) echo '&lt;'.$name.'&gt; ';
						echo $email;
					}
					?>
				</td>
				<td><?php echo $msg->getSubject() ?></td>
				<td>
					<?= ($msg->getContentType()=='text/html')
						? $msg->getBody()
						: HTML::entities($msg->getBody()) ?>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
