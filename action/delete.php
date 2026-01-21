<?php

/**
 * @var $mysqli
 */

$userId = chekUser($mysqli);

// article

$id = $_GET['id'] ?? null;
if(!$id) {
    header("Location: /?act=articles");
    die();
}

$mysqli->query("DELETE FROM article WHERE id = " . $id . " AND userId = " . $userId);
header("Location: /?act=articles");