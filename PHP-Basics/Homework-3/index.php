<?php
$title = 'Начало';
include_once 'includes/head.php';

if($_POST){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	$query = "SELECT user_id, user_type FROM users WHERE username = '$username' AND password = '$password';";
	$res = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($res);
	$user_type =  mysql_fetch_row($res);
	
	if($num_rows == 1){
		$_SESSION['isLogged'] = TRUE;
		$_SESSION['username'] = $username;
		$_SESSION['user_type'] = $user_type[1];
	}
}

if (!isset($_SESSION['isLogged'])) {
	$_SESSION['isLogged'] = FALSE;
}

if ($_SESSION['isLogged'] === TRUE) {
	header("Location: allMessages.php");
}else{
?>

		<h1><?= $title; ?></h1>
		<form style="text-align: center;" method="POST">
			<input type="text" name="username" placeholder="user" value=""/>
			<input type="text" name="password" placeholder="qwerty" value=""/>
			<input type="submit" name="submit" value="Вход"/><br/>
			<a href="register.php">Регистрирай се</a><br/>
		</form>
	</body>
</html>
<?php
}
?>