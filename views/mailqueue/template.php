<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mail Queue</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
	</head>

	<body>

		<!-- Static navbar -->
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= Route::url('mailqueue', array('action' => 'demo')) ?>">
						MailQueue
					</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="https://github.com/samwilson/kohana_mailqueue" title="Github project page">README</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<div class="container">
			<p>
				This is the <a href="https://github.com/samwilson/kohana_mailqueue">MailQueue</a> module
				for <a href="http://kohanaframework.org/">Kohana</a>.
			</p>

			<h2>Send a test message</h2>
			<form class="form-horizontal" role="form" action="<?= Route::url('mailqueue', array('action' => 'send')) ?>" method="post">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-2" for="to">To</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="to" name="to">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="from">From</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="from" name="from">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="subject">Subject</label>
						<div class="col-sm-10">
							<input type="text" class="input-xlarge form-control" id="subject" name="subject">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="message">Message</label>
						<div class="col-sm-10">
							<textarea id="message" name="message" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary">Send message</button>
						</div>
					</div>
				</fieldset>
			</form>

			<h2>View the entire queue</h2>
			<?= $queue ?>

			<div id="kohana-profiler"><?php echo View::factory('profiler/stats') ?></div>
		</div> <!-- /container -->

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	</body>
</html>
