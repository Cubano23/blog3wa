<?php 

require_once('bdd_conn.php');

$query = $pdo->prepare('SELECT id, firstName, lastName from authors');

$query->execute();
$authors = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $pdo->prepare('SELECT id, name from categories');

$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>Add - Post</title>
</head>
<?php include ('header.phtml'); ?>
<body>
	<main>
		<p class="p-title-add-post"><i class="fas fa-pencil-alt"></i></i>Rédiger un nouvel article</p>

		<section>

			<form action="add.php" method="POST" class="form-add-post">
				<fieldset>
					<legend><i class="fas fa-newspaper"></i>Nouvel article</legend>
					<label>Titre:</label>
					<input type="text" name="title" class="txt-title">
					<div class="clear"></div>
					<label>Article:</label>
					<textarea name="area" rows="10" cols="80%" class="txt-add-area"></textarea>
					<div class="clear"></div>
					<label>Auteur:</label>

					<select name="author" >
						<option></option>
					<?php foreach ($authors as $author):?>
						<option value="<?= $author['id'] ?>"><?= $author['firstName']. " " .$author['lastName']?></option>
					<?php endforeach ?>	

					</select>
					<label>Catégorie:</label>

					<select name="category" >
						<option></option>				
						<?php foreach ($categories as $Categorie):?>
						<option value="<?= $Categorie['id'] ?>"><?= $Categorie['name']?></option>
					<?php endforeach ?>	
					</select><br>
					<input type="submit" name="submit" value="Enregistrer" class="submit">
					<input type="reset" name="reset" value="Anuler" class="reset">
				</fieldset>
			</form>
		</section>
	</main>
	<?php  include('footer.phtml'); ?>
</body>
</html>