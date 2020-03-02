<?php
    require_once "autoload.php";

    // var_dump($_GET);

    $pic = DB::getImageByID($_GET['id']);

    if ($_POST) {
        # code...
        if (isset($_POST['form1'])) {

			if (isset($_POST['form1'])) {
                // var_dump($_POST['title_image']);
                // var_dump($_POST['id']);
                // var_dump($_FILES['file']['name']);

                if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
                    $imageName = $_FILES['file']['name'];
                    $imageFile = $_FILES['file']['tmp_name'];
                    $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        
                    if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
        
                        $finalFile ="uploads/" . "images/" . $imageName . "." . $ext;
                        
                        DB::updateImage($_GET['id'], $_POST['id'],$finalFile,$_POST['title_image'], $_POST['description']);
                        
        
                        move_uploaded_file($imageFile, $finalFile);
                    }else{
                        echo "Los formatos validos son: gif, png, jpg, jpeg";
                    }
                }
            }
		}
    }
    
    

    $pageTitle = 'Ingresa';
    require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>

        <div class="row">
			<div class="col s12 m6">
				<form action="edit-photo.php?id=<?php echo $pic["id_image"] ?>" method="post" enctype="multipart/form-data" class="z-depth-2">
					<h4 class="center">Tabla de Imagenes >> Editar Imagen</h4>´

                    <input type="hidden" name="id" value="<?php echo $pic["id_image"]; ?>">

					<div class="file-field input-field">
						<div class="btn">
							<i class="far fa-images"></i>
							<input type="file" name="file" value="<?php echo $pic["image_path"] ?>">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="title_image" value="<?php echo $pic["m_name"] ?>">
							<label for="name">Titulo </label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<textarea id="description" name="description" class="materialize-textarea" data-length="120"><?php echo $pic["m_description"] ?></textarea>
							<label for="description">Descripción</label>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10 center">
							<input type="submit" name="form1" class="btn btn-primary" value="Guardar">
						</div>
					</div>
				</form>
        </div>


    <?php require_once 'partials/scripts.php'; ?>    
</body>
</html>