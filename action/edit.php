<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];

// article

$id = $_GET['id'] ?? null;
if(!$id) {
    header("Location: /?act=articles");
    die();
}

if(count($_POST)) {
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $mysqli->query("UPDATE article SET userId = " . $userId . ", title = '" . $title . "', content = '" . $content . "' WHERE id = '" . $id . "' AND userId = " . $userId);    header("Location: /?act=articles");
    die();
}

$result = $mysqli->query("SELECT * FROM article WHERE id = '" . $id . "' AND userId = " . $userId . " LIMIT 1");
$article = $result->fetch_assoc();
if(!$article) {
    header("Location: /?act=articles");
    die();
}



require_once 'templates/edit.php';