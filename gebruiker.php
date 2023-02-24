<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Gebruiker - De JostibandVirus</title>
</head>
<body>
</body>
</html>

<?php
    include ('connection.php');

    $result = mysqli_query($connect, "SELECT * FROM ziekmeldingen");
    $currentDate = getdate();

    echo '<div class="main-gebruiker">
        <h1>Zieke Docenten</h1>
        <table>
        <tr class="table-header">
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Afwezig sinds:</th>
        </tr>';

    while($row = mysqli_fetch_array($result))
    {
    if ($row['eindDatum'] == null) {
        echo "<tr>";
        echo "<td>" . $row['voornaam'] . "</td>";
        echo "<td>" . $row['achternaam'] . "</td>";
        echo "<td>" . $row['beginDatum'] . "</td>";
        echo "</tr>";
        }
    }
    echo "</table>";
    echo "</div>";

    mysqli_close($connect);
?>
