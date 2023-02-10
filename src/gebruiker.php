<?php
// datepicker1.php
define("ADAY", (60*60*24));
$me = basename($_SERVER['PHP_SELF']);
$posted = isset($_REQUEST['submit']);
if (!$posted || !checkdate($_POST['maand'], 1, $_POST['jaar'])) {
   $nowArray = getdate();
   $maand = $nowArray['mon'];
   $jaar = $nowArray['year'];
} else {
   $maand = $_POST['maand'];
   $jaar = $_POST['jaar'];
}
$start = mktime (12, 0, 0, $maand, 1, $jaar);
$firstDayArray = getdate($start);
$maanden = Array("Januari", "Februari", "Maart", "April", "Mei", "Juni", "Juli",
"Augustus", "Sebtember", "Oktober", "November", "December");
$maandselect = "
<select name=\"maand\">
";
for ($x=1; $x <= count($maanden); $x++) {
    $maandselect .= "<option value=\"$x\"";
    if ($x == $maand) {
       $maandselect .= " SELECTED";
    }
    $maandselect .= ">".$maanden[$x-1]."";
}
$maandselect .= "
</select>
";
$jaarselect = "
<form method=\"post\" action=\"$me\">
<select name=\"jaar\">
";
for ($x=1980; $x<=2010; $x++) {
    $jaarselect .= "<option";
    if ($x == $jaar) {
       $jaarselect .= " SELECTED";
    }
    $jaarselect .= ">$x";
}
$jaarselect .= "
</select>
";

$dagen = Array("Zon","Maa","Din","Woe","Don","Vri","Zat");
$maandkalender = "
<TABLE BORDER=1 CELLPADDING=5><tr>
";
foreach ($dagen as $dag) {
    $maandkalender .= "<TD BGCOLOR=\"#cccccc\" ALIGN=CENTER><strong>$dag</strong></td>\n";
}
for ($count=0; $count < (6*7); $count++) {
    $dagArray = getdate($start);
    if (($count % 7) == 0) {
         if ($dagArray['mon'] != $maand) {
            break;
         } else {
             $maandkalender .= "</tr><tr>\n";
        }
    }
    if ($count < $firstDayArray['wday'] ||
                       $dagArray['mon'] != $maand) {
        $maandkalender .= "<td>&nbsp;</td>\n";
    } else {
        $maandkalender .= "<td>".$dagArray['mday']." &nbsp;&nbsp; </td>\n";
        $start += ADAY;
    }
}
$maandkalender .= "</tr></table>";

?>

<html>
<head>
<title><?php echo "Kalender:".$firstDayArray['month']."".$firstDayArray['year'] ?></title>
</head>
<body>
<form method="post" action="<?=$me ?>">
<?php echo $maandselect; ?>
<?php echo $jaarselect; ?>
<input type="submit" name="submit" value="Go!">
</form>
<?php echo $maandkalender; ?>

</body>
</html> 