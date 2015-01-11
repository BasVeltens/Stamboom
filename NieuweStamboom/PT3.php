<?php
require_once('../dbconfigStamboom.php'); //verbinding met de database maken

$geslacht1 = $_POST["geslacht1"];
$relatie = $_POST["relatie"];
$persoon_id = $_POST["persoon_id"];
$partner_id = $_POST["partner_id"];
$geslacht = $_POST["geslacht"];
$voornaam = $_POST["voornaam"];
$tweedenaam = $_POST["tweedenaam"];
$derdenaam = $_POST["derdenaam"];
$voorvoegsel_achternaam = $_POST["voorvoegsel_achternaam"];
$achternaam = $_POST["achternaam"];
$voorvoegsel_meisjesnaam = $_POST["voorvoegsel_meisjesnaam"];
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

if ($_POST["geslacht"] == 'man') {
	$_POST["persoon_id"] = 1;
	$_POST["partner_id"] = 2;
}
elseif ($_POST["geslacht"] == 'vrouw'){
			$_POST["persoon_id"] = 2;
			$_POST["partner_id"] = 1;
}
else {
	echo "Fout! Geslacht niet goed ingevuld!";
}

$db = new mysqli('localhost', 'root', '', 'stamboom'); // met new maken we een nieuw object dat de verbinding met de database heeft, en veel meer
if ($db->connect_errno > 0) { // het object houdt zijn eigen fouten bij in de property connect_errno
	echo 'Fout! : ' . $db->connect_error;
}
if (($_POST["geslacht"] == 'man' || $_POST["geslacht"] == 'vrouw' || $_POST["geslacht"] == 'onbekend') && $_POST["voornaam"] != '' && ($_POST["achternaam"] != '' || $_POST["meisjesnaam"] != '') ){
	$sql ="INSERT INTO `personenregister` (  `persoon_id` , `partner_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` , `partner1` , `huwlijksdatum1` , `partner2` , `huwlijksdatum2` , `partner3` , `huwlijksdatum3` , `vader` , `moeder` , `broerzus1` , `broerzus2` )
	VALUES (
	 '".$_POST["persoon_id"]."', '".$_POST["partner_id"]."', '".$_POST["geslacht"]."', '".$_POST["voornaam"]."', '".$_POST["tweedenaam"]."', '".$_POST["derdenaam"]."', '".$_POST["voorvoegsel_achternaam"]."', '".$_POST["achternaam"]."', '".$_POST["voorvoegsel_meisjesnaam"]."', '".$_POST["meisjesnaam"]."', '".$_POST["geboortedatum"]."', '".$_POST["doopdatum"]."', '".$_POST["geboorteplaats"]."', '".$_POST["doopplaats"]."', '".$_POST["sterfdatum"]."', '".$_POST["sterfplaats"]."', '".$_POST["beroep1"]."', '".$_POST["beroep2"]."', '".$_POST["beroep3"]."', '".$_POST["opmerking1"]."', '".$_POST["opmerking2"]."', '".$_POST["documentatie1"]."', '".$_POST["documentatie2"]."', '".$_POST["foto1"]."', '".$_POST["partner1"]."', '".$_POST["huwlijksdatum1"]."', '".$_POST["partner2"]."', '".$_POST["huwlijksdatum2"]."', '".$_POST["partner3"]."', '".$_POST["huwlijksdatum3"]."', '".$_POST["vader"]."', '".$_POST["moeder"]."', '".$_POST["broerzus1"]."', '".$_POST["broerzus2"]."'
	);"; //bereidt de query voor
}
$resultaat = $db->query($sql);
if (!$resultaat) { // als geen resource, fout weergeven
		echo $db->error . "<br/>" ; // foutmelding van db weergeven. de foutmelding staat in property error
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
<div id="main_container" >
	<div id="header_container" >
		<img src="<?php echo $path; ?>/img/BAFWARE.gif" alt="logo" title="BAFWARE"  width="500px" align="center"/>
	</div>
	<div id="input_container" >
		<div width="100%" >
			<table width="100%" border="1" cellpadding="2" cellspacing="3" >
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
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/PT4.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="15%" align="right" >
								<B>Persoon 1:</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="5%" align="left" >
						<?php echo $geslacht; ?>
					</td>
					<td align="right" width="15%">
						<p><B>Persoon 2:</B>(*) Relatie tov eerste :<br/>(*) Geslacht:</p>
					</td>
					<td align="left" width="10%">
						<select name="relatie">
							<option value=""></option>
							<option value="partner">partner</option>
							<option value="broer">broer</option>
							<option value="zus">zus</option>
						</select><br/>
						<select name="geslacht1">
							<option value=""></option>
							<option value="man">man</option>
							<option value="vrouw">vrouw</option>
							<option value="onbekend">onbekend</option>
						</select>
					</td>
					<td colspan="0" width="50%" align="center" valign="center">
						<p><H3> <?php echo $voornaam; ?> <?php echo $tweedenaam; ?> <?php echo $derdenaam; ?> <?php echo $tussenvoegsel; ?> <?php echo $achternaam; ?> - <?php echo $meisjesnaam; ?>
								</H3></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td align="left" >
						<?php echo $voornaam; ?>
					</td>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td>
						<input type="text" name="voornaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td align="left" >
						<?php echo $tweedenaam; ?>
					</td>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td>
						<input type="text" name="tweedenaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td align="left" >
						<?php echo $derdenaam; ?>
					</td>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td>
						<input type="text" name="derdenaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_achternaam; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td>
						<input type="text" name="voorvoegsel_achternaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td align="left" >
						<?php echo $achternaam; ?>
					</td>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td>
						<input type="text" name="achternaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td align="left" >
						<?php echo $voorvoegsel_meisjesnaam; ?>
					</td>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td>
						<input type="text" name="voorvoegsel_meisjesnaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td align="left" >
						<?php echo $meisjesnaam; ?>
					</td>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td>
						<input type="text" name="meisjesnaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td align="left" >
						<?php echo $geboortedatum; ?>
					</td>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td>
						<input type="text" name="geboortedatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td align="left" >
						<?php echo $doopdatum; ?>
					</td>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td>
						<input type="text" name="doopdatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td align="left" >
						<?php echo $geboorteplaats; ?>
					</td>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td>
						<input type="text" name="geboorteplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td align="left" >
						<?php echo $doopplaats; ?>
					</td>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td>
						<input type="text" name="doopplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td align="left" >
						<?php echo $sterfdatum; ?>
					</td>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td>
						<input type="text" name="sterfdatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td align="left" >
						<?php echo $sterfplaats; ?>
					</td>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td>
						<input type="text" name="sterfplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep1; ?>
					</td>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td>
						<input type="text" name="beroep1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep2; ?>
					</td>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td>
						<input type="text" name="beroep2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td align="left" >
						<?php echo $beroep3; ?>
					</td>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td>
						<input type="text" name="beroep3" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td align="left" >
						<?php echo $opmerking1; ?>
					</td>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td>
						<input type="text" name="opmerking1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td align="left" >
						<?php echo $opmerking2; ?>
					</td>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td>
						<input type="text" name="opmerking2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td align="left" >
						<?php echo $documentatie1; ?>
					</td>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td>
						<input type="text" name="documentatie1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td align="left" >
						<?php echo $documentatie2; ?>
					</td>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td>
						<input type="text" name="documentatie2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td align="left" >
						<?php echo $foto1; ?>
					</td>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td>
						<input type="text" name="foto1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td align="left" >
						<?php echo $partner1; ?>
					</td>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td>
						<input type="text" name="partner1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum1; ?>
					</td>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td>
						<input type="text" name="huwlijksdatum1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td align="left" >
						<?php echo $partner2; ?>
					</td>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td>
						<input type="text" name="partner2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 2 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum2; ?>
					</td>
					<td align="right" >
						<p>Huwelijksadtum 2 :</p>
					</td>
					<td>
						<input type="text" name="huwlijksdatum2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td align="left" >
						<?php echo $partner3; ?>
					</td>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td>
						<input type="text" name="partner3" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td align="left" >
						<?php echo $huwlijksdatum3; ?>
					</td>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td>
						<input type="text" name="huwlijksdatum3" value=""/>
					</td>
					<td align="left" width="5%"  >
						<input type="submit" name="Toevoegen" value="toevoegen"  /><br/>
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
