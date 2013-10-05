<?php
$title = 'Преглед на съобщенията';
include_once 'includes/head.php';

if (!isset($_SESSION['isLogged'])) {
	$_SESSION['isLogged'] = FALSE;
}

if ($_SESSION['isLogged'] === TRUE) {
	include 'includes/menu.php';
	
	$query = "SELECT * FROM messages ORDER BY posted DESC;";
	$res = mysql_query($query) or die(mysql_error());
	$num_rows = mysql_num_rows($res);
	if($num_rows == 0){
		echo "Няма съобщения за показване.";
	}else{
		while($row = mysql_fetch_assoc($res)){
			if($_SESSION['user_type'] == 2){
				echo "<a href=\"includes/delete.php?id=$row[message_id]\">изтрий</a>";
			}
			echo "ID: $row[message_id] "."TITLE: $row[title] "."CONTENT: $row[content] "."DATE: $row[posted] "."FROM: $row[from] <br/>";
			echo "--------------------------------------------------------------------------- <br/>";
		}
	}
	
?>
</body>
</html>
<?php
}else{
	header("Location: index.php");
	exit();
}
?>