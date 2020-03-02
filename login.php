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

            // Preguntamos si quiere ser recordado
            
			// Logeamos al usuario
            DB::login($userToLogin);
            
            $_SESSION['name'] = $userToLogin['name'];
		}

        // if (isset($_REQUEST['submit'])) {
        //     extract($_REQUEST);
            
            // $login = DB::checkLogin($emailusername, $password);
            
            // if (empty($emailusername)) {
            //     $errors['email'] = 'El campo email es obligatorio';
            // }elseif ( !filter_var($emailusername, FILTER_VALIDATE_EMAIL) ) { 
            //     $errors['email'] = 'Introducí un formato de email válido';
            // } elseif ( !emailExist($emailusername) ) { 
            //     $errors['email'] = 'Las credenciales no coinciden';
            // } else {
                
            //     $theUser = DB::getUserByEmail($emailusername);

            //     if (!password_verify($password, $theUser['password'])) {
            //         $errors['pass'] = 'Las credenciales no coinciden';
            //     }
            // if ( empty($password) ) {
            //     $errors['pass'] = 'El campo password es obligatorio';
            // }
            
            // return $errors;
            //if ($login) {
                // Registration Success
            //    header("location:profile.php");
            //} else {
                // Registration Failed
            //    echo 'Wrong username or password';
            //}
        // }
    }

    // var_dump($_SESSION['login_user']);
    
	$pageTitle = 'Ingresa';
    require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>
    
    <div class="row">
            <form action="login.php" method="post">
                <h4 class="center">Mi cuenta</h4>

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

    <?php require_once 'partials/scripts.php'; ?>
    
</body>
</html>