<?php
$title = 'Изтриване на постове';
require_once 'functions.php';
include_once 'db_connect.php';

delete($_GET['id']);
header("Location: ../allMessages.php");