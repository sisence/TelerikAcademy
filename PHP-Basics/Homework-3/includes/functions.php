<?php

function delete($id){
	$query = "DELETE FROM messages WHERE message_id = $id;";
	$res = mysql_query($query) or die(mysql_error());
}

function is_install() {
	if (file_exists("includes/install.php") && !file_exists("includes/db_connect.php")) {
		header("Location: includes/install.php");
	}

	if (file_exists("includes/install.php") && file_exists("includes/db_connect.php")) {
		unlink("includes/install.php");
		header("Location: index.php");
	}

	if (!file_exists("includes/install.php") && !file_exists("includes/db_connect.php")) {
		if (!file_exists("includes/install_copy.php")) {
			echo "Приложението е повредено!";
		} else {
			if (!copy("includes/install_copy.php", "includes/install.php")) {
				echo "Опита за поправка на приложението се провали. Натиснете F5 за нов опит";
			}
		}
		exit();
	}
}
