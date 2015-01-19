<?php
require_once('../dbconfigStamboom.php');

$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}

if ($_POST["familie"] != '' && $_POST["relatie"] != '' && $_POST["voornaam"] != '' && ($_POST["achternaam"] != '' || $_POST["meisjesnaam"] != '')) { // voert de nieuwe persoon in de db in
	$sql ="INSERT INTO `personenregister` (  `persoon_id` , `partner_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam` , `geboortedatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` )
	VALUES (
	 '".$_POST["persoon_id"]."', '".$_POST["partner_id"]."', '".$_POST["geslacht"]."', '".$_POST["voornaam"]."', '".$_POST["tweedenaam"]."', '".$_POST["derdenaam"]."', '".$_POST["voorvoegsel_achternaam"]."', '".$_POST["achternaam"]."', '".$_POST["voorvoegsel_meisjesnaam"]."', '".$_POST["meisjesnaam"]."', '".$_POST["geboortedatum"]."', '".$_POST["geboorteplaats"]."', '".$_POST["doopplaats"]."', '".$_POST["sterfdatum"]."', '".$_POST["sterfplaats"]."', '".$_POST["beroep1"]."', '".$_POST["beroep2"]."', '".$_POST["beroep3"]."', '".$_POST["opmerking1"]."', '".$_POST["opmerking2"]."', '".$_POST["documentatie1"]."', '".$_POST["documentatie2"]."', '".$_POST["foto1"]."'
	);";
	$resultaat = $db->query($sql);
}
if (!$resultaat) {
	echo $db->error . "<br/>" ;
}
$voornaam1 = $row['voornaam'];
$tweedenaam1 = $row['tweedenaam'];
$derdenaam1 = $row['derdenaam'];
$voorvoegsel1_achternaam = $row['voorvoegsel_achternaam'];
$achternaam1 = $row['achternaam'];
$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
$meisjesnaam1 = $row['meisjesnaam'];

$sql1 ="SELECT *
FROM `personenregister`
ORDER BY `persoon_id` DESC
LIMIT 1
";
$resultaat1 = $db->query($sql1);
if (!$resultaat1) { // selecteer de laatst ingevoerde persoon
	echo "Fout : " . $db->error . "<br/>";
}
while($row = $resultaat1->fetch_assoc()){
		$toegevoegdePersoon_id = $row['persoon_id'];
}

$sql2 = "SELECT  `partnerschap_id` , `ouder_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' ".$_POST["familie"]." ' 
";
$resultaat2 = $db->query($sql2);
if (!$resultaat2) { // relatie van toegevoegde persoon uit db halen
	echo "Fout : " . $db->error . "<br/>";
}
while($row = $resultaat2->fetch_assoc()){
		$partnerschap_id1 = $row['partnerschap_id'];
		$ouder_id1 = $row['ouder_id'];
		$voornaam1 = $row['voornaam'];
		$tweedenaam1 = $row['tweedenaam'];
		$derdenaam1 = $row['derdenaam'];
		$voorvoegsel1_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam1 = $row['achternaam'];
		$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam1 = $row['meisjesnaam'];
}

if ($_POST["relatie"] == "partner"){ // wanneer relatie = partner (moet nog)
	
}

if ($_POST["relatie"] == "ouder"){ // wanneer relatie = ouder
	if ($partnerschap_id1 != ''){ // als er wel al een ouder bestaat
		$sql = "SELECT  `ouder_id`
		FROM `personenregister`
		WHERE `persoon_id` = ' ".$toegevoegdePersoon_id." ' 
		";
		$resultaat = $db->query($sql);
		if (!$resultaat) { // relatie van toegevoegde persoon uit db halen
			echo "Fout : " . $db->error . "<br/>";
		}
		$partnerschapOuder_id = $row['ouder_id'];
		while($row = $resultaat->fetch_assoc()){
			$partnerschapOuder_id = $row['ouder_id'];
		}
		$sql1 = "UPDATE `partnerschap` SET
		`partner2_id` =  '".$toegevoegdePersoon_id."'
		WHERE `partnerschap_id` = ' ".$ouder_id1." '
		";
		$resultaat1 = $db->query($sql1); // update $_POST["persoon_id"] into partnerschap (partner2_id) where partnerschap_id = $partnerschap_id1
		if (!$resultaat1) {
			echo "Fout bij bijwerken ouder_id in personenregister : " . $db->error . "<br/>";
		}
		$sql2 = "SELECT  `persoon_id`
		FROM `personenregister`
		WHERE `partnerschap_id` = ' ".$ouder_id1." ' 
		";
		$resultaat2 = $db->query($sql2);
		if (!$resultaat2) { // persoon_id van relatie uit db halen
			echo "Fout : " . $db->error . "<br/>";
		}
		$relatiesPartner_id = $row['ouder_id'];
		while($row = $resultaat2->fetch_assoc()){
			$relatiesPartner_id = $row['persoon_id'];
		}// select persoon_id WHERE partnerschap_id = ouder_id1
		$sql3 = "UPDATE `personenregister` SET
		`partnerschap_id` =  '".$ouder_id1."' ,
		`partner_id` =  '".$relatiesPartner_id."'
		WHERE `persoon_id` = ' ".$toegevoegdePersoon_id." '
		";
		$resultaat3 = $db->query($sql3); // update into personenregister (ouder_id) where persoon_id = $toegevoegdePersoon_id
		if (!$resultaat3) {
			echo "Fout bij bijwerken ouder_id in personenregister : " . $db->error . "<br/>";
		}
		$sql4 = "UPDATE `personenregister` SET
		`partner_id` =  '".$toegevoegdePersoon_id."'
		WHERE `persoon_id` = ' ".$relatiesPartner_id." '
		";
		$resultaat4 = $db->query($sql4); // update into personenregister (ouder_id) where persoon_id = $toegevoegdePersoon_id
		if (!$resultaat4) {
			echo "Fout bij bijwerken ouder_id in personenregister : " . $db->error . "<br/>";
		}
	}
	if ($partnerschap_id1 == ''){ // als er nog geen ouder bestaat
		$sql3 ="INSERT INTO `partnerschap` (  `partner1_id` )
		VALUES (
		 '".$toegevoegdePersoon_id."'
		);";
		$resultaat3 = $db->query($sql3); // maak nieuwe rij aan in tabel "partnerschap" en zet "persoon_id" van de relatie van de toegevoegde persoon in kolom "partner1_id"
		if (!$resultaat3) {
			echo "Fout bij invoer van partner1_id in tabel partnerschap : " . $db->error . "<br/>";
		}
		$sql4 = "SELECT  `partnerschap_id`
		FROM `partnerschap`
		WHERE `partner1_id` = '$toegevoegdePersoon_id' 
		";
		$resultaat4 = $db->query($sql4);
		if (!$resultaat4) { // relatie van toegevoegde persoon uit db halen
			echo "Fout : " . $db->error . "<br/>";
		}
		while($row = $resultaat4->fetch_assoc()){
			$partnerschapOuder_id = $row['partnerschap_id'];
		}
		$sql5 = "UPDATE `personenregister` SET
		`partnerschap_id` =  '".$partnerschapOuder_id."'
		WHERE `persoon_id` = ' ".$toegevoegdePersoon_id." '
		";
		$resultaat5 = $db->query($sql5); // bijwerken partnerschap_id in personenregister
		if (!$resultaat5) {
			echo "Fout bij bijwerken partnerschap_id in personenregister : " . $db->error . "<br/>";
		}
		$sql6 = "UPDATE `personenregister` SET
		`ouder_id` =  '".$partnerschapOuder_id."'
		WHERE `persoon_id` = ' ".$_POST["familie"]." '
		";
		$resultaat6 = $db->query($sql6); // bijwerken ouder_id van kind in personenregister
		if (!$resultaat6) {
			echo "Fout bij bijwerken ouder_id in personenregister : " . $db->error . "<br/>";
		}
		$sql7 ="INSERT INTO `kinderen` ( `kinderen_id` , `persoon_id` )
			VALUES (
			 '".$partnerschapOuder_id."' , '".$_POST["familie"]."'
			);";
			$resultaat7 = $db->query($sql7); // maak een nieuwe rij in "kinderen", neem daar het "partnerschap_id" over naar "kinderen_id" en voeg kind (persoon_id) toe aan "kind_id"
		if (!$resultaat7) {
			echo "Fout bij invoeren in tabel kinderen : " . $db->error . "<br/>";
		}
	}
}

if ($_POST["relatie"] == "broer/zus"){ // wanneer relatie = broer/zus (moet nog)
	// 
}

if ($_POST["relatie"] == "kind"){ // wanneer relatie = kind
	$sql = "UPDATE `personenregister` SET
	`ouder_id` =  '".$partnerschap_id1."' 
	WHERE `persoon_id` = ' ".$toegevoegdePersoon_id." '
	";
	$resultaat = $db->query($sql); // update into personenregister (ouder_id) where partnerschap_id = $toegevoegdePersoon_id
	if (!$resultaat) {
		echo "Fout bij bijwerken ouder_id in personenregister : " . $db->error . "<br/>";
	}
	$checkOpKinderen = $row['persoon_id'];
	$sql2 = "SELECT *
	FROM `kinderen`
	WHERE `kinderen_id` = ' ".$partnerschap_id1. " '
	ORDER BY `persoon_id` DESC
	LIMIT 1
	";
	$resultaat2 = $db->query($sql2);
	if (!$resultaat2) { 
		echo "Fout : " . $db->error . "<br/>";
	}
	while($row = $resultaat2->fetch_assoc()){
		$checkOpKinderen = $row['persoon_id'];
	}
	if ($checkOpKinderen == '0'){ // als er nog geen kind is
		$sql3 = "UPDATE `kinderen` SET
		`persoon_id` =  '".$toegevoegdePersoon_id."' 
		WHERE `kinderen_id` = ' ".$partnerschap_id1." '
		";
		$resultaat3 = $db->query($sql3); // update persoon_id in kinderen
		if (!$resultaat3) {
			echo "Fout bij bijwerken persoon_id in kinderen : " . $db->error . "<br/>";
		}
	}
	if ($checkOpKinderen > '0'){ // als er al wel 1 of meer kinderen zijn
		$sql4 ="INSERT INTO `kinderen` (  `kinderen_id` , `persoon_id` )
		VALUES (
		 '".$partnerschap_id1."', '".$toegevoegdePersoon_id."'
		);";
		$resultaat4 = $db->query($sql4);
	}
	if (!$resultaat4) {
		echo $db->error . "<br/>" ;
	}
}

?>

<html> 
<head> 
	<title>Persoon toevoegen</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>/img/ZwitsalBasje.jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<link rel="stylesheet" href="<?php echo $path; ?>/css/style.css" type="text/css" />
</head> 
<body>
<div id="main_container">
	<div id="header_container" >
		<img src="<?php echo $path; ?>/img/Veltens.png" alt="logo" title="Veltens"  width="96px" align="center"/>
		<img src="<?php echo $path; ?>/img/BAFWARE.png" alt="logo" title="BAFWARE"  width="500px" align="center"/>
		<img src="<?php echo $path; ?>/img/ZwitsalBasje.jpg" alt="logo" title="ZwitsalBasje.jpg"  width="96px" align="center"/>
	</div>
	<div id="input_container" >
		<div width="100%" >
			<table width="100%" border="1" cellpadding="3" cellspacing="1" >
				<tr> 
					<td width="10%" bgcolor="#C5CED3">home</td>
					<td width="10%" bgcolor="#D6DDE0">persoon toevoegen/wijzigen</td> 
					<td width="10%" bgcolor="#E6EAEC"></td>
					<td width="10%" bgcolor="#EDEEF1"></td> 
					<td width="10%" bgcolor="#F4F5F7">Veltens stamboom</td>
					<td width="10%" bgcolor="#F4F5F7">nummereringslogica</td> 
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
			<form name="input" action="<?php echo $path; ?>/PersoonToevoegen/PT3.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="right" >
						<p><B>Toevoegen :</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="10%" align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["geslacht"];?>"/></p>
					</td>
					<td colspan="0" width="50%" align="center" valign="center">
						<p><H3> <?php echo $_POST["voornaam"]; ?> <?php echo $_POST["tweedenaam"]; ?> <?php echo $_POST["derdenaam"]; ?> <?php echo $_POST["tussenvoegsel"]; ?> <?php echo $_POST["achternaam"]; ?> - <?php echo $_POST["meisjesnaam"]; ?></H3></p><br/>
						<p>is <?php echo $_POST["relatie"]; ?> van:</p><br/>
						<p><H3><?php echo $voornaam1; ?> <?php echo $tweedenaam1; ?> <?php echo $derdenaam1; ?> <?php echo $voorvoegsel_achternaam1; ?> <?php echo $achternaam1; ?> - <?php echo $voorvoegsel_meisjesnaam1; ?> <?php echo $meisjesnaam1; ?></H3>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["voornaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["tweedenaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["derdenaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["voorvoegsel_achernaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["achternaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["voorvoegsel_meisjesnaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["meisjesnaam"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["geboortedatum"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["doopdatum"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php  echo$_POST["geboorteplaats"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["doopplaats"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["sterfdatum"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["sterfplaats"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["beroep1"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["beroep2"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["beroep3"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["opmerking1"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["opmerking2"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["documentatie1"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["documentatie2"];?>"/></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td align="left" >
						<p><input type="text" name="voornaam" value="<?php echo $_POST["foto1"];?>"/></p>
					</td>
					<td align="left" >
						<input type="submit" name="bevestigen" value="bevestigen"  /><br/>
					</td>					
				</tr>
				<tr>
					<td>
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