<?php
$id = $_GET['id'];
$pdo = new PDO('mysql:host=localhost;dbname=jeuxvideos;port=3306', 'root', '',
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req1 = $pdo->prepare("SELECT * FROM users WHERE id = $id");
$req1->execute();
$form = $req1->fetch();

if ($_POST) {
    if ($_POST) {
    $nonCategorie = htmlspecialchars($_POST['login']);
    $nonpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nonconsole = htmlspecialchars($_POST['email']);

    $req2 = $pdo->prepare("UPDATE `users` 
    SET `login`= :login,`password`= :password,`email`= :email 
    WHERE id = $id");

$req2->execute(array(
    ':login' => $nonCategorie,
    ':password' => $nonpassword,
    ':email' => $nonconsole,
));

header('location:users.php');
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
    <form action="updateus?id=<?php echo $id ?>" method="post">
        <p>Votre pseudonyme :</p><input type="text" name="login" placeholder="login" value="<?php echo $form['login'] ?>">
        <p>Votre mot de pass :</p><input type="password" name="password" placeholder="password" value="<?php echo $form['password'] ?>">
        <p>Votre email :</p><input type="text" name="email" placeholder="email" value="<?php echo $form['email'] ?>">
        <input type="submit" value="Modifier un utilisateur" placeholder="" value="Modifier un utilisateur">
    </form>

</body>
</html>