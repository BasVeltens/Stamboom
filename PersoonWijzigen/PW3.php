<?php
require_once('../dbconfigStamboom.php');

$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}

$sql = "UPDATE `personenregister` SET
	`geslacht` = '" . $_POST["geslacht"] . "',
	`voornaam` = '" . $_POST["voornaam"] . "',
	`tweedenaam` = '" . $_POST["tweedenaam"] . "',
	`derdenaam` = '" . $_POST["derdenaam"] . "',
	`voorvoegsel_achternaam` = '" . $_POST["voorvoegsel_achternaam"] . "',
	`achternaam` = '" . $_POST["achternaam"] . "',
	`voorvoegsel_meisjesnaam` = '" . $_POST["voorvoegsel_meisjesnaam"] . "',
	`meisjesnaam` = '" . $_POST["meisjesnaam"] . "',
	`geboortedatum` = '" . $_POST["geboortedatum"] . "',
	`doopdatum` = '" . $_POST["doopdatum"] . "',
	`geboorteplaats` = '" . $_POST["geboorteplaats"] . "',
	`doopplaats` = '" . $_POST["doopplaats"] . "',
	`sterfdatum` = '" . $_POST["sterfdatum"] . "',
	`sterfplaats` = '" . $_POST["sterfplaats"] . "',
	`beroep1` = '" . $_POST["beroep1"] . "',
	`beroep2` = '" . $_POST["beroep2"] . "',
	`beroep3` = '" . $_POST["beroep3"] . "',
	`opmerking1` = '" . $_POST["opmerking1"] . "',
	`opmerking2` = '" . $_POST["opmerking2"] . "',
	`documentatie1` = '" . $_POST["documentatie1"] . "',
	`documentatie2` = '" . $_POST["documentatie2"] . "',
	`foto1` = '" . $_POST["foto1"] . "',
	`partner1` = '" . $_POST["partner1"] . "',
	`huwlijksdatum1` = '" . $_POST["huwlijksdatum1"] . "',
	`partner2` = '" . $_POST["partner2"] . "',
	`huwlijksdatum2` = '" . $_POST["huwlijksdatum2"] . "',
	`partner3` = '" . $_POST["partner3"] . "',
	`huwlijksdatum3` = '" . $_POST["huwlijksdatum3"] . "'
	WHERE `persoon_id` = " . $_POST["persoonkeuzeDoorgeven"] . ";";
$resultaat = $db->query($sql); // wijzigd de gegevens van de te veranderen persoon
if (!$resultaat) {
	echo $db->error . "<br/>" ;
}

 ?>

<html> 
<head> 
	<title>Persoon wijzigen</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>/img/ZwitsalBasje.jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<link rel="stylesheet" href="<?php echo $path; ?>../css/style.css" type="text/css" />
</head> 
<body>
<div id="main_container" >
	<div id="header_container" >
		<img src="<?php echo $path; ?>/img/Veltens.png" alt="logo" title="Veltens"  width="96px" align="center"/>
		<img src="<?php echo $path; ?>/img/BAFWARE.png" alt="logo" title="BAFWARE"  width="500px" align="center"/>
		<img src="<?php echo $path; ?>/img/ZwitsalBasje.jpg" alt="logo" title="ZwitsalBasje.jpg"  width="96px" align="center"/>
	</div>
	<div id="input_container" >
		<div width="100%" >
			<table width="100%" border="1" cellpadding="3" cellspacing="1">
				<tr> 
					<td width="10%" bgcolor="#C5CED3"><a href="<?php echo $path; ?>/stamboom.php">home</a></td>
					<td width="10%" bgcolor="#D6DDE0"><a href="<?php echo $path; ?>/PersoonWijzigen/PW1.php">persoon toevoegen/wijzigen</a></td> 
					<td width="10%" bgcolor="#E6EAEC"></td>
					<td width="10%" bgcolor="#EDEEF1"></td> 
					<td width="10%" bgcolor="#F4F5F7"><a href="<?php echo $path; ?>/VeltensStamboom.php">Veltens stamboom</a></td>
					<td width="10%" bgcolor="#F4F5F7"><a href="<?php echo $path; ?>/data/NummereringsLogica.xlsx">nummereringslogica</a></td> 
					<td width="10%" bgcolor="#EDEEF1"></td>
					<td width="30%" bgcolor="#EDEEF1"></td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="100%" height="35px" align="left" >
					</td>
				</tr>
			</table>
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="left" >
								<B>Persoon succesvol gewijzigd.</B></p>
					</td>
				</tr>
				<tr>
					<td >
						 <?php
						// echo '<pre>';
						// echo '<br/>';
						// print_r($_POST);
						// echo '</pre>'; ?>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div id="footer_container" >
		<a href="<?php echo $path; ?>/stamboom.php">terug</a>
	</div>
</div>
</body> 
</html> 
