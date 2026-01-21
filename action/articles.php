<?php

/**
 * @var $mysqli
 */

$userId = chekUser($mysqli);

$result = $mysqli->query("SELECT * FROM article WHERE userId = '" . $userId . "'");


require_once 'templates/articles.php';