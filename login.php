<!DOCTYPE html>
<html>

<head>
	<title>Nirtics</title>
	<link rel="stylesheet" link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
	<link rel="icon" type="image/x-icon" href="assets/Logo Nirtic polos.png">
</head>
<style>
	body {
		background-color: #021780;
		height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: 'Poppins', sans-serif;
	}

	.btn {
		background-color: #021780;
		color: white;
		display: block !important;
	}

	a {
		text-decoration: none;
	}
</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="card">
					<div class="card-body">
						<div class="container">
							<form action="actLogin.php" method="POST">
								<div class="mb-3">
									<div class="text-center">
										<h2>LOGIN</h2>
										<hr>
									</div>
									<span class="error">
										<?php if (isset($_GET['pesan'])) echo
										'<div class="alert alert-danger text-center" role="alert">Username or Email Invalid! </div>'; ?>
									</span>
									<label for="username" class="form-label">Username or Email</label>
									<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username or Email" required oninvalid="this.setCustomValidity('Please Enter Username or Email!')" oninput="this.setCustomValidity('')" />
								</div>
								<div class="my-3">
									<label for="password" class="form-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required oninvalid="this.setCustomValidity('Please Enter Password!')" oninput="this.setCustomValidity('')" />
								</div>
								<button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
								<div class="text-center">
									<hr>
									<a href="reg.php">Create an Account!</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>