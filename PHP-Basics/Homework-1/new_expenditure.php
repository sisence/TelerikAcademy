<?php
$pageTitle='Добавяне на нов разход';
include 'includes/header.php';
if(file_exists('data.txt')){
	
	if($_POST){
		$date = date('d-m-Y');
		$description = trim($_POST['description']);
		$price = (float) $_POST['price'];
		$type = $_POST['type'];
		
		$result=$date.'!'.$description.'!'.$price.'!'.$type."\n";		
        if(file_put_contents('data.txt', $result,FILE_APPEND))
        {
            ?><script> window.alert("Записът е успешен!"); </script><?php
        }
	}
	
	?>
	<a href="index.php">Назад към списъка с разходи</a>
	<form method="POST" action="new_expenditure.php">
		<input type="text" name="description" value="" placeholder="Описание" /><br/>
		<input type="text" name="price" value="" placeholder="Цена" /><br/>
		<label for="type">Тип на разхода:</label>
		<select id="type" name="type">
			<?php foreach ($types as $key => $value): ?>
				<option value="<?= $key; ?>"><?= $value; ?></option>
			<?php endforeach ?>
		</select><br/>
		<input type="submit" name="submit" value="Добави"/>
	</form>
	<?php
}else{
?>

<script> window.alert("Няма връзка с базата данни"); </script>

<?php
}
include 'includes/footer.php';
