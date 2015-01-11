<?php
require_once('../dbconfigStamboom.php'); //verbinding met de database maken

$persoonid = $_POST["persoon_id"];
$partnerid = $_POST["partner_id"];
$geslacht = $_POST["geslacht"];
$voornaam = $_POST["voornaam"];
$tweedenaam = $_POST["tweedenaam"];
$derdenaam = $_POST["derdenaam"];
$tussenvoegsel = $_POST["tussenvoegsel"];
$achternaam = $_POST["achternaam"];
$meisjesnaam = $_POST["meisjesnaam"];
$geboortedatum = $_POST["geboortedatum"];
$doopdatum = $_POST["doopdatum"];
$geboorteplaats = $_POST["geboorteplaats"];
$doopplaats = $_POST["doopplaats"];
$sterfdatum = $_POST["sterfdatum"];
$sterfplaats = $_POST["sterfplaats"];
$beroep1 = $_POST["beroep1"];
$beroep2 = $_POST["beroep2"];
$beroep3 = $_POST["beroep3"];
$opmerking1 = $_POST["opmerking1"];
$opmerking2 = $_POST["opmerking2"];
$documentatie1 = $_POST["documentatie1"];
$documentatie2 = $_POST["documentatie2"];
$foto1 = $_POST["foto1"];
$partner1 = $_POST["partner1"];
$huwlijksdatum1 = $_POST["huwlijksdatum1"];
$partner2 = $_POST["partner2"];
$huwlijksdatum2 = $_POST["huwlijksdatum2"];
$partner3 = $_POST["partner3"];
$huwlijksdatum3 = $_POST["huwlijksdatum3"];
$vader = $_POST["vader"];
$moeder = $_POST["moeder"];
$broerzus1 = $_POST["broerzus1"];
$broerzus2 = $_POST["broerzus2"];

$geslacht1 = $_POST["geslacht1"];
$relatie = $_POST["relatie"];

$soort = $_POST["soort"];
$Toevoegen = $_POST["toevoegen"];
$kindid = $_POST["kind_id"];

$db = new mysqli('localhost', 'root', '', 'stamboom'); // met new maken we een nieuw object dat de verbinding met de database heeft, en veel meer
if ($db->connect_errno > 0) { // het object houdt zijn eigen fouten bij in de property connect_errno
	echo 'Fout! : ' . $db->connect_error;
}
if ($_POST["soort"] == 'nieuw' && $_POST["voornaam"] != '' && ($_POST["achternaam"] != '' || $_POST["meisjesnaam"] != '')) { // bij eerste persoon alleen als er een voornaam en (achter- of meisjesnaam) is verzonden.
	$sql ="INSERT INTO `personenregister` (  `persoon_id` , `partner_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `tussenvoegsel` , `achternaam` , `meisjesnaam` , `geboortedatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` , `partner1` , `huwlijksdatum1` , `partner2` , `huwlijksdatum2` , `partner3` , `huwlijksdatum3` , `vader` , `moeder` , `broerzus1` , `broerzus2` )
	VALUES (
	 '".$_POST["persoonid"]."', '".$_POST["partnerid"]."', '".$_POST["geslacht"]."', '".$_POST["voornaam"]."', '".$_POST["tweedenaam"]."', '".$_POST["derdenaam"]."', '".$_POST["tussenvoegsel"]."', '".$_POST["achternaam"]."', '".$_POST["meisjesnaam"]."', '".$_POST["geboortedatum"]."', '".$_POST["geboorteplaats"]."', '".$_POST["doopplaats"]."', '".$_POST["sterfdatum"]."', '".$_POST["sterfplaats"]."', '".$_POST["beroep1"]."', '".$_POST["beroep2"]."', '".$_POST["beroep3"]."', '".$_POST["opmerking1"]."', '".$_POST["opmerking2"]."', '".$_POST["documentatie1"]."', '".$_POST["documentatie2"]."', '".$_POST["foto1"]."', '".$_POST["partner1"]."', '".$_POST["huwlijksdatum1"]."', '".$_POST["partner2"]."', '".$_POST["huwlijksdatum2"]."', '".$_POST["partner3"]."', '".$_POST["huwlijksdatum3"]."', '".$_POST["vader"]."', '".$_POST["moeder"]."', '".$_POST["broerzus1"]."', '".$_POST["broerzus2"]."'
	);"; //bereidt de query voor
	$resultaat = $db->query($sql);
}
if (!$resultaat) { // als geen resource, fout weergeven
	echo $db->error . "<br/>" ; // foutmelding van db weergeven. de foutmelding staat in property error
}


