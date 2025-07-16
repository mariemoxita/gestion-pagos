<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('./db_connect.php');
ob_start();
// if(!isset($_SESSION['system'])){
$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
foreach ($system as $k => $v) {
	$_SESSION['system'][$k] = $v;
}
// }
ob_end_flush();
?>

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="icon" type="image/x-icon" href="assets/uploads/graduation.png">


	<?php include('./header.php');
	include('./footer.php'); ?>
	<?php
	if (isset($_SESSION['login_id']))
		header("location:index.php?page=payments");

	?>

</head>


<style>
        body {
            font-family: Century Gothic, sans-serif;
            background-color:rgb(242, 242, 242);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 40;
        }
        .container-login {
            display: flex;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 720px;
        } 

        .info-school {
            width: 60%;
            background-color: #ffffff;
            text-align: center;
            padding: 40px;
        }
        .info-school img {
            width: 90%;
        }
        .login-section {
            width: 50%;
            padding: 40px;
            text-align: center;
        }
        
        .login-section img {
            margin-top: 60px;
            width: 80px;
        }

        .login-section input {
            width: 100%;
            padding: 20px;
            margin: 20px 0;
            border: 2px solid #ccc;
            border-radius: 4px;
        }
        .login-section button {
            background-color: #7b1fa2;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .login-section button:hover {
            background-color: #6a1b9a;
        }
    </style>

<body>
    <div class="container-login">
	<div class="info-school">
	<h2>Escuela Particular de Educación Básica "Despertar Ecuatoriano"</h2>
        <img src="assets/uploads/logo.png" alt="Logo de la Escuela">
		</div>
		<div class="login-section">
            <img src="data:image/jpeg;base64,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" alt="Usuario" width="80">
            <form id="login-form">
    <div class="form-group">
        
        <input type="text" id="username" name="username" placeholder="Correo" class="form-control">
    </div>
    <div class="form-group">
        
        <input type="password" id="password" name="password" placeholder="Contraseña" class="form-control">
    </div>
    <br>
    <center><button class="btn btn-primary">Iniciar Sesión</button></center>
</form>
    </div>
	</div>
			
	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

</body>

<script>
	$('#login-form').submit(function(e) {
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
		if ($(this).find('.alert-danger').length > 0)
			$(this).find('.alert-danger').remove();
		$.ajax({
			url: 'ajax.php?action=login',
			method: 'POST',
			data: $(this).serialize(),
			error: err => {
				console.log(err)
				$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success: function(resp) {
				if (resp == 1) {
					location.href = 'index.php?page=payments';
				} else {
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>


</html>