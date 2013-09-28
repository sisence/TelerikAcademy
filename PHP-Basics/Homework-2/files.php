<?php
session_start();
$pageTitle = 'Това са вашите файлове';
include 'includes/header.php';
if ($_SESSION['isLogged'] === TRUE) {
	include 'includes/menu.php';

	$userDir = $_SESSION['userDir'];
	$fileList = scandir($userDir);

	if (count($fileList) == 2) {
		echo "<script>window.alert(\"Няма файлове които да бъдат показани! Следва пренасочване към формата за Upload\");window.location = \"upload.php\";</script>";
		
	}

	echo "<table border=\"1\"><tr>
        <td>Name</td>
        <td>Modify Date</td>
        <td>Size</td>
        <td>Delete</td>
    </tr>";

	for ($i = 2; $i < count($fileList); $i++) {

		$iFileName = $fileList[$i];
		$iFilePath = $userDir . "/" . $iFileName;
		$iFileSize = round(filesize($iFilePath) / 1024, 2);
		$iFileModifyDate = date("D d M Y g:i A", filemtime($iFilePath));

		echo "<tr>
        <td><a href=\"$iFilePath\">$iFileName</a></td>
        <td>$iFileModifyDate</td>
        <td>$iFileSize KB</td>
        <td><a href=\"includes/delete.php?fileForDelete=$iFilePath\">Delete</a></td>
    	</tr>";
	}
	echo "</table>";

} else {
	header("Location: index.php");
	exit();
}
include 'includes/footer.php';
