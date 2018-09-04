<?php

require_once('bdd_conn.php');


$id_update = $_GET['id'];

$query = $pdo->prepare
(
    'SELECT posts.id, title,content,creationTimeStamp,firstName, lastName, name FROM posts
    INNER JOIN authors ON authors.id = posts.author_id inner join categories on posts.id = categories.id WHERE posts.id = ?'
);
					


$query->execute([$id_update]);


$posts = $query->fetchAll(PDO::FETCH_ASSOC);




include ('updatePost.phtml');

exit();

?>

