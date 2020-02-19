<?php
    require_once 'autoload.php';


    if ($_POST && isset($_FILES['file'])) {
        $fileToSave = new MultimediaFile($_POST['m_name'], $_POST['description']);
        $ext= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

        if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif") {
            # code...
            $fileToSave->uploadImageFile($_FILES['file']);
        }else{
            $fileToSave->uploadVideoFile($_FILES['file']);
        }



        $saved=DB::saveFile($fileToSave);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <title>Carga de archivos</title>
</head>
<body>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="card text-center">
            <div class="card-header">
                <h3>Agregar archivos multimedia</h3>
            </div>
            <div class="card-body">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="file" lang="es">
                    <label class="custom-file-label" for="file">Seleccionar Archivo</label>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" id="title">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="description"><h5>Description</h5></label>
                        <textarea id="description" class="form-control" rows="10" cols="100"></textarea>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary" type="submit">Subir</button>
            </div>
          </div>
            
        
    </form>
    
</body>
</html>