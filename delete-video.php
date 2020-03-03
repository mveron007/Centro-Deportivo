<?php
    require_once 'autoload.php';

    $video = DB::getVideoByID($_GET['id']);

    if (isset($_GET['id'])) {
        # code...
        DB::deleteVideo($video['id_video']);

        header("Location:gallery-update.php");
    }

    require_once 'partials/head.php';
?>