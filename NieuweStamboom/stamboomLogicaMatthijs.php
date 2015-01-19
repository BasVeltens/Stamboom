<?php
require_once('dbconfigStamboom.php'); //verbinding met de database maken

/**
 * Database mysqli functioneel
 */
$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
} // connectie met database wordt in variabele $connectie opgeslagen. Deze var heb je nodig als je met db wilt praten

$q = "SELECT `voornaam`
FROM `personenregister`
WHERE `persoon_id` = 3"; // bereid de query voor
//query uitvoeren en data resource in variabele laden
$resultaat = mysqli_query($connectie, $q);
if (!$resultaat) {//als geen resource, fout weergeven
	//foutmelding van db weergeven. de functie mysqli_error haalt die uit de connectie variabele
	echo "Fout0: " . mysqli_error($connectie) . "<br/>";
} else {
	echo '<pre>';
	//mysqli_fetch_assoc haalt uit de data-resource elke keer een rij te voorsijn en stopt die in de variabele $row
	//net zolang tot er geen rijen meer zijn
	while ($row = mysqli_fetch_assoc($resultaat)) {
		print_r($row);
	}
	echo "<br/>Aantal records: " . mysqli_num_rows($resultaat);
	echo '</pre>';
}
/**
 * Database mysqli object georienteerd (OOP)
 */
$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], '', $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `voornaam`
FROM `personenregister`
WHERE `persoon_id` = 2"; //bereid de query voor
$resultaat = $db->query($sql); // hetzelfde idee, maar nu wordt op het object $db de functie ->query() uitgevoerd. resultaat is weer data-resource of niets.
if (!$resultaat) {//als geen resource, fout weergeven
	echo "Fout2: " . $db->error . "<br/>"; // foutmelding van db weergeven. de foutmelding staat in property error
} else {
	echo '<pre>';	//omdat je de OOP versie gebruikt, is ook je resultaat een object met eigen functies
	while($row = $resultaat->fetch_assoc()){ // dit resultaat kan dus zelf ->fetch_assoc() doen tot zijn rijen op zijn.
		print_r($row);
	}
	echo "<br/>Aantal records: " . $resultaat->num_rows; // hier weer geen functie opvragen met resultaat, maar num_rows is property van het resultaat-object
	echo '</pre>';
}
//tweede vraag kun je op hetzelfde db-object doen (`` zijn optioneel...)
$sql2 = "SELECT persoon_id, `voornaam`, `achternaam`
FROM `personenregister`
WHERE `achternaam` LIKE 'Gelukkig'";
//hetzelfde weer..
$resultaat2 = $db->query($sql2);
if (!$resultaat2) {//als geen resource, fout weergeven
	echo "Fout3: " . $db->error . "<br/>";
} else {
	echo '<pre>';
	while($row = $resultaat2->fetch_assoc()){
		//dit geeft de array weer om te testen
		print_r($row);
		//geef een waarde uit de array weer met br
		echo $row['voornaam'] . '<br/>';
		//maak een zin
		echo 'Persoon ' . $row['voornaam'] . ' ' . $row['achternaam'] . ' heeft id ' . $row['persoon_id'] . '.<br/>';
		//maak een zin zonder die irritante punten en aanhalingstekens (http://php.net/sprintf)
		echo sprintf('Persoon %s %s heeft id %d.<br/>', $row['voornaam'], $row['achternaam'], $row['persoon_id']);
	}
	echo "<br/>Aantal records: " . $resultaat2->num_rows;
	echo '</pre>';
}
?>


