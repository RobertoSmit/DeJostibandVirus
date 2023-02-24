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
                    if ($row['eindDatum'] == null || $row['eindDatum'] == "0000-00-00") {
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
                <form action="send_data.php" method="post">
                    <h1>ziek/better melden</h1>
                    <div>Docent</div><br>
                    <input type="text" name="voornaam" placeholder="voornaam"><br>
                    <input type="text" name="achternaam" placeholder="achternaam"><br>
                    <div>Begin datum</div><br>
                    <input type="date" value="" name="beginDatum"><br>
                    <div>Eind datum</div><br>
                    <input type="date" value="" name="eindDatum"><br>
                    <input type="submit" name="save" id="submit" value='opslaan'><br>
                </form>
                <!-- krijg je een beginDatum binnen vul het in de ziek meld tabel in. en check of de docent in de docenten tabel staat.
                krijg je een eindDatum binnen vul die in bij de juiste docent in de ziekmeldingen tabel die al een begindatum heeft. -->

            </div>
        </div>
    </body>
</html>
