<?php

require_once('bdd_conn.php');

/*
 * Préparation de la requête SQL, PDO renvoie un objet de la classe PDOStatement
 * http://www.php.net/manual/fr/class.pdostatement.php
 *
 * On peut dire que cet objet représente la requête SQL, on appelle donc la
 * variable $query.
 */
$query = $pdo->prepare
(
    'SELECT posts.id,title,content,creationTimeStamp,firstName, lastName, name FROM posts
    INNER JOIN authors ON authors.id = posts.author_id INNER JOIN categories on posts.category_id = categories.id'
    
);
					

// Demande à PDO d'envoyer la requête à MySQL pour exécution.
$query->execute();


/*
 * Récupération de toutes les données renvoyées par MySQL.
 *
 * La méthode fetchAll() renvoie un tableau à deux dimensions :
 * - la première dimension représente les différentes lignes de données
 * - la deuxième dimension représente les colonnes SQL de chaque ligne de données

 */
$posts = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		<meta charset="utf-8">
		<title>Administration</title>
	</head>
<?php include ('header.phtml'); ?>
<body>
	<main>
		<h1><i class="fas fa-cogs"></i>Panneau d'administration</h1>

		<div>
			<p><a href="addPost.php"><i class="fas fa-pencil-alt"></i>Rédiger un nouvel article</a></p>
			<h2>Liste des articles </h2>
		</div>
		 <section>   
            <table>
            	<thead>
            		<tr>
            			<th>Titre</th>
            			<th>Article</th>
            			<th>Auteur</th>
            			<th>Catégorie</th>
            			
            		</tr>
            	</thead>
            <?php foreach($posts as $post): ?>            
               <tr>
               		<td>
                <small><?= $post['title'] ?></small><br>
                	</td>
                		<td>
                <small><?= substr($post['content'],0,20) ?></i></small><br>
                	</td>
                		<td>
                <small><?= $post['firstName'] ." ".$post['lastName'] ?></small><br>
                	</td>
                	 		<td>
                <small class="small-right"><?= $post['name'] ?><a href="updatePost.php?id=<?= $post['id'] ?>"><i class="fas fa-pencil-alt"></i></a><a href="delete.php?id=<?= $post['id'] ?>"><i class="fas fa-times"></i></a></small><br>
                	</td>
                </tr>
                
               
            

               
                
            <?php endforeach ?>
            </table>
        </section>      

	</main>
	<?php  include('footer.phtml'); ?>
</body>
</html>