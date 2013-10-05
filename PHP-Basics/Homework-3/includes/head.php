<?php
require_once 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
is_install();
session_start();
include_once 'includes/db_connect.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?= $title; ?></title>
	</head>
	<body>