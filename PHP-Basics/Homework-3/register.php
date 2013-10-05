<?php
$title = 'Форма за регистрация';
include_once 'includes/head.php';
	
if($_POST){
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	
	if(preg_match("/^[a-z0-9_-]{4,18}$/", $user)){
		if(preg_match("/^[a-z0-9_-]{4,18}$/", $password)){
			$query = "SELECT user_id FROM users WHERE username = '$username';";
			$res = mysql_query($query) or die(mysql_error());
			$num_rows = mysql_num_rows($res);
			if($num_rows > 0){
				echo "Потребителя съществува";
			}else{
				$query2 = "INSERT INTO users (username, password, registred) VALUES ('$username', '$password', NOW());";
				mysql_query($query2) or die(mysql_error());
				
				header("Location: index.php");
				exit();
			}
		}else{
			echo "Невалидна парола";
		}
	}else{
		echo "Невалидно потребителско име";
	}
	
}

if (!isset($_SESSION['isLogged'])) {
	$_SESSION['isLogged'] = FALSE;
}

if ($_SESSION['isLogged'] === TRUE) {
	header("Location: allMessages.php");
	exit();
}else{
?>
<h1><?= $title; ?></h1>
		<form style="text-align: center;" method="POST">
			<input type="text" name="username" placeholder="потребителско име" value=""/>
			<input type="text" name="password" placeholder="парола" value=""/>
			<input type="submit" name="submit" value="Регистрация"/><br/>
		</form>
	</body>
</html>
<?php
}
?>