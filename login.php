<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>OpenCEMS | Login</title>
	<link rel="icon" href="assets/images/cropped-Colored-32x32.png" sizes="32x32" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/login_form.css"> 
	<link href="https://unpkg.com/pnotify@4.0.0/dist/PNotifyBrightTheme.css" rel="stylesheet">
</head>
<body class="my-login-page">
<div>
	<div id="loginbox">
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="assets/images/opencems.png" alt="logo">
						</div>
						<div class="card fat">
							<div class="card-body">
							<h4 class="card-title">Login</h4>
								<form id = "login_form"  method="POST" action="connexion.php" class="my-login-validation" novalidate="" role = "form">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="username" type="text" class="form-control" name="username" value="" required autofocus>
									</div>
									<div class="form-group">
										<label for="password">Password
											<a href="#" class="float-right">Forgot Password?</a>
										</label>
										<input id="password" type="password" class="form-control" name="password" required data-eye>
									</div>
									<div class="form-group">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" name="remember" id="remember" class="custom-control-input">
											<label for="remember" class="custom-control-label">Remember Me</label>
										</div>
									</div>
									<div class="form-group m-0">
										<input name="btn_login" type ="submit" class="btn btn-primary btn-block" value = "Log in"/>
									</div>
									<div class="mt-4 text-center">
										Don't have an account? <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">Create One</a>
									</div>
								</form>
							</div>
						</div>
						<div class="footer">Copyright &copy;&mdash;  Powered by EQL-CE</div>
						  <footer class="">
						<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://www.univ-pau.fr/en/home.html">
								<img src="assets/images/UPPA.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
								<a href="https://e2s-uppa.eu/en/index.html">
								<img src="assets/images/E2S.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://elqano.com/">
								<img src="assets/images/Elqano-logo.svg" class="img-fluid"
								alt="">
							</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://www.nouvelle-aquitaine.fr">
								<img src="assets/images/NA.png" class="img-fluid"
								alt="">
							</a>
							</div>
							</div>
							<div class="col-lg-3 offset-lg-3 col-md-3 col-sm-3 mb-4">
							<div class="view overlay z-depth-1-half">
								<a href="https://www.communaute-paysbasque.fr">
								<img src="assets/images/PB.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 offset-lg-0 col-md-3 offset-md-1 offset-sm-1 col-sm-3 mb-5">
							<div class="view overlay z-depth-1-half">
								<a href="https://www.bertin.fr">
								<img src="assets/images/Bertin.png" class="img-fluid"
								alt="https://www.bertin.fr">
								</a>
							</div>
							</div>
						</div>
					</div>
						</footer>	
					</div>
				</div>
			</div>
		</section>
	</div>

	<!---------- signup ------------>
    <div id="signupbox" style="display:none;"> 
		<section class="h-100">
			<div class="container h-100">
				<div class="row justify-content-md-center h-100">
					<div class="card-wrapper">
						<div class="brand">
							<img src="assets/images/opencems.png" alt="logo">
						</div>
						<div class="card fat">
							<div class="card-body">
								<h4 class="card-title">Register</h4>
								<form id = "register_form"  method="POST" class="my-login-validation" novalidate="" role = "form">
									<div class="form-group">
										<label for="username">Username</label>
										<input id="usernamer" type="text" class="form-control" name="usernamer"  required="required" autofocus>
									</div>
									<div class="form-group">
										<label for="email">E-Mail Address</label>
										<input id="emailr" type="email" class="form-control" name="emailr" required="required">
									</div>
									<div class="form-group">
										<label for="password">Password</label>
										<input id="passwordr" type="password" class="form-control" name="passwordr" required="required" data-eye>
									</div>
									<div class="form-group">
										<label for="Cpassword">Repeat Password</label>
										<input id="pwdr" type="password" class="form-control" name="pwdr" required="required" data-eye>
									</div>
									<!--div>Picture</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="validatedCustomFile" required>
										<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
										<div class="invalid-feedback">
											Please upload your picture?
										</div>
									</div-->
									<div class="form-group">
										<div class="custom-checkbox custom-control">
											<input type="checkbox" name="agree" id="agree" class="custom-control-input" required="">
											<label for="agree" class="custom-control-label">I agree to the <a href="#">Terms and Conditions</a></label>
											<!--div class="invalid-feedback">
												You must agree with our Terms and Conditions
											</div-->
										</div>
									</div>
									<div class="form-group m-0">
										<input type ="submit" class="btn btn-primary btn-block" value = "Sign Up"/>
									</div>
									<div class="mt-4 text-center">
										Already have an account? <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Login</a>
									</div>
								</form>
							</div>
						</div>
						<div class="footer">Copyright &copy;&mdash;  Powered by EQL-CE</div>
						<footer class="">
						<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://www.univ-pau.fr/en/home.html">
								<img src="assets/images/UPPA.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
								<a href="https://e2s-uppa.eu/en/index.html">
								<img src="assets/images/E2S.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://elqano.com/">
								<img src="assets/images/Elqano-logo.svg" class="img-fluid"
								alt="">
							</a>
							</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3  mb-4">
							<div class="view overlay z-depth-1-half">
							<a href="https://www.nouvelle-aquitaine.fr">
								<img src="assets/images/NA.png" class="img-fluid"
								alt="">
							</a>
							</div>
							</div>
							<div class="col-lg-3 offset-lg-3 col-md-3 col-sm-3 mb-4">
							<div class="view overlay z-depth-1-half">
								<a href="https://www.communaute-paysbasque.fr">
								<img src="assets/images/PB.png" class="img-fluid"
								alt="">
								</a>
							</div>
							</div>
							<div class="col-lg-3 offset-lg-0 col-md-3 offset-md-1 offset-sm-1 col-sm-3 mb-5" >
							<div class="view overlay z-depth-1-half">
								<a href="https://www.bertin.fr">
								<img src="assets/images/Bertin.png" class="img-fluid"
								alt="https://www.bertin.fr">
								</a>
							</div>
							</div>
						</div>
					</div>
						</footer>
					</div>
				</div>
			</div>
		</section>
    </div>
</div>
<script src="gentelella/vendors/jquery/dist/jquery.min.js"></script>   
<script src="gentelella/vendors/dropzone/dist/min/dropzone.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script>
<script src="assets/js/login_script.js?"></script>
<script src="assets/js/login_form.js?"></script>
</body>
</html>
