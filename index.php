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
    'SELECT posts.id,title,content,creationTimeStamp,firstName, lastName FROM posts
    INNER JOIN authors ON authors.id = posts.author_id'
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





include 'index.phtml';

?>
