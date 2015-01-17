<?php
require_once('../dbconfigStamboom.php'); 

function personenSelecteren ($voornaam,$voornaam1,$voornaam2) {
$geslacht = $_POST['geslacht'];
$persoonkeuze = $_POST['persoonkeuze'];

$voornaam = $row['voornaam'];
$tweedenaam = $row['tweedenaam'];
$derdenaam = $row['derdenaam'];
$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
$achternaam = $row['achternaam'];
$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
$meisjesnaam = $row['meisjesnaam'];
$voornaam1 = $row['voornaam'];
$tweedenaam1 = $row['tweedenaam'];
$derdenaam1 = $row['derdenaam'];
$voorvoegsel_achternaam1 = $row['voorvoegsel_achternaam'];
$achternaam1 = $row['achternaam'];
$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
$meisjesnaam1 = $row['meisjesnaam'];
$voornaam2 = $row['voornaam'];
$tweedenaam2 = $row['tweedenaam'];
$derdenaam2 = $row['derdenaam'];
$voorvoegsel_achternaam2 = $row['voorvoegsel_achternaam'];
$achternaam2 = $row['achternaam'];
$voorvoegsel_meisjesnaam2 = $row['voorvoegsel_meisjesnaam'];
$meisjesnaam2 = $row['meisjesnaam'];

$db = new mysqli('localhost', 'root', '', 'stamboom'); 
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '1' 
"; 
$resultaat = $db->query($sql);
if (!$resultaat) { // hoe vraag ik deze en onderstaande queries in 1x? het mooiste is een "auto aanvul - zoekdingetje" in ajax (?)
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>";
}
while($row = $resultaat->fetch_assoc()){
		$persoonkeuze = $row['persoon_id'];
		$voornaam = $row['voornaam'];
		$tweedenaam = $row['tweedenaam'];
		$derdenaam = $row['derdenaam'];
		$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];
}

$sql1 = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '2' 
";
$resultaat1 = $db->query($sql1); 
if (!$resultaat1) {
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>"; 
}
while($row = $resultaat1->fetch_assoc()){
		$persoonkeuze1 = $row['persoon_id'];
		$voornaam1 = $row['voornaam'];
		$tweedenaam1 = $row['tweedenaam'];
		$derdenaam1 = $row['derdenaam'];
		$voorvoegsel_achternaam1 = $row['voorvoegsel_achternaam'];
		$achternaam1 = $row['achternaam'];
		$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam1 = $row['meisjesnaam'];
}

$sql2 = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '3' 
"; 
$resultaat2 = $db->query($sql2);
if (!$resultaat2) {
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>"; 
}
while($row = $resultaat2->fetch_assoc()){
		$persoonkeuze2 = $row['persoon_id'];
		$voornaam2 = $row['voornaam'];
		$tweedenaam2 = $row['tweedenaam'];
		$derdenaam2 = $row['derdenaam'];
		$voorvoegsel_achternaam2 = $row['voorvoegsel_achternaam'];
		$achternaam2 = $row['achternaam'];
		$voorvoegsel_achternaam2 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam2 = $row['meisjesnaam'];
}
// echo $voornaam;
// echo $voornaam1;
// echo $voornaam2;
return;
} // end function
