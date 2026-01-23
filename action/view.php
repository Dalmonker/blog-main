<?php
/**
 * @var $mysqli
 */

$id = (int)$_GET['id'];
$result = $mysqli->query("SELECT * FROM article WHERE id = " . $id);

require_once 'templates/view.php';