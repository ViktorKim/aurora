<?php
/**
 * Created by Viktor Kim.
 * Date: 8/22/2018
 * Time: 19:04
 */
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<link rel="stylesheet" href="assets/libs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="page__wrapper">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1 class="logo">Aurora</h1>
				</div>
			</div>
		</div>
	</header>

	<div class="main">
		<div class="container">
			<form id="checker-form" action="#">
				<div class="form-group">
					<label for="site-url">Your Site</label>
					<input type="url" id="site-url" name="site_url" class="form-control" placeholder="Your Site" required>
				</div>

				<div class="form-group">
					<label for="user-email">Your Email</label>
					<input type="email" id="user-email" name="user_email" class="form-control" placeholder="Your email" required>
				</div>

				<div class="form-group">
					<label for="ping-interval">Ping Interval</label>
					<input type="number" id="ping-interval" class="form-control" min="5" placeholder="Ping Interval" required>
				</div>

				<div id="message-holder"></div>

				<button id="action-btn" class="btn btn-success">Ping</button>

				<button href="#" id="stop-ping-btn" data-stopped="true" class="btn btn-outline-danger" style="display: none;">Stop</button>
			</form>


		</div>
	</div>
</div>
<footer class="footer">
	<div class="container">
		<div class="copyright text-center">Copyright &copy; <?= date('Y')?></div>
	</div>
</footer>

<script defer src="assets/js/main.js"></script>
</body>
</html>
