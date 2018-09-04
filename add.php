<?php

require_once('bdd_conn.php');



$query = $pdo->prepare(
	"INSERT INTO posts (title, content, creationTimeStamp, author_id, category_id) VALUES( ?,?,NOW(),?,?)"

	);
if(!empty($_POST['title'] and !empty($_POST['area'])  and !empty($_POST['author']) and !empty($_POST['category']) )){

	$query->execute([$_POST['title'], $_POST['area'] , $_POST['author'], $_POST['category']]);

	header('location: admin.php');
	
}
else{


header('location: addPost.php');

}


?>