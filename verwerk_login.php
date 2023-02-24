<?php
include ('connection.php');

$username = filter_input(INPUT_POST,'gebruikersnaam', FILTER_SANITIZE_STRING);
$password = $_POST['wachtwoord'];
$query = $db->prepare('SELECT * FROM gebruikers WHERE gebruikersnaam = :user');
$query->bindParam('user', $username);
$query->execute();

if ($query->rowCount() == 1) {​

    $result = $query->fetch(mysqli_connect::FETCH_ASSOC);​

    if(password_verify($password, $result['wachtwoord']))
    {
        header('location: gebruiker.php');
    }
    else {
      echo 'Onjuiste gegevens';​
    }​
}
    catch (mysqli_connect_Exception $e) {​
    die('Error!: ' . $e->getmessage());
    }​
?>