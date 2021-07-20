<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=jeuxvideos;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM jeux_video");
$req1->execute();
$categories = $req1->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['login'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jeux video</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <form class="formulaire" action="insertJeuxVideos.php" method="post">
            <p>Nom du jeu:</p><input class="input" type="text" name="nom" value="">
            <p>Nom du possesseur :</p><input class="input" type="text" name="possesseur" value="">
            <p>Nom de la console :</p><input class="input" type="text" name="console" value="">
            <p>Prix :</p><input type="text" class="input" name="prix" value="">
            <p>Nombre de joueur max :</p><input class="input" type="text" name="nbre_joueurs_max" value="">
            <p>Commentaire :</p><textarea name="commentaires" id="coms" cols="30" rows="10"></textarea>
            <input class="btn" type="submit" value="Ajouter un jeu">

        </form>
    </section>
    <section class="listProd">
        <table>
            <thead>
                <th>Nom du jeu</th>
                <th>Nom du possesseur</th>
                <th>Nom de la console</th>
                <th>Prix</th>
                <th>Nombre de joueur max</th>
                <th>Commentaire</th>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $value['nom'] ?></td>
                        <td><?php echo $value['possesseur'] ?></td>
                        <td><?php echo $value['console'] ?></td>
                        <td><?php echo $value['prix'] ?></td>
                        <td><?php echo $value['nbre_joueurs_max'] ?></td>
                        <td><?php echo $value['commentaires'] ?></td>
                        <td><a href="updateJeuxVideo.php?id=<?php echo $value['ID'] ?>">modifier</a></td>
                        <td><a href="deletejv?id=<?php echo $value['ID'] ?>">x</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <section>
        <a href="users.php">BLEUBITE</a>
    </section>
</body>

</html>