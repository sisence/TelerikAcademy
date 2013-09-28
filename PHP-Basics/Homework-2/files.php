<?php
session_start();
if ($_SESSION['isLogged'] === TRUE) {

} else {
	header("Location: index.php");
	exit();
}
