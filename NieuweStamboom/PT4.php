<?php
require_once('../dbconfigStamboom.php'); //verbinding met de database maken

$_POST["geslacht"] = $_POST["geslacht1"];
$_POST["partnerid"] = 1;
$_POST["persoonid"] = 2;
	
$db = new mysqli('localhost', 'root', '', 'stamboom'); // met new maken we een nieuw object dat de verbinding met de database heeft, en veel meer
if ($db->connect_errno > 0) { // het object houdt zijn eigen fouten bij in de property connect_errno
	echo 'Fout! : ' . $db->connect_error;
}
$sql ="INSERT INTO `personenregister` (  `persoon_id` , `partner_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` , `partner1` , `huwlijksdatum1` , `partner2` , `huwlijksdatum2` , `partner3` , `huwlijksdatum3` , `vader` , `moeder` , `broerzus1` , `broerzus2` )
	VALUES (
	 '".$_POST["persoonid"]."', '".$_POST["partnerid"]."', '".$_POST["geslacht"]."', '".$_POST["voornaam"]."', '".$_POST["tweedenaam"]."', '".$_POST["derdenaam"]."', '".$_POST["voorvoegsel_achternaam"]."', '".$_POST["achternaam"]."', '".$_POST["voorvoegsel_meisjesnaam"]."', '".$_POST["meisjesnaam"]."', '".$_POST["geboortedatum"]."', '".$_POST["doopdatum"]."', '".$_POST["geboorteplaats"]."', '".$_POST["doopplaats"]."', '".$_POST["sterfdatum"]."', '".$_POST["sterfplaats"]."', '".$_POST["beroep1"]."', '".$_POST["beroep2"]."', '".$_POST["beroep3"]."', '".$_POST["opmerking1"]."', '".$_POST["opmerking2"]."', '".$_POST["documentatie1"]."', '".$_POST["documentatie2"]."', '".$_POST["foto1"]."', '".$_POST["partner1"]."', '".$_POST["huwlijksdatum1"]."', '".$_POST["partner2"]."', '".$_POST["huwlijksdatum2"]."', '".$_POST["partner3"]."', '".$_POST["huwlijksdatum3"]."', '".$_POST["vader"]."', '".$_POST["moeder"]."', '".$_POST["broerzus1"]."', '".$_POST["broerzus2"]."'
	);"; //bereidt de query voor
	$resultaat = $db->query($sql);
if (!$resultaat) { // als geen resource, fout weergeven
	echo $db->error . "<br/>" ; // foutmelding van db weergeven. de foutmelding staat in property error
}

$sql2 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam`  , `voorvoegsel_meisjesnaam`, `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` , `partner1` , `huwlijksdatum1` , `partner2` , `huwlijksdatum2` , `partner3` , `huwlijksdatum3` , `vader` , `moeder` , `broerzus1` , `broerzus2`
FROM `personenregister`
WHERE `persoon_auto_id` = 1"; //bereid de query voor
$resultaat2 = $db->query($sql2); // hetzelfde idee, maar nu wordt op het object $db de functie ->query() uitgevoerd. resultaat is weer data-resource of niets.
if (!$resultaat2) {//als geen resource, fout weergeven
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>"; // foutmelding van db weergeven. de foutmelding staat in property error
}
while($row = $resultaat2->fetch_assoc()){
		$geslacht1 = $row['geslacht'];
		$voornaam1 = $row['voornaam'];
		$tweedenaam1 = $row['tweedenaam'];
		$derdenaam1 = $row['derdenaam'];
		$voorvoegsel_achternaam1 = $row['voorvoegsel_achternaam'];
		$achternaam1 = $row['achternaam'];
		$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam1 = $row['meisjesnaam'];
		$geboortedatum1 = $row['geboortedatum'];
		$doopdatum1 = $row['doopdatum'];
		$geboorteplaats1 = $row['geboorteplaats'];
		$doopplaats1 = $row['doopplaats'];
		$sterfdatum1 = $row['sterfdatum'];
		$sterfplaats1 = $row['sterfplaats'];
		$beroep11 = $row['beroep1'];
		$beroep21 = $row['beroep2'];
		$beroep31 = $row['beroep3'];
		$opmerking11 = $row['opmerking1'];
		$opmerking21 = $row['opmerking2'];
		$documentatie11 = $row['documentatie1'];
		$documentatie21 = $row['documentatie2'];
		$foto11 = $row['foto1'];
		$partner11 = $row['partner1'];
		$huwlijksdatum11 = $row['huwlijksdatum1'];
		$partner21 = $row['partner2'];
		$huwlijksdatum21 = $row['huwlijksdatum2'];
		$partner31 = $row['partner3'];
		$huwlijksdatum31 = $row['huwlijksdatum3'];
		$vader1 = $row['vader'];
		$moeder1 = $row['moeder'];
		$broerzus11 = $row['broerzus1'];
		$broerzus21 = $row['broerzus2'];
	};
?>

<html> 
<head> 
	<title>Stamboom aanmaken</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>/img/ZwitsalBasje.jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<link rel="stylesheet" href="<?php echo $path; ?>/css/style.css" type="text/css" />
</head> 
<body>
<div id="main_container">
	<div id="header_container">
		<img src="<?php echo $path; ?>/img/BAFWARE.gif" alt="logo" title="BAFWARE"  width="500px" align="center"/>
	</div>
	<div id="input_container" >
		<table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#516B88">
			<tr> 
				<td width="10%" bgcolor="#C5CED3"><a href="<?php echo $path; ?>/stamboom.php">home</a></td>
				<td width="10%" bgcolor="#D6DDE0">persoon toevoegen/wijzigen</td> 
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
		<div width="100%" >
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/PT5.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="15%" align="right" >
								<B>Persoon 1:</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="5%" align="left" >
						<?php echo $geslacht1; ?>
					</td>
					<td align="right" width="15%">
						<p><B>Persoon 2:</B>(*) Relatie tov eerste :<br/>(*) Geslacht:</p>
					</td>
					<td align="left" width="10%">
						<?php echo $_POST["relatie"]; ?><br/>
						<?php echo $_POST["geslacht"]; ?>
					</td>
					<td colspan="0" width="50%" align="center" valign="center">
						<p><H3> <?php echo $voornaam1; ?> <?php echo $tweedenaam1; ?> <?php echo $derdenaam1; ?> <?php echo $voorvoegsel_achternaam1; ?> <?php echo $achternaam1; ?> - <?php echo $voorvoegsel_meisjesnaam1; ?> <?php echo $meisjesnaam1; ?>
								</H3></p><br/><br/>
						<p>is de <?php echo $_POST["relatie"]; ?> van:</p><br/><br/>
						<p><H3> <?php echo $_POST["voornaam"]; ?> <?php echo $_POST["tweedenaam"]; ?> <?php echo $_POST["derdenaam"]; ?> <?php echo $_POST["tussenvoegsel"]; ?> <?php echo $_POST["achternaam"]; ?> - <?php echo $_POST["meisjesnaam"]; ?>
								</H3></p>
					</td>
				</tr>
				<tr>
					<td align="right" bgcolor="red">
						<p>(*) Voornaam :</p>
					</td>
					<td align="left" >
						<?php  echo $voornaam1;?>
					</td>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td>
						<?php echo $_POST["voornaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td align="left" >
						<?php echo $tweedenaam1; ?>
					</td>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td>
						<?php echo $_POST["tweedenaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td align="left" >
						<?php echo $derdenaam1; ?>
					</td>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td>
						<?php echo $_POST["derdenaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel achternaam:</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_achternaam1; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel achternaam:</p>
					</td>
					<td>
						<?php echo $_POST["voorvoegsel_achternaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td align="left" >
						<?php echo $achternaam1; ?>
					</td>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td>
						<?php echo $_POST["achternaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam:</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_meisjesnaam1; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam:</p>
					</td>
					<td>
						<?php echo $_POST["voorvoegsel_meisjesnaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td align="left" >
						<?php echo $meisjesnaam1; ?>
					</td>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td>
						<?php echo $_POST["meisjesnaam"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td align="left" >
						<?php echo $geboortedatum1; ?>
					</td>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td>
						<?php echo $_POST["geboortedatum"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td align="left" >
						<?php echo $doopdatum1; ?>
					</td>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td>
						<?php echo $_POST["doopdatum"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td align="left" >
						<?php echo $geboorteplaats1; ?>
					</td>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td>
						<?php echo $_POST["geboorteplaats"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td align="left" >
						<?php echo $doopplaats1; ?>
					</td>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td>
						<?php echo $_POST["doopplaats"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td align="left" >
						<?php echo $sterfdatum1; ?>
					</td>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td>
						<?php echo $_POST["sterfdatum"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td align="left" >
						<?php echo $sterfplaats1; ?>
					</td>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td>
						<?php echo $_POST["sterfplaats"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep11; ?>
					</td>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td>
						<?php echo $_POST["beroep1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep21; ?>
					</td>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td>
						<?php echo $_POST["beroep2"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep31; ?>
					</td>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td>
						<?php echo $_POST["beroep3"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td align="left" >
						<?php echo $opmerking11; ?>
					</td>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td>
						<?php echo $_POST["opmerking1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td align="left" >
						<?php echo $opmerking21; ?>
					</td>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td>
						<?php echo $_POST["opmerking2"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td align="left" >
						<?php echo $documentatie11; ?>
					</td>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td>
						<?php echo $_POST["documentatie1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td align="left" >
						<?php echo $documentatie21; ?>
					</td>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td>
						<?php echo $_POST["documentatie2"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td align="left" >
						<?php echo $foto11; ?>
					</td>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td>
						<?php echo $_POST["foto1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td align="left" >
						<?php echo $partner11; ?>
					</td>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td>
						<?php echo $_POST["partner1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum11; ?>
					</td>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td>
						<?php echo $_POST["huwlijksdatum1"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td align="left" >
						<?php echo $partner21; ?>
					</td>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td>
						<?php echo $_POST["partner2"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 2 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum21; ?>
					</td>
					<td align="right" >
						<p>Huwelijksdatum 2 :</p>
					</td>
					<td>
						<?php echo $_POST["huwlijksdatum2"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td align="left" >
						<?php echo $partner31; ?>
					</td>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td>
						<?php echo $_POST["partner3"]; ?>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum31; ?>
					</td>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td>
						<?php echo $_POST["huwlijksdatum3"]; ?>
					</td>
					<td align="left" width="5%"  >
						<input type="submit" name="Bevestigen" value="Bevestigen"  /><br/>
					</td>
				</tr>
				<tr>
					<td align="right" >
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
			</form>
		</div>
	</div>
	<div id="footer_container" >
			<a href="<?php echo $path; ?>/stamboom.php">terug</a>
	</div>
</div>
</body> 
</html> 
