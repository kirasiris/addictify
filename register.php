<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	$account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name) {
		if(isset($_POST[$name])) {
			echo $_POST[$name];
		}
	}
?>

<html>
<head>
	<title>Bienvenido to Addictify!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>
	<?php

	if(isset($_POST['registerButton'])) {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").hide();
					$("#registerForm").show();
				});
			</script>';
	}
	else {
		echo '<script>
				$(document).ready(function() {
					$("#loginForm").show();
					$("#registerForm").hide();
				});
			</script>';
	}

	?>
	

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Ingresa a tu cuenta</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Nombre de usuario</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername') ?>" required autocomplete="off">
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">INGRESAR</button>

					<div class="hasAccountText">
						<span id="hideLogin">Aun no tienes cuenta? Registrate aqui.</span>
					</div>
					
				</form>



				<form id="registerForm" action="register.php" method="POST">
					<h2>Crea tu cuenta gratis</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters); ?>
						<?php echo $account->getError(Constants::$usernameTaken); ?>
						<label for="username">Nombre de Usuario</label>
						<input id="username" name="username" type="text" placeholder="e.g. kirasiris" value="<?php getInputValue('username') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters); ?>
						<label for="firstName">Primer nombre</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. Kevin" value="<?php getInputValue('firstName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters); ?>
						<label for="lastName">Segundo nombre</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Fonseca" value="<?php getInputValue('lastName') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailTaken); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. kebin1421@hotmail.com" value="<?php getInputValue('email') ?>" required>
					</p>

					<p>
						<label for="email2">Confirmar email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. kebin1421@hotmail.com" value="<?php getInputValue('email2') ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						<?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						<?php echo $account->getError(Constants::$passwordCharacters); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Tu password" required>
					</p>

					<p>
						<label for="password2">Confirmar password</label>
						<input id="password2" name="password2" type="password" placeholder="Tu password" required>
					</p>

					<button type="submit" name="registerButton">REGISTRARSE</button>

					<div class="hasAccountText">
						<span id="hideRegister">Ya tines una cuenta?. Ingresa aqui.</span>
					</div>
					
				</form>


			</div>

			<div id="loginText">
				<h1>Gran musica, justo ahora</h1>
				<h2>Escucha cientos de canciones gratis!</h2>
				<ul>
					<li>Descubre musica de la cual te enamoraras</li>
					<li>Crea tus propias playlist</li>
					<li>Sigue artistas para mantenerta a la fecha</li>
				</ul>
			</div>

		</div>
	</div>

</body>
</html>