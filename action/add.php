<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];

if(count($_POST)) {
    $title = strip_tags($_POST['title'] ?? null);
    $content = strip_tags($_POST['content'] ?? null);
    $mysqli->query("INSERT INTO article SET userId = " . $userId . ", title = '" . $title . "', content = '" . $content . "', createdAt = NOW()");
    header("Location: /?act=articles");
    die();
}

require_once 'templates/add.php';