<?php
    require_once "autoload.php";

    $pics = DB::getAllImages();

    $videos = DB::getAllVideos();


    $pageTitle = 'Galeria';
	require_once 'partials/head.php';
?>

<?php require_once 'partials/navbar.php'; ?>

              
    <h1 class="center">Galeria</h1>

    <h3 id="pic-title">Fotos</h3>
    <div class="row">
        <?php foreach ($pics as $pic): ?>
        <div class="col-3">
            <div class="card">
                <div class="card-image">
                    <img src=<?php echo $pic["image_path"] ?>>
                    <span class="card-title"><?php echo $pic["m_name"] ?></span>
                </div>
                <div class="card-content">
                    <p><?php echo $pic["m_description"] ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <h3 id="video-title">Videos</h3>
    <div class="row">
        <?php foreach ($videos as $video): ?>
        <div class="col-3">
            <div class="card">
                <div class="card-image">
                    <video id="myVideo" src=<?php echo $video["video_path"] ?> class="card-img" controls></video>
                </div>
                <div class="card-content">
                    <h5 class="card-title"><?php echo $video["v_name"] ?></h5>
                    <p><?php echo $video["v_description"] ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

<?php require_once 'partials/scripts.php'; ?>