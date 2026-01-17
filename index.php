<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_GET['act'])) {   // isset -проверяет существует ли перемменная. GET - получает данные из url.
                                //  В этой строке кода говорится, что если существует в url параметр act, то неохдимо пройтись свичем
                                //  и найти элементы. Если register в параметре act, то нужно импортировать файл register.php и выйти.
    switch ($_GET['act']) {
        case 'register':
            require_once 'action/register.php';
            break;
    }
    die;
}

require_once 'templates/index.php';