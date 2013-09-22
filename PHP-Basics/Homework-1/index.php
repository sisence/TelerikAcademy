<?php
$pageTitle='Списък с всички разходи';
include 'includes/header.php';
if(file_exists('data.txt')){
	
	$sum = 0; 
	
	?>
	<a href="new_expenditure.php">Добави нов разход</a>
	<form method="POST" action="index.php">
		<select name="filter">
			<option value="0">Всички</option>
			<?php foreach ($types as $key => $value): ?>
				<option value="<?= $key; ?>"><?= $value; ?></option>
			<?php endforeach ?>
		</select>
		<input type="submit" name="submit" value="Покажи" />
	</form>
	<table border="1">
    <tr>
        <td>Дата</td>
        <td>Описание</td>
        <td>Сума</td>
        <td>Вид</td>
    </tr>
	<?php
	$result = file('data.txt');
	foreach ($result as $value) {
		$columns = explode('!', $value);
		if ($_POST && $_POST['filter'] != 0) {
			if ($_POST['filter'] == trim($columns[3])) {
				$sum = $sum + $columns[2];
				echo '<tr>
                <td>' . $columns[0] . '</td>
                <td>' . $columns[1] . '</td>
                <td>' . $columns[2] . '</td>
                <td>' . $types[trim($columns[3])] . '</td>
                </tr>';
			}

		} else {
			$sum = $sum + $columns[2];
			echo '<tr>
                <td>' . $columns[0] . '</td>
                <td>' . $columns[1] . '</td>
                <td>' . $columns[2] . '</td>
                <td>' . $types[trim($columns[3])] . '</td>
                </tr>';
		}
	}
	echo '<tr>
                <td>Общо</td>
                <td>---</td>
                <td>' . $sum . '</td>
                <td>---</td>
                </tr>';

	}else{
?>
</table>
<script>window.alert("Няма връзка с базата данни");</script>

<?php
}
include 'includes/footer.php';
