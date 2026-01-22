<?php

/**
 * @var $mysqli
 */

$data = chekUser($mysqli);
$userId = $data['userId'];

$result = $mysqli->query("SELECT * FROM article WHERE userId = '" . $userId . "'");


require_once 'templates/articles.php';