<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/stylesheet.css">
        <title>Beheer</title>
    </head>
    <body>
        <div style="display: grid; grid-template-columns: 70% 30%;">
            <div>
                <?php
                    include ('connection.php');

                    $result = mysqli_query($connect, "SELECT * FROM docenten");
                    $currentDate = getdate();

                    echo '<div class="main-gebruiker">
                        <h1>Docenten</h1>
                        <table>
                        <tr class="table-header">
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        </tr>';

                    while($row = mysqli_fetch_array($result))
                    {
                        echo "<tr>";
                        echo "<td>" . $row['voornaam'] . "</td>";
                        echo "<td>" . $row['achternaam'] . "</td>";
                        echo "</tr>";
                    }
                
                    echo "</table>";
                    echo "</div>";

                    mysqli_close($connect);
                ?>

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
            </div>
            <div id="options">
                <h1>ziek/better melden</h1>
                <div>Docent</div><br>
                <input type="text" placeholder="name"><br>
                <div>Begin datum</div><br>
                <input type="date" value="" name="beginDatum"><br>
                <div>Eind datum</div><br>
                <input type="date" value="" name="eindDatum"><br>
                <input type="submit" name="login" id="submit" value='opslaan'><br>

                <!-- krijg je een beginDatum binnen vul het in de ziek meld tabel in. en check of de docent in de docenten tabel staat.
                krijg je een eindDatum binnen vul die in bij de juiste docent in de ziekmeldingen tabel die al een begindatum heeft. -->

            </div>
        </div>
    </body>
</html>
