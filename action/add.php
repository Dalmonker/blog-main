<?php

/**
 * @var $mysqli
 */

if(empty($_SESSION['userId'])) {
    header("Location: /?act=login");
    die();
}

$id = $_SESSION['userId'];

$result = $mysqli->query("SELECT * FROM user WHERE id = '" . $id . "' LIMIT 1");
$user = $result->fetch_assoc();
if (!$user) {
    header("Location: /?act=login");
    die();
}

if(count($_POST)) {
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $mysqli->query("INSERT INTO article SET userId = " . $id . ", title = '" . $title . "', content = '" . $content . "', createdAt = NOW()");
    header("Location: /?act=articles");
    die();
}

require_once 'templates/add.php';