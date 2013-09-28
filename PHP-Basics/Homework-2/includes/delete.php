<?php
session_start();
$pageTitle = 'Изтрии файл';
include 'header.php';
if ($_SESSION['isLogged'] === TRUE) {
	if ($_GET) {
		if (!empty($_GET['fileForDelete'])) {
			$fileForDelete = "../".$_GET['fileForDelete'];
			unlink($fileForDelete);
			header("Location: ../files.php");
			exit();
		}
	}
} else {
	header("Location: index.php");
	exit();
}
include 'footer.php';
