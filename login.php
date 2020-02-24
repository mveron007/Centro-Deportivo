<?php
    require_once 'autoload.php';


    $loginValidator = new LoginValidator;

    if ($_POST) {
        $usuario = DB::getUserByEmail($_POST['email']);

        if (!$usuario) {
            $loginValidator->setError('email', 'No existe un usuario con ese correo');
        }elseif (!password_verify($_POST['pass'], $usuario->getPassword())) {
            $loginValidator->setError('password', 'Error de credenciales');
        }

        // if ( $loginValidator->isValid() ) {
		
		// 	if ( isset($_POST['pass']) ) {
		// 		setcookie('userLogedEmail', $usuario->getEmail(), time() + 3000);
		// 	}

		// 	$Auth->login($usuario);
		// }
    }

	$pageTitle = 'Ingresa';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>
    
    <div class="row">
        <div class="col s12 m6">
                <?php if ( $_POST && $loginValidator->isValid() == false ): ?>
					<div class="alert alert-danger">
						<ul>
							<?php foreach ($loginValidator->getAllErrors() as $oneError): ?>
								<li> <?php echo $oneError; ?> </li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>
            <form action="register.php" method="post">
                <h4 class="center">Mi cuenta</h4>

                <div class="form-group">
                    <label for="email">Correo: </label>
                    <input type="email" name="email" id="email" placeholder="email@example.com">
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 center">
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <?php require_once 'partials/scripts.php'; ?>
    
</body>
</html>