<?php 
/*
 * Construction d'un objet PDO représentant la connexion à la base de données.
 *
 * Le premier argument est un Data Source Name (DSN) représentant où est-ce qu'il
 * faut se connecter. Une adresse IP ou un nom de domaine peut être spécifié.
 *
 * /!\ Tout le DSN doit être écrit en minuscules et sans espaces.
 *
 */
$pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

// Paramétrage de la liaison PHP <-> MySQL, les données sont encodées en UTF-8.
$pdo->exec('SET NAMES UTF8');

?>