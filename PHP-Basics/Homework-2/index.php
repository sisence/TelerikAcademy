<?php
session_start();
$pageTitle = 'Вход в системата';

function loginCheck($username, $password) {

	$users[0]['username'] = 'user';
	$users[0]['password'] = 'qwerty';
	$users[0]['userDir'] = 'files' . DIRECTORY_SEPARATOR . 'user-1';

	$users[1]['username'] = 'user2';
	$users[1]['password'] = 'pass2';
	$users[1]['userDir'] = 'files' . DIRECTORY_SEPARATOR . 'user-2';

	$users[2]['username'] = 'user3';
	$users[2]['password'] = 'pass3';
	$users[2]['userDir'] = 'files' . DIRECTORY_SEPARATOR . 'user-3';

	for ($i = 0; $i < count($users); $i++) {
		if (in_array($username, $users[$i]) && in_array($password, $users[$i])) {
			$_SESSION['userDir'] = $users[$i]['userDir'];
			return TRUE;
		}
	}
}

if (!isset($_SESSION['isLogged'])) {
	$_SESSION['isLogged'] = FALSE;
}

if ($_SESSION['isLogged'] === TRUE) {
	header("Location: files.php");
	exit();
} else {
	if ($_POST) {

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if (loginCheck($username, $password) === TRUE) {
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
include 'includes' . DIRECTORY_SEPARATOR . 'footer.php';
