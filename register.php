<?php

session_start();
    require_once 'autoload.php';
    
    if ($_POST) {
        # code...
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $email = trim($_POST['email']);
        $registerEmail= DB::checkEmail($email);

        if ( (!isset($name, $password, $password, $email)) && (empty($name) || empty($lastname) || empty($password) || empty($email) ) ) {
            header("location:register.php");
        }elseif ($registerEmail) {
            header("location:register.php");
        }else{
            $userToSave = new Usuario($name, $lastname, $password, $email);

            $saved = DB::saveUsuario($userToSave);
        }

    }

	$pageTitle = 'Registro';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>

    <?php if (isset($_SESSION['login_user']) && $_SESSION['login_user'] == true) : ?>
    
    <div class="row">
        <div class="col s12 m6">
            <form class="myRegister" action="register.php" method="post" onsubmit="return validar()">
                <h4 class="center">Nuevo usuario</h4>

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input id="user-name" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="lastname">Apellido: </label>
                    <input type="text" name="lastname">
                </div>

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
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
    <?php else: ?>

        <?php header("Location:error.php"); ?>

    <?php endif; ?>
    
    <?php require_once 'partials/scripts.php'; ?>

</body>
</html>