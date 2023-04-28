<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-GB">

<head>
	<title>Admin Log In</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="robots" content="index, follow" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" /> -->

	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" media="screen" />
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/script.js"></script>


	<script type="text/javascript">
		$(document).ready(function() {

			$('#loginForm').submit(function(e) {
				login();
				e.preventDefault();


			});
		});
	</script>

	<style type="text/css">
		:root {
			--input-padding-x: 1.5rem;
			--input-padding-y: .75rem;
		}

		body {
			background: #007bff;
			background: linear-gradient(to right, #0062E6, #33AEFF);
		}

		.card-signin {
			border: 0;
			border-radius: 1rem;
			box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
		}

		.card-signin .card-title {
			margin-bottom: 2rem;
			font-weight: 300;
			font-size: 1.5rem;
		}

		.card-signin .card-body {
			padding: 2rem;
		}

		.form-signin {
			width: 100%;
		}

		.form-signin .btn {
			font-size: 80%;
			border-radius: 5rem;
			letter-spacing: .1rem;
			font-weight: bold;
			padding: 1rem;
			transition: all 0.2s;
		}

		.form-label-group {
			position: relative;
			margin-bottom: 1rem;
		}

		.form-label-group input {
			height: auto;
			border-radius: 2rem;
		}

		.form-label-group>input,
		.form-label-group>label {
			padding: var(--input-padding-y) var(--input-padding-x);
		}

		.form-label-group>label {
			position: absolute;
			top: 0;
			left: 0;
			display: block;
			width: 100%;
			margin-bottom: 0;
			/* Override default `<label>` margin */
			line-height: 1.5;
			color: #495057;
			border: 1px solid transparent;
			border-radius: .25rem;
			transition: all .1s ease-in-out;
		}

		.form-label-group input::-webkit-input-placeholder {
			color: transparent;
		}

		.form-label-group input:-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-ms-input-placeholder {
			color: transparent;
		}

		.form-label-group input::-moz-placeholder {
			color: transparent;
		}

		.form-label-group input::placeholder {
			color: transparent;
		}

		.form-label-group input:not(:placeholder-shown) {
			padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
			padding-bottom: calc(var(--input-padding-y) / 3);
		}

		.form-label-group input:not(:placeholder-shown)~label {
			padding-top: calc(var(--input-padding-y) / 3);
			padding-bottom: calc(var(--input-padding-y) / 3);
			font-size: 12px;
			color: #777;
		}

		.btn-google {
			color: white;
			background-color: #007bff;
		}

		.btn-facebook {
			color: white;
			background-color: #dc3545;
		}

		/* Fallback for Edge
-------------------------------------------------- */

		@supports (-ms-ime-align: auto) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input::-ms-input-placeholder {
				color: #777;
			}
		}

		/* Fallback for IE
-------------------------------------------------- */

		@media all and (-ms-high-contrast: none),
		(-ms-high-contrast: active) {
			.form-label-group>label {
				display: none;
			}

			.form-label-group input:-ms-input-placeholder {
				color: #777;
			}
		}
	</style>

<body>

	<div class="container">
		<div class="row">
			<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
				<div class="card card-signin my-5">
					<div class="card-header">
						<div id="error" class="error text-danger text-center font-weight-bold"></div>
						<?php if (!empty($error)) {
							echo "<div class='alert alert-danger'>" . $error . "</div>";
						} ?>
					</div>
					<div class="card-body">
						<h5 class="card-title text-center">User Sign In</h5>
						<form class="form-signin" method="post" id="loginForm" action="login_submit.php">
							<div class="form-label-group">
								<input type="text" onclick="this.value='';" name="username" id="username" class="form-control" placeholder="User name" autofocus required value="<?php if (isset($_POST['username'])) {
																																														echo $_POST['username'];
																																													} ?>">
								<label for="username">User name</label>
							</div>

							<div class="form-label-group">
								<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
								<label for="password">Password</label>
							</div>

							<div class="custom-control custom-checkbox mb-3">
								<input type="checkbox" class="custom-control-input" id="customCheck1">
								<label class="custom-control-label" for="customCheck1">Remember password</label>
							</div>
							<input id="submit" name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">
							<hr class="my-4">
							<!-- <a class="btn btn-lg btn-google btn-block text-uppercase" href="/auth/login.php"><i class="fa fa-user fa-lg"></i> Login as a user </a> -->
							<a class="btn btn-lg btn-facebook btn-block text-uppercase" href="/auth/admin/login.php"><i class="fa fa-id-card fa-lg"></i>
								Login in as admin</a>
						</form>

					</div>
					<div class="card-footer text-muted text-center">

						<p class="">Copyright&copy;2019:Arora Realtech Pvt Ltd</p>

					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>