<?php
	require_once 'autoload.php';

	$pageTitle = 'Registro';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>
    
    <div class="row">
        <div class="col s12 m6">
            <form action="register.php" method="post">
                <h4 class="center">Nuevo usuario</h4>

                <div class="form-group">
                    <label for="name">Nombre: </label>
                    <input type="text">
                </div>

                <div class="form-group">
                    <label for="lastname">Apellido: </label>
                    <input type="text">
                </div>

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
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
    <?php require_once 'partials/scripts.php'; ?>

</body>
</html>