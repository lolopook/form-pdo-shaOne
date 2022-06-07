<?php 

try {
    $bdd = new PDO("mysql:host=localhost:3306;dbname=fessebook;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
var_dump($_POST);

$lastname = htmlspecialchars($_POST["lastname"]);
$firstname = htmlspecialchars($_POST["firstname"]);
$mail = htmlspecialchars($_POST["mail"]);
$password = sha1(($_POST["password"]));
$birthday = htmlspecialchars($_POST["birthdate"]);
$img = htmlspecialchars($_POST["img"]);
var_dump($password);
        $req = $bdd->prepare("INSERT INTO user ( lastname, firstname, mail, password, birthdate, img) VALUES (?, ?, ?, ?, ?, ?)");
        $req->execute(
            array(
                $lastname,
                $firstname,
                $mail,
                $password,
                $birthday,
                $img,
            )
            );

        // header("Location: /index.html");
        var_dump($password);

?>