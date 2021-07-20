
<?php 

$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST) {
 $nonpseudo = htmlspecialchars($_POST['pseudo']);
 $pass = htmlspecialchars($_POST['pass']);


 //  Récupération de l'utilisateur et de son pass hashé
 $req = $pdo->prepare('SELECT id, password FROM users WHERE login = :login');
 $req->execute(array(
     ':login' => $nonpseudo));
 $resultat = $req->fetch();
 
 // Comparaison du pass envoyé via le formulaire avec la base
 $isPasswordCorrect = password_verify($_POST['pass'], $resultat['password']);
 
 if (!$resultat)
 {
     echo 'Mauvais identifiant ou mot de passe !';
 }
 else
 {
     if ($isPasswordCorrect) {
         session_start();
         $_SESSION['id'] = $resultat['id'];
         $_SESSION['pseudo'] = $nonpseudo;
         echo 'Vous êtes connecté !';
     }
     else {
         echo 'Mauvais identifiant ou mot de passe !';
     }
 }

}