<?php

$id = $_GET['id'];
 try{
 $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '');
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "DELETE FROM jeux_video WHERE id = $id";
 $sth = $pdo->prepare($sql);
 $sth->execute();
 }
 catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
 }

 header('location:index.php');
