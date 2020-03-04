<?php
   session_start();
    require_once 'autoload.php';
    
    //$user = new Usuario($emailusername, $password);
    $emailusername='';

    // Generamos nuestro array de errores interno
    $errorsInLogin = [];

    // if ( DB::get_session() ) {
    //     header('location: profile.php');
    //     exit;
    // }

    if ($_POST) {
        
        $emailusername = trim($_REQUEST['email']);
        $password = trim($_REQUEST['pass']);
        $errorsInLogin = DB::loginValidate($emailusername, $password);

        if ( !$errorsInLogin ) {
			// Traemos al usuario que vamos a loguear
			$userToLogin = DB::getUserByEmail($emailusername);
            
			// Logeamos al usuario
            DB::login($userToLogin);
            
            $_SESSION['name'] = $userToLogin['name'];
		}

    // var_dump($_SESSION['login_user']);
    
	$pageTitle = 'Ingresa';
    require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>
    
    <div class="row">
        <div class="col s-12 m-6">
        <form action="login.php" method="post">
                <h4 class="center">Ingreso a mi cuenta</h4>

                <div class="form-group">
                    <label for="email">Correo: </label>
                    <input type="email" name="email" id="email" placeholder="email@example.com">
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass">
                    <label>
                        <input type="checkbox" onclick="TogglePass()" />
                        <span>Mostrar contraseña</span>
                    </label>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 center">
                        <button type="submit" class="btn btn-primary" name="submit">Ingresar</button>
                    </div>
                </div>

            </form>
        </div>
            
        </div>
    </div>

    <?php require_once 'partials/scripts.php'; ?>
    
</body>
</html>