<?php
$title = 'Ново съобщение';
include_once 'includes/head.php';

if($_POST){
	$title = trim($_POST['title']);
	$content = trim($_POST['content']);
	$from = $_SESSION['username'];
	
	if(strlen($title)>1 && strlen($content)>1){
		$query = "INSERT INTO `messages` (`from`, `title`, `content`, `posted`) VALUES ('$from', '$title', '$content', NOW());";
		mysql_query($query) or die(mysql_error());
		header("Location: allMessages.php");
		exit();
	}
}

if (!isset($_SESSION['isLogged'])) {
	$_SESSION['isLogged'] = FALSE;
}

if ($_SESSION['isLogged'] === TRUE) {
	include 'includes/menu.php';
?>
<form style="text-align: center;" method="POST">
	<input type="text" name="title" placeholder="Заглавие" value="" />
	<br/>
	<textarea name="content" rows="10"></textarea>
<br/>	<input type="submit" name="submit" value="Запиши" />
</form>
</body>
</html>
<?php
}else{
	header("Location: index.php");
	exit();
}
?>