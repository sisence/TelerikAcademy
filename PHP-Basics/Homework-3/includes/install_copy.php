<!DOCTYPE HTML>
<html>
	<head>
		<title>Install Wizard</title>
	</head>
	<body>
		<?php
		
		function createDBWithSQL($host, $user, $password, $database){
			mysql_connect($host, $user, $password) or die(mysql_error());
			$query="CREATE DATABASE IF NOT EXISTS $database";
			mysql_query($query) or die(mysql_error());
			
			$query2 = "CREATE  TABLE IF NOT EXISTS `$database`.`users` (`user_id` INT NOT NULL AUTO_INCREMENT,`user_type` INT NOT NULL DEFAULT 1,`username` VARCHAR(45) NULL ,`password` VARCHAR(45) NULL ,`registred` DATETIME NULL , PRIMARY KEY (`user_id`) ) ENGINE = MyISAM;";
			mysql_query($query2) or die(mysql_error());
			
			$query3 = "CREATE  TABLE IF NOT EXISTS `$database`.`messages` (`message_id` INT NOT NULL AUTO_INCREMENT, `from` VARCHAR(45) NULL, `title` VARCHAR(45) NULL , `content` VARCHAR(45) NULL , `posted` DATETIME NULL , PRIMARY KEY (`message_id`) )ENGINE = MyISAM;";
			mysql_query($query3) or die(mysql_error());
			
			$query4 = "INSERT INTO `$database`.`users` (user_id, user_type, username, password, registred) VALUES(1, 2, 'user', 'qwerty',NOW());";
			mysql_query($query4) or die(mysql_error());
		}

		function createDBConnectFile($host, $user, $password, $database) {
			$dbSerrings = <<<EOF
<?php

\$host = '$host';
\$user = '$user';
\$password = '$password';
\$db_name = '$database';
	
mysql_connect(\$host, \$user, \$password) or die(mysql_error());
mysql_select_db(\$db_name);
mysql_query('SET NAMES utf8');
	
EOF;
			$dbFileName = "db_connect.php";
			$dbFileHandle = fopen($dbFileName, 'w') or die("Не мога да отворя файла");
			fwrite($dbFileHandle, $dbSerrings);
			fclose($dbFileHandle);
		}

		function formValidation($host, $user, $password, $database) {

			if (preg_match("/^(([a-zA-Z0-9]|[a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9])\.)*([A-Za-z0-9]|[A-Za-z0-9][A-Za-z0-9\-]*[A-Za-z0-9])$/", $host)) {
				if (preg_match("/^[a-z0-9_-]{3,18}$/", $user)) {
					if (preg_match("/^[a-z0-9_-]{3,18}$/", $password)) {
						if (preg_match("/^[a-z0-9_-]{3,18}$/", $database)) {
							return TRUE;
						}
					} else {
						echo "Невалиден password";
					}

				} else {
					echo "Невалиден user";
				}
			} else {
				echo "Невалиден host";
			}

			return FALSE;
		}

		if ($_POST) {
			$host = trim($_POST['host']);
			$user = trim($_POST['user']);
			$password = trim($_POST['password']);
			$database = trim($_POST['database']);

			if (formValidation($host, $user, $password, $database)) {				
				createDBWithSQL($host, $user, $password, $database);
				createDBConnectFile($host, $user, $password, $database);
				header('Location: ../index.php');
			}
		}
		?>
		<h1>Форма за инсталация</h1>
		<form style="text-align: center;" method="POST">
			<input type="text" name="host" placeholder="host" value="localhost"/>
			<br/>
			<input type="text" name="user" placeholder="user" value=""/>
			<br/>
			<input type="text" name="password" placeholder="password" value=""/>
			<br/>
			<input type="text" name="database" placeholder="database name" value=""/>
			<br/>
			<input type="submit" name="submit" value="Създай базата данни"/>
		</form>
	</body>
</html>