<?php

require_once('bdd_conn.php');

$id_comment = $_GET['id'];

$query = $pdo->prepare(
	"INSERT INTO comments (nickName, comment, creationTime, post_id) VALUES( ?,?,NOW(),?)"

	);
if(!empty($_POST['pseudo'] and !empty($_POST['comment']))){

	$query->execute([$_POST['pseudo'], $_POST['comment'] , $id_comment]);

	header('location: detail.phtml');

	
	
}
else{

header('location: detail.phtml');

}


?>