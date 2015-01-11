<?php
require_once('/dbconfigStamboom.php'); //verbinding met de database maken

$db = new mysqli('localhost', 'root', '', 'stamboom'); // met new maken we een nieuw object dat de verbinding met de database heeft, en veel meer
if ($db->connect_errno > 0) { // het object houdt zijn eigen fouten bij in de property connect_errno
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `opmerking1` = 'veltensstamboom' 
"; //bereid de query voor
$resultaat2 = $db->query($sql); // hetzelfde idee, maar nu wordt op het object $db de functie ->query() uitgevoerd. resultaat is weer data-resource of niets.
if (!$resultaat2) {//als geen resource, fout weergeven
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>"; // foutmelding van db weergeven. de foutmelding staat in property error
}
while($row = $resultaat2->fetch_assoc()){
		$voornaam = $row['voornaam'];
		$tweedenaam = $row['tweedenaam'];
		$derdenaam = $row['derdenaam'];
		$tussenvoegsel = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$tussenvoegsel = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];
}

?>