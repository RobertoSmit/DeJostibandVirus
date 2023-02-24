<?php

	$Voornaam = $_POST['voornaam'];
	$Achternaam = $_POST["achternaam"];
	$BeginDatum = $_POST["beginDatum"];
	$EindDatum = $_POST["eindDatum"];

	include ('connection.php');

	if ($BeginDatum != null) {
	
		$sql = "INSERT INTO ziekmeldingen (voornaam, achternaam, beginDatum, eindDatum) VALUES ('$Voornaam', '$Achternaam', '$BeginDatum', '$EindDatum')";
		$connect->query($sql);

		echo '<script>alert("Verzonden")</script>';
	}

	else if ($EindDatum != null) {
		$result = mysqli_query($connect, "SELECT * FROM ziekmeldingen");
			$currentDate = getdate();

			while($row = mysqli_fetch_array($result))
			{
				if ($row['voornaam'] == $Voornaam && $row['achternaam'] == $Achternaam)
				{
					if ($row['beginDatum'] != null || $row['beginDatum'] != "0000-00-00")
					{
						$sql = "UPDATE ziekmeldingen set eindDatum = '$EindDatum' where voornaam = '$Voornaam' and achternaam = '$Achternaam'";
						$connect->query($sql);
					}
				}
			}

			mysqli_close($connect);
	}

	header('Location: beheer.php')
?>