<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./syle.css">

</head>
</head>
<body>


<?php

var_dump($_POST);

try {
    $bdd = new PDO("mysql:host=localhost:3306;dbname=fessebook;charset=utf8", "root", "root");
} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}


$mail = htmlspecialchars($_POST["mail"]);
$password = htmlspecialchars(sha1($_POST["password"]));
var_dump($password);
if ((($_POST["password"]) == "") || (($_POST["mail"]) == "")) {
    echo("Vous allez être redirigé...<br>" . 
        '<h2 class="text-danger">Mauvais mots de passe et/ou mail</h2>');

    header("Refresh:3; url=index.html");
    
} else { 

    $req = $bdd->prepare("SELECT * FROM user WHERE mail = ? AND password = ? LIMIT 1");
    $req->execute(
        array(
            $mail,
            $password,
        )
    );


    while ($data = $req->fetch())
    {
        // var_dump($data);
        echo'<div class="card m-8" style="width: 20rem;">
                <h5>Bonjour</5>
                <img class="card-img-top" src=" '. $data["img"] .' " alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">' . " Prénom : " . $data["firstname"] . '</h5>
                    <h5 class="card-title">' . " Prénom : " . $data["lastname"] . '</h5>
                    <h5 class="card-title">' ." Mail : " . $data["mail"] . '</h5>
                    <h5 class="card-title">' . " Mots de passe : " . $data["password"] . '</h5>
                    <h5 class="card-title"> ' . "Anniverssaire : " . $data["birthdate"] .' </h5>
                </div>
            </div>';
    }
};

?>



</body>
</html>