<?php
session_start();
$pageTitle = 'Форма за качване на файлове';
include 'includes/header.php';
if ($_SESSION['isLogged'] === TRUE) {
	include 'includes/menu.php';
	
	if($_POST){
		if(file_exists($_SESSION['userDir'] . "/" . $_FILES["file"]["name"])){
			echo "<script>window.alert(\"Файлът вече е качен в системата, продължете с друг файл.\");window.location = \"upload.php\";</script>";
		}else{
			move_uploaded_file($_FILES["file"]["tmp_name"],	$_SESSION['userDir'] . "/" . $_FILES["file"]["name"]);
			echo "<script>window.alert(\"Файлът е качен успешно, продължете с друг файл.\");window.location = \"upload.php\";</script>";
		}
	}
	
	?>
	<form method="POST" enctype= "multipart/form-data">
		<input type="file" name="file" id="file" />
		<input type="submit" name="submit" value="Качи файла">
	</form>
	<?php

} else {
	header("Location: index.php");
	exit();
}
include 'includes/footer.php';
