<?php

session_start();
    require_once 'autoload.php';
    
    $errors = [];
    
    if ($_POST) {
        # code...
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $email = trim($_POST['email']);
        $registerEmail= DB::checkEmail($email);

        if(!mb_strlen($password) > 0 && !mb_strlen($password) < 8){
            echo '<span>Su contraseña debe ser mayor que 0 y menor que 8</span>';
        }

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
            <!-- <form class="myRegister" action="register.php" method="post" onsubmit="return validar()"> -->
            <form class="myRegister" action="register.php" method="post">
                <h4 class="center">Nuevo usuario</h4>

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input id="user-name" type="text" name="name" data-name="Nombre">
                    <span class="helper-text" style="color:red;"></span>
                    
                </div>

                <div class="form-group">
                    <label for="lastname">Apellido: </label>
                    <input id="user-lastname" type="text" name="lastname" data-name="Apellido">
                    <span class="helper-text" style="color:red;"></span>

                </div>

                <div class="form-group">
                    <label for="email">Correo: </label>
                    <input type="email" name="email" id="email" placeholder="email@example.com" data-name="Correo" >
                    <span class="helper-text" style="color:red;"></span>

                </div>

                <div class="form-group">
                    <label for="pass">Contraseña: </label>
                    <input type="password" name="pass" id="pass" data-name="Contraseña" >
                    <span class="helper-text" style="color:red;"></span>


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