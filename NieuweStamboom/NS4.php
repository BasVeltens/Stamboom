<?php
require_once('../dbconfigStamboom.php');

$_POST["geslacht"] = $_POST["geslacht1"];// geslacht van 2de persoon voorbereiden voor ingave in db doorgeven
	
$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}

if ($_POST["relatie"] == 'partner') { // als relatie = partner dan "partnerschap_id" ingeven in tabel "personenregister" bij beide personen en "partner1_id" en "partner2_id" in tabel "partnerschap"
	$sql ="INSERT INTO `personenregister` ( `geslacht` , `partner_id` , `partnerschap_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` )
		VALUES (
		 '".$_POST["geslacht"]."', '1' , '1' , '".$_POST["voornaam"]."', '".$_POST["tweedenaam"]."', '".$_POST["derdenaam"]."', '".$_POST["voorvoegsel_achternaam"]."', '".$_POST["achternaam"]."', '".$_POST["voorvoegsel_meisjesnaam"]."', '".$_POST["meisjesnaam"]."', '".$_POST["geboortedatum"]."', '".$_POST["doopdatum"]."', '".$_POST["geboorteplaats"]."', '".$_POST["doopplaats"]."', '".$_POST["sterfdatum"]."', '".$_POST["sterfplaats"]."', '".$_POST["beroep1"]."', '".$_POST["beroep2"]."', '".$_POST["beroep3"]."', '".$_POST["opmerking1"]."', '".$_POST["opmerking2"]."', '".$_POST["documentatie1"]."', '".$_POST["documentatie2"]."', '".$_POST["foto1"]."'
		);";
		$resultaat = $db->query($sql); // 2de persoon invoeren in db
		if (!$resultaat) {
		echo "Fout: Invoeren van 2de persoon mislukt : " . $db->error . "<br/>" ;
		}
	$sql1 = "UPDATE `personenregister` SET
	`partner_id` = '2',
	`partnerschap_id` = '1'
	WHERE `persoon_id` = '1'
	";
	$resultaat1 = $db->query($sql1); // "partner_id" en "partnerschap_id" van eerste persoon bijwerken
	if (!$resultaat1) {
		echo "Fout! Partner_id of partnerschap_id niet bijgewerkt : " . $db->error . "<br/>" ;
	}
	$sql2 ="INSERT INTO `partnerschap` ( `partner1_id` , `partner2_id` )
		VALUES (
		  '1' , '2'
		);";
		$resultaat2 = $db->query($sql2); // tabel "partnerschap" bijwerken
		if (!$resultaat2) {
		echo "Fout! Tabel partnerschap is niet bijgewerkt : " . $db->error . "<br/>" ;
		}
		$sql2 ="INSERT INTO `kinderen` ( `kinderen_id` )
		VALUES (
		  '1'
		);";
		$resultaat2 = $db->query($sql2); // tabel "kinderen" bijwerken
		if (!$resultaat2) {
		echo "Fout! Tabel kinderen is niet bijgewerkt : " . $db->error . "<br/>" ;
		}
}

$sql3 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam`  , `voorvoegsel_meisjesnaam`, `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1`
FROM `personenregister`
WHERE `persoon_id` = '1' ;";
$resultaat3 = $db->query($sql3); // eerste persoon selecteren
if (!$resultaat3) {
	echo "Geen resultaat gevonden voor eerste persoon ': " . $db->error . "<br/>";
}
while($row = $resultaat3->fetch_assoc()){ // eerste persoon uitlezen uit db
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
	}
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
		<img src="<?php echo $path; ?>/img/Veltens.png" alt="logo" title="Veltens"  width="96px" align="center"/>
		<img src="<?php echo $path; ?>/img/BAFWARE.png" alt="logo" title="BAFWARE"  width="500px" align="center"/>
		<img src="<?php echo $path; ?>/img/ZwitsalBasje.jpg" alt="logo" title="ZwitsalBasje.jpg"  width="96px" align="center"/>
	</div>
	<div id="input_container" >
		<table width="100%" border="1" cellpadding="3" cellspacing="1">
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
		<table width="100%" border="0" cellspacing="1" cellpadding="0">
				<tr>
					<td colspan="0" width="100%" height="35px" align="left" >
					</td>
				</tr>
			</table>
		<div width="100%" >
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/NS5.php" method="post">
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
								</H3></p><br/>
						<p>is de <?php echo $_POST["relatie"]; ?> van:</p><br/>
						<p><H3> <?php echo $_POST["voornaam"]; ?> <?php echo $_POST["tweedenaam"]; ?> <?php echo $_POST["derdenaam"]; ?> <?php echo $voorvoegsel_achternaam1; ?> <?php echo $achternaam1; ?> - <?php echo $_POST["voorvoegsel_meisjesnaam"]; ?> <?php echo $_POST["meisjesnaam"]; ?>
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
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_achternaam1; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
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
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_meisjesnaam1; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
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
					<td align="left" width="5%"  >
						<input type="submit" name="Bevestigen" value="Bevestigen"  /><br/>
					</td>
				</tr>
				<tr>
					<td>
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
	<div id="footer_container">
			<a href="<?php echo $path; ?>/stamboom.php">terug</a>
	</div>
</div>
</body> 
</html> 
