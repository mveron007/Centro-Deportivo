<?php
    require_once 'autoload.php';

    $pics = DB::getAllImages();

    $videos = DB::getAllVideos();

    // if ($_POST) {
      
    //   if (isset($_POST['edit'])) {
    //     $_POST[]
    //     DB::updateImage();
    //   }
    // }

    $pageTitle = 'Editar Contenido';
    require_once 'partials/head.php'
?>

<div id="edit-pics">
      <div class="title-edit-pics">
        <h3 class="center">Tabla de Fotos</h3>
      </div>
      <table class="table" style="margin-top: 10px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Foto</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>

                <?php foreach ($pics as $pic): ?>

                    <tbody>
                        <tr>
                        <td><?php echo $pic["id_image"] ?></td>
                        <td><img src=<?php echo $pic["image_path"] ?>></td>
                        <td><?php echo $pic["m_name"] ?></td>
                        <td><?php echo $pic["m_description"] ?></td>
                        <td>
                            <button class="btn waves-effect waves-light red accent-4" type="submit" name="action">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <button class="btn waves-effect waves-light" type="button" name="action">
                              <a href="edit-photo.php?id=<?php echo $pic["id_image"] ?>" ><i class="fas fa-edit"></i></a>
                            </button>  
                        </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
    </div>

    <div id="edit-videos">
      <div class="title-edit-videos">
        <h3 class="center">Tabla de Videos</h3>
      </div>
      <table class="table" style="margin-top: 10px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Video</th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>

                <?php foreach ($videos as $video): ?>

                    <tbody>
                        <tr>
                        <td><?php echo $video["id_video"] ?></td>
                        <td><video id="myVideo" src=<?php echo $video["video_path"] ?>></video></td>
                        <td><?php echo $video["v_name"] ?></td>
                        <td><?php echo $video["v_description"] ?></td>
                        <td>
                          <button class="btn waves-effect waves-light red accent-4" type="submit" name="delete">
                            <i class="fas fa-trash-alt"></i>
                          </button>

                          <button class="btn waves-effect waves-light" type="submit" name="edit">
                            <a href="edit-video.php?id=<?php echo $video["id_video"] ?>"><i class="fas fa-edit"></i></a>
                            
                          </button>
                            
                              
                        </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
    </div>

    <?php require_once 'partials/scripts.php'; ?>