<?php

 session_start();
	// var_dump($_SESSION['login_user']['u_name']);
	require_once 'autoload.php';

	if ($_POST) {

		if(isset($_POST['logout_btn'])){
			unset($_SESSION['login_user']);
			header("Location:login.php");
			exit;
		}

	}
	

	$pageTitle = 'Perfil';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>

	

	<?php if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == true) : ?>
		
		<h1><?php echo 'Hola' . ' ' .$_SESSION['login_user']['u_name']; ?></h1>

		<div class="row">
			<div class="col-4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text center">
						<span class="card-title"><i class="fas fa-user-plus fa-4x"></i></span>
					</div>
					<div class="card-action center">
						<a href="register.php">Registrar usuario</a>
					</div>
				</div>
			</div>

			<div class="col-4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text center">
						<span class="card-title"><i class="fas fa-upload fa-4x"></i></span>
					</div>
					<div class="card-action center">
					<a href="upload.php">Subir Contenido</a>
					</div>
				</div>
			</div>

			<div class="col-4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text center">
						<span class="card-title"><i class="fas fa-file-signature fa-4x"></i></i></span>
					</div>
					<div class="card-action center">
					<a href="gallery-update.php">Editar Contenido</a>
					</div>
				</div>
			</div>

			<div class="col-4">
				<div class="card blue-grey darken-1">
					<div class="card-content white-text center">
						<span class="card-title"><i class="fas fa-clock fa-4x"></i></i></span>
					</div>
					<div class="card-action center">
						<a href="schedule-update.php">Editar Horarios</a>
					</div>
				</div>
			</div>
		</div>

		

	<?php endif; ?>
	
	
<?php require_once 'partials/scripts.php'; ?>