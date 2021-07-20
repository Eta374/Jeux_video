<?php
$pdo = new PDO(
    'mysql:host=localhost;dbname=jeuxvideos;port=3306',
    'root',
    '',
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$req1 = $pdo->prepare("SELECT * FROM users");
$req1->execute();
$categories = $req1->fetchAll(PDO::FETCH_ASSOC);

 
if (isset($_SESSION['id']) AND isset($_SESSION['login']))
{
    echo 'Bonjour ' . $_SESSION['pseudo'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
        <form action="insertusers.php" method="post">
            <p>Votre pseudonyme :</p><input type="text" name="login" value="">
            <p>Votre mot de passe :</p><input type="password" name="password" value="">
            <p>Votre mail :</p><input type="text" name="email" value="">
            <input class="btn" type="submit" value="Ajouter un Utilisateur">

        </form>
    </section>
    <section class="listusers">
        <table>
            <thead>
                <th>Nom de l'utilisateur</th>
                <th>Mot de passe de l'utilisateur</th>
                <th>Adresse email de l'utilisateur</th>
                <th>Date d'inscription</th>
            </thead>
            <tbody>
                <?php
                foreach ($categories as $key => $value) {
                ?>
                    <tr>
                        <td><?php echo $value['login'] ?></td>
                        <td><?php echo $value['password'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['dateinscription'] ?></td>
                        <td><a href="updateus.php?id=<?php echo $value['id'] ?>">modifier</a></td>
                        <td><a href="deleteus?id=<?php echo $value['id'] ?>">x</a></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
</body>
</html>