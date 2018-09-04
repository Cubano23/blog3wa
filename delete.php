<?php

require_once('bdd_conn.php');


$id_delete = $_GET['id'];

$title = $_POST['title'];
$content = $_POST['area'];

$query = $pdo->prepare
(
	'DELETE FROM posts
	WHERE id = ? '
    
);
					


$query->execute([$id_delete]);





header('location: admin.php');



?>