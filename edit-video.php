<?php
    require_once "autoload.php";

    // var_dump($_GET);

    $video = DB::getVideoByID($_GET['id']);


    if ($_POST) {
        # code...
        if (isset($_POST['form2'])) {

            var_dump($_POST['title_video']);
            var_dump($_POST['id']);
            var_dump($_FILES['video_file']['name']);

            if ($_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
                # code...
                $videoName = $_FILES['video_file']['name'];
                $videoFile = $_FILES['video_file']['tmp_name'];
                $extV = pathinfo($videoName, PATHINFO_EXTENSION);
    
                if ($extV == 'mp4' || $extV == 'mpeg') {
                   
                    $finalFileV = "uploads/" . "videos/" . $videoName . "." . $extV;
                
                    DB::updateVideo($_GET['id'], $_POST['id'],$finalFileV,$_POST['title_video'], $_POST['description_v']);
    
                    move_uploaded_file($videoFile, $finalFileV);
                }else{
                    echo "Los formatos validos son: mp4, mpeg";
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
				

                <form action="edit-video.php?id=<?php echo $video["id_video"] ?>" method="post" enctype="multipart/form-data" class="z-depth-2">
					<h4 class="center">Tabla de Videos >> Editar Video</h4>
					
					<input type="hidden" name="id" value="<?php echo $video["id_video"]; ?>">

					<div class="file-field input-field">
						<div class="btn">
						<i class="far fa-file-video"></i>
							<input type="file" name="video_file" value="<?php echo $video["video_path"] ?>">
						</div>
						<div class="file-path-wrapper">
							<input class="file-path validate" type="text">
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="title_video" value="<?php echo $video["v_name"] ?>">
							<label for="name">Titulo </label>
						</div>
					</div>

					<div class="row">
						<div class="input-field col s12">
							<textarea id="description_v" name="description_v" class="materialize-textarea" data-length="120"><?php echo $video["v_description"] ?></textarea>
							<label for="description_v">Descripción</label>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-sm-10 center">
							<input type="submit" name="form2" class="btn btn-primary" value="Guardar">
						</div>
					</div>
				</form>

            </div>

        </div>


    <?php require_once 'partials/scripts.php'; ?>    
</body>
</html>