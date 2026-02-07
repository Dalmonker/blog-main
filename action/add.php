<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];
$user = $data['user'];


if(count($_POST)) {
    var_dump($_FILES['file']['tmp_name']);
    $img = $_FILES['file']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];

    switch($size_img['mime']) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = "jpg";
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = "gif";
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = "png";
            break;
    }

    $wNew = 200;
    $hNew = floor($height / ( $width / $wNew));
    $dest = imagecreatetruecolor($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);

    $filename = $_SERVER['DOCUMENT_ROOT'] . "/images/photo-" . $user['id'] . "-" . time() . '.' . $ext;
    var_dump($filename);
    exit;
    switch($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $filename, 100);
            break;
        case 'image/gif':
            imagegif($dest, $filename);
            break;
        case 'image/png':
            imagepng($dest, $filename);
            break;
    }

    exit;

    $title = strip_tags($_POST['title'] ?? null);
    $content = strip_tags($_POST['content'] ?? null);
    $mysqli->query("INSERT INTO article SET userId = " . $userId . ", title = '" . $title . "', content = '" . $content . "', createdAt = NOW()");
    header("Location: /?act=articles");
    die();
}

require_once 'templates/add.php';