<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mail Queue</title>

		<!-- Bootstrap core CSS -->
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/bootswatch/3.0.0/cosmo/bootstrap.min.css" rel="stylesheet">
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
					<a class="navbar-brand" href="#">Mail Queue</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</div>


		<div class="container">

			<?= $content; ?>

		</div> <!-- /container -->

		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$(function() {
			});
		</script>
	</body>
</html>
