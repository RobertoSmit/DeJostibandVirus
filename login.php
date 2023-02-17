<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in - JostibandVirus</title>
    <link rel="stylesheet" href="css/stylesheet.css">

</head>
<body>

    <div class="main-login">
    
    <h1> Log in </h1>

    <form method="post">

    <input type="text" name="gebruikersnaam" id="username" placeholder="Gebruikersnaam"><br>
    <input type="password" name="wachtwoord" id="password" placeholder="Wachtwoord"><br>
    <input type="submit" name="login" id="submit" value='Log in'><br>     
    </div>
    
    </form>  
</body>
</html>

<?php
include ('connection.php');

$username = "fkayyal";
$wachtwoord = "fkayyal123";

$username = "roberto";
$wachtwoord = "roberto123";

if (isset($_POST['login'])) {

    $getUserName = $_POST['gebruikersnaam'];
    $getPassword = $_POST['wachtwoord'];

    if($username === $getUserName && $wachtwoord === $getPassword) {
        header("location: gebruiker.php");
    }else {
        header("location: login.php");
    }

}

?>