<?php
 $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306','root','',
 array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
 if ($_POST) {
 $nonCategorie = htmlspecialchars($_POST['nom']);
 $nonpossesseur = htmlspecialchars($_POST['possesseur']);
 $nonconsole = htmlspecialchars($_POST['console']);
 $nonprix = htmlspecialchars($_POST['prix']);
 $nonnbre_joueurs_max = htmlspecialchars($_POST['nbre_joueurs_max']);
 $noncommentaires = htmlspecialchars($_POST['commentaires']);
 if (($nonCategorie != "") && ($nonpossesseur != "") && ($nonconsole != "") && ($nonprix != "") && ($nonnbre_joueurs_max != "") && ($noncommentaires != "")) {
 $req1 = $pdo->prepare("
 INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
 VALUES (:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)");


 $req1->execute(array(
 ':nom' => $nonCategorie,
 ':possesseur' => $nonpossesseur,
 ':console' => $nonconsole,
 ':prix' => $nonprix,
 ':nbre_joueurs_max' => $nonnbre_joueurs_max,
 ':commentaires' => $noncommentaires
));
 }
 }
 header('location:index.php');
?>