<?php
	require_once 'autoload.php';

	if (isset($_POST['form1'])) {

		if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
				
			$imageName = $_FILES['file']['name'];
			$imageFile = $_FILES['file']['tmp_name'];
			$ext = pathinfo($imageName, PATHINFO_EXTENSION);

			if ($ext == 'gif' || $ext == 'png' || $ext == 'jpg' || $ext == 'jpeg') {
				# code...
				// $finalFile = dirname(__FILE__) . "/uploads/" . "images/" . $imageName . "." . $ext;

				$finalFile ="uploads/" . "images/" . $imageName . "." . $ext;
			
				$imageToSave = new Imagen($finalFile, $_POST['title_image'], $_POST['description']);

				$saved = DB::saveImage($imageToSave);

				move_uploaded_file($imageFile, $finalFile);
			}else{
				echo "Los formatos validos son: gif, png, jpg, jpeg";
			}
		}
		if (isset($_POST['form2'])) {
			if ($_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
				# code...
				$videoName = $_FILES['video_file']['name'];
				$videoFile = $_FILES['video_file']['tmp_name'];
				$extV = pathinfo($videoName, PATHINFO_EXTENSION);
	
				if ($extV == 'mp4' || $extV == 'mpeg') {
					# code...
					// $finalFileV = dirname(__FILE__) . "/uploads/" . "videos/" . $videoName . "." . $extV;
					$finalFileV = "uploads/" . "videos/" . $videoName . "." . $extV;
				
					$videoToSave = new Video($finalFileV, $_POST['title_video'], $_POST['description_v']);
	
					$savedVideo = DB::saveVideo($videoToSave);
	
					move_uploaded_file($videoFile, $finalFileV);
				}else{
					echo "Los formatos validos son: mp4, mpeg";
				}
			}
		}
	}


	$pageTitle = 'Perfil';
	require_once 'partials/head.php';
?>

    <?php require_once 'partials/navbar.php'; ?>

	<div class="row">
        <div class="col s12 m6">
            <form action="profile.php" method="post" enctype="multipart/form-data" class="z-depth-2">
				<h4 class="center">Nueva Imagen</h4>
				
				<div></div>

				<div class="file-field input-field">
					<div class="btn">
						<i class="far fa-images"></i>
						<input type="file" name="file">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>

                <div class="row">
					<div class="input-field col s12">
						<input type="text" name="title_image">
						<label for="name">Titulo </label>
					</div>
                </div>

                <div class="row">
					<div class="input-field col s12">
						<textarea id="description" name="description" class="materialize-textarea" data-length="120"></textarea>
						<label for="description">Descripción</label>
					</div>
				</div>

                <div class="form-group row">
                    <div class="col-sm-10 center">
						<!-- <button type="submit" name="form1" class="btn btn-primary">Subir</button> -->
						<input type="submit" name="form1" class="btn btn-primary" value="Subir">
                    </div>
                </div>
			</form>

			<!-- FORMULARIO VIDEO -->

			<form action="profile.php" method="post" enctype="multipart/form-data" class="z-depth-2">
				<h4 class="center">Nuevo Video</h4>
				
				<div></div>

				<div class="file-field input-field">
					<div class="btn">
					<i class="far fa-file-video"></i>
						<input type="file" name="video_file">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input type="text" name="title_video">
						<label for="name">Titulo </label>
					</div>
                </div>

                <div class="row">
					<div class="input-field col s12">
						<textarea id="description_v" name="description_v" class="materialize-textarea" data-length="120"></textarea>
						<label for="description_v">Descripción</label>
					</div>
				</div>

                <div class="form-group row">
                    <div class="col-sm-10 center">
						<!-- <button type="submit" name="form2" class="btn btn-primary">Subir</button> -->
						<input type="submit" name="form2" class="btn btn-primary" value="Subir">
                    </div>
                </div>
			</form>

        </div>
    </div>
    
    <?php require_once 'partials/scripts.php'; ?>

</body>
</html>