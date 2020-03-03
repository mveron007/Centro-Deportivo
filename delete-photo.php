<?php
    require_once 'autoload.php';

    $pic = DB::getImageByID($_GET['id']);

    if (isset($_GET['id'])) {
        DB::deleteImage($pic['id_image']);

        header("Location:gallery-update.php");
    }

    require_once 'partials/head.php';
?>