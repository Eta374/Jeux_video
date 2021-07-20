<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM jeux_video WHERE id = $id");
$req1->execute();
$form = $req1->fetch();

if ($_POST) {
    if ($_POST) {
    $nonCategorie = htmlspecialchars($_POST['nom']);
    $nonpossesseur = htmlspecialchars($_POST['possesseur']);
    $nonconsole = htmlspecialchars($_POST['console']);
    $nonprix = htmlspecialchars($_POST['prix']);
    $nonnbre_joueurs_max = htmlspecialchars($_POST['nbre_joueurs_max']);
    $noncommentaires = htmlspecialchars($_POST['commentaires']);

    $req2 = $pdo->prepare("UPDATE `jeux_video` 
    SET `nom`= :nom,`possesseur`= :possesseur,`console`= :console,`prix`= :prix,`nbre_joueurs_max`= :nbre_joueurs_max,`commentaires`= :commentaires 
    WHERE id = $id");

$req2->execute(array(
    ':nom' => $nonCategorie,
    ':possesseur' => $nonpossesseur,
    ':console' => $nonconsole,
    ':prix' => $nonprix,
    ':nbre_joueurs_max' => $nonnbre_joueurs_max,
    ':commentaires' => $noncommentaires
));

header('location:index.php');
}}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="updateJeuxVideo?id=<?php echo $id ?>" method="post">
        <p>Nom du jeu:</p><input type="text" name="nom" placeholder="nom" value="<?php echo $form['nom'] ?>">
        <p>Nom du possesseur :</p><input type="text" name="possesseur" placeholder="possesseur" value="<?php echo $form['possesseur'] ?>">
        <p>Nom de la console :</p><input type="text" name="console" placeholder="console" value="<?php echo $form['console'] ?>">
        <p>Prix :</p><input type="text" name="prix" placeholder="prix" value="<?php echo $form['prix'] ?>">
        <p>Nombre de joueur max :</p><input type="text" name="nbre_joueurs_max" placeholder="nbre_joueurs_max" value="<?php echo $form['nbre_joueurs_max'] ?>">
        <p>Commentaire :</p><input type="text" name="commentaires" placeholder="commentaires" value="<?php echo $form['commentaires'] ?>">
        <input type="submit" value="Modifier un jeu" placeholder="" value="Modifier un jeu">
    </form>

</body>
</html>