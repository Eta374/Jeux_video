<?php
//Création de la base de données
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$sql = "CREATE DATABASE IF NOT EXISTS `jeuxvideos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
$pdo->exec($sql);
try{
    $pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306','root','',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //Création de la table categories
    $req1 = "CREATE TABLE IF NOT EXISTS `jeuxvideos`.`jeux_video`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `nom` VARCHAR(100),
    `possesseur` VARCHAR(100) NOT NULL ,
    `console` VARCHAR(100) NOT NULL ,
    `prix` FLOAT NOT NULL ,
    `nbre_joueurs_max` INT(100) NOT NULL ,
    `commentaires` TEXT(500) NOT NULL ,
    PRIMARY KEY(id));";
    $pdo->exec($req1);

    $req2 = "CREATE TABLE IF NOT EXISTS `jeuxvideos`.`users` (
        `id` INT NOT NULL AUTO_INCREMENT ,
        `login` VARCHAR(100) NOT NULL ,
        `password` VARCHAR(100) NOT NULL ,
        `email` VARCHAR(100) NOT NULL ,
        `dateinscription` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
        PRIMARY KEY (`id`));";
        $pdo->exec($req2);
    echo 'Félicitations, les tables ont bien été créées !';
   
}
catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
   