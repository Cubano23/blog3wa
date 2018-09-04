<?php

require_once('bdd_conn.php');


$id_update = $_GET['id'];
$title = $_POST['title'];
$content = $_POST['content'];



$query = $pdo->prepare
(

	"UPDATE posts
	 SET title = ?, content = ?
	 WHERE id = ?"
    
);
					


$query->execute([$title, $content, $id_update]);

var_dump($query);





header('location: admin.php');



?>