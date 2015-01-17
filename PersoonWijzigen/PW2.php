<?php
require_once('../dbconfigStamboom.php');

$bewerkPersoon_id = $_POST["persoonkeuze"];

$db = new mysqli('localhost', 'baf', 'plop0999', 'stamboom');
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `partner_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam`  , `voorvoegsel_meisjesnaam`, `meisjesnaam` , `geboortedatum` , `doopdatum` , `geboorteplaats` , `doopplaats` , `sterfdatum` , `sterfplaats` , `beroep1` , `beroep2` , `beroep3` , `opmerking1` , `opmerking2` , `documentatie1` , `documentatie2` , `foto1` , `partner1` , `huwlijksdatum1` , `partner2` , `huwlijksdatum2` , `partner3` , `huwlijksdatum3`
	FROM `personenregister`
	WHERE `persoon_id` = $bewerkPersoon_id";

$resultaat = $db->query($sql);
if (!$resultaat) {
	echo "Fout: ': " . $db->error . "<br/>";
	//eigenlijk zou je nu moeten stoppen...
}
$persoon = array(); //nu definieer ik hem wel eerst, zodat hij in ieder geval bestaat als ik het uitlees
while($row = $resultaat->fetch_assoc()){
	$persoon = $row;
	break; //whlie loop sowieso stoppen, want maar 1 persoon
}
$partner_id = $persoon['partner_id'];
if ($partner_id != 0){ // selecteer gegevens van partner als die niet leeg is
	//de variabele $row is hier de persoon zelf, niet de partner
//	$partner_idPartner = $row['partner_id'];
//	$geslachtPartner = $row['geslacht'];
//	$voornaamPartner = $row['voornaam'];
//	$tweedenaamPartner = $row['tweedenaam'];
//	$derdenaamPartner = $row['derdenaam'];
//	$voorvoegsel_achternaamPartner = $row['voorvoegsel_achternaam'];
//	$achternaamPartner = $row['achternaam'];
//	$voorvoegsel_meisjesnaamPartner = $row['voorvoegsel_meisjesnaam'];
//	$meisjesnaamPartner = $row['meisjesnaam'];
	
	$sql1 = "SELECT `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam`  , `voorvoegsel_meisjesnaam`, `meisjesnaam`
	FROM `personenregister`
	WHERE `persoon_id` = $partner_id"; 
	$resultaat1 = $db->query($sql1); 
	if (!$resultaat1) {
		echo "Fout: ': " . $db->error . "<br/>"; 
	}
	while($row = $resultaat1->fetch_assoc()){
		$partner = $row;
		break;
	}
}

?>

<html> 
<head> 
	<title>Persoon wijzigen</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>../img/ZwitsalBasje.jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<link rel="stylesheet" href="<?php echo $path; ?>../css/style.css" type="text/css" />
</head> 
<body>
<div id="main_container" >
	<div id="header_container" >
		<img src="<?php echo $path; ?>../img/Veltens.png" alt="logo" title="Veltens"  width="96px" align="center"/>
		<img src="<?php echo $path; ?>../img/BAFWARE.png" alt="logo" title="BAFWARE"  width="500px" align="center"/>
		<img src="<?php echo $path; ?>../img/ZwitsalBasje.jpg" alt="logo" title="ZwitsalBasje.jpg"  width="96px" align="center"/>
	</div>
	<div id="input_container" >
		<div width="100%" >
			<table width="100%" border="1" cellpadding="3" cellspacing="1">
				<tr> 
					<td width="10%" bgcolor="#C5CED3"><a href="<?php echo $path; ?>/stamboom.php">home</a></td>
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
			<form name="input" action="<?php echo $path; ?>/PersoonWijzigen/PW3.php" method="post">
			<input type="hidden" name="persoonkeuzeDoorgeven" value="<?php echo $_POST["persoonkeuze"]; ?>"/>
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="right" >
								<B>Huidige gegevens :</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="5%" align="left" >
						<p><input type="text" name="geslacht" value="<?php echo $persoon['geslacht']; ?>"/></p>
					</td>
					<td colspan="0" width="50%" align="center" valign="center">
						<p><H3> <?php echo $persoon['voornaam']; ?> <?php echo $persoon['tweedenaam']; ?> <?php echo $persoon['derdenaam']; ?> <?php echo $persoon['voorvoegsel_achternaam']; ?> <?php echo $persoon['achternaam']; ?> - <?php echo $persoon['voorvoegsel_meisjesnaam']; ?> <?php echo $persoon['meisjesnaam']; ?></H3></p>
						<p>partner van :</p>		
						<p><H3> <?php echo $partner['voornaam']; ?> <?php echo $partner['tweedenaam']; ?> <?php echo $partner['derdenaam']; ?> <?php echo $partner['voorvoegsel_achternaam']; ?> <?php echo $partner['achternaam']; ?> - <?php echo $partner['voorvoegsel_meisjesnaam']; ?> <?php echo $partner['meisjesnaam']; ?></H3></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="voornaam" value="<?php echo $persoon['voornaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td align="left" >
						<input type="text" name="tweedenaam" value="<?php echo $persoon['tweedenaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td align="left" >
						<input type="text" name="derdenaam" value="<?php echo $persoon['derdenaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td align="left" >
					<input type="text" name="voorvoegsel_achternaam" value="<?php echo $persoon['voorvoegsel_achternaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="achternaam" value="<?php echo $persoon['achternaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="voorvoegsel_meisjesnaam" value="<?php echo $persoon['voorvoegsel_meisjesnaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="meisjesnaam" value="<?php echo $persoon['meisjesnaam']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="geboortedatum" value="<?php echo $persoon['geboortedatum']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="doopdatum" value="<?php echo $persoon['doopdatum']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="geboorteplaats" value="<?php echo $persoon['geboorteplaats']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="doopplaats" value="<?php echo $persoon['doopplaats']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="sterfdatum" value="<?php echo $persoon['sterfdatum']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="sterfplaats" value="<?php echo $persoon['sterfplaats']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep1" value="<?php echo $persoon['beroep1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep2" value="<?php echo $persoon['beroep2']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep3" value="<?php echo $persoon['beroep3']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="opmerking1" value="<?php echo $persoon['opmerking1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="opmerking2" value="<?php echo $persoon['opmerking2']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="documentatie2" value="<?php echo $persoon['documentatie1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="documentatie2" value="<?php echo $persoon['documentatie2']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="foto1" value="<?php echo $persoon['foto1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner1" value="<?php echo $persoon['partner1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum1" value="<?php echo $persoon['huwlijksdatum1']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner2" value="<?php echo $persoon['partner2']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum2" value="<?php echo $persoon['huwlijksdatum2']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner3" value="<?php echo $persoon['partner3']; ?>"/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum3" value="<?php echo $persoon['huwlijksdatum3']; ?>"/>
					</td>
					<td align="left" >
						<input type="submit" name="Wijzigen" value="wijzigen" /><br/>
					</td>
					<td align="left" width="5%" >
						
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
