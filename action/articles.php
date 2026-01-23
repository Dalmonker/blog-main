<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];

$result = $mysqli->query("SELECT * FROM article WHERE userId = '" . $userId . "' ORDER BY id DESC");


require_once 'templates/articles.php';