<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$pageTitle = 'Вход в системата';
$user = array("username" => "user", "password" => "qwerty");

if ($_SESSION['isLogged'] === TRUE) {
	header("Location: files.php");
	exit();
} else {
	if ($_POST) {

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if ($user['username'] == $username && $user['password'] == $password) {
			$_SESSION['isLogged'] = TRUE;
			header("Location: files.php");
			exit();
		} else {
			echo "<script>window.alert(\"Грешно потребителско име и/или парола!\");</script>";
		}

	}
}

include 'includes/header.php';
?>
<form method="post">
	<input type="text" name="username" placeholder="user" value=""/>
	<input type="password" name="password" placeholder="qwerty" value=""/>
	<input type="submit" name="submit" value="Вход в системата"/>
</form>
<?php
include 'includes/footer.php';
