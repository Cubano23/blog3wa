<?php

require_once('bdd_conn.php');


$detail = $_GET['id'];

$query = $pdo->prepare
(
    'SELECT posts.id, title,content,creationTimeStamp,firstName, lastName FROM posts
    INNER JOIN authors ON authors.id = posts.author_id  WHERE posts.id = ?'
);
					


$query->execute([$detail]);


$posts = $query->fetchAll(PDO::FETCH_ASSOC);








//select commentaire

$id_comment = $_GET['id'];

$query = $pdo->prepare
(
    'SELECT posts.id, nickName, comment, creationTime from comments
    INNER join posts on posts.id = comments.post_id where posts.id = ?'

);

$query->execute([$id_comment]);
$comments = $query->fetchAll(PDO::FETCH_ASSOC);






include 'detail.phtml';



?>