<?php
    
    if ($_FILES) {
        if ($_FILES["file"]["error"] != 0) {
            echo "Hubo un error en la subida del archivo <br>";
        }
        else {
            $ext= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

            if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "mp4") {
                echo "El archivo debe ser con extension jpg, jpeg, png ó mp4";
            }else{
                move_uploaded_file($_FILES["file"]["tmp_name"], "archivos/file." . $ext);
            }
            
        }
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

    <form action="uploadForm.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="file" lang="es">
                    <label class="custom-file-label" for="file">Seleccionar Archivo</label>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <label for="comments">Comentarios</label>
                <textarea id="description" cols="8" rows="80"></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Subir</button>
            
        
    </form>
    
</body>
</html>