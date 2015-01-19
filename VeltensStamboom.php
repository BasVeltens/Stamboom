<?php
require_once('dbconfigStamboom.php'); 

$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}

$sql = "SELECT `persoon_id` , `partner_id` , `partnerschap_id` , `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `opmerking1` = 'veltensstamboom' 
";
$resultaat = $db->query($sql);
if (!$resultaat) {
	echo " fout: " . $db->error . "<br/>";
}
while($row = $resultaat->fetch_assoc()){ // data binnenhalen voor het onderwerp
		$persoon_id = $row['persoon_id'];
		$partner_id = $row['partner_id'];
		$partnerschap_id = $row['partnerschap_id'];
		$geslacht = $row['geslacht'];
		$voornaam = $row['voornaam'];
		$tweedenaam = $row['tweedenaam'];
		$derdenaam = $row['derdenaam'];
		$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];
}

$sql1 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $partner_id '
";
$resultaat1 = $db->query($sql1); // gegevens van partner uitlezen
if (!$resultaat1) {
	echo "fout: " . $db->error . "<br/>"; 
}

while($row = $resultaat1->fetch_assoc()){ // data binnenhalen voor de partner van het onderwerp
		$geslacht_relatie = $row['geslacht'];
		$voornaam_relatie = $row['voornaam'];
		$tweedenaam_relatie = $row['tweedenaam'];
		$derdenaam_relatie = $row['derdenaam'];
		$voorvoegsel_achternaam_relatie = $row['voorvoegsel_achternaam'];
		$achternaam_relatie= $row['achternaam'];
		$voorvoegsel_meisjesnaam_relatie = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_relatie = $row['meisjesnaam'];
}

$sql2 = "SELECT `ouder_id`
FROM `personenregister`
WHERE `persoon_id` = ' $persoon_id '
";
$resultaat2 = $db->query($sql2); // ouder_id van vader uitlezen
if (!$resultaat2) {
	echo "fout: " . $db->error . "<br/>"; 
}
$vadersPartnerschap_id = $row['ouder_id'];
while($row = $resultaat2->fetch_assoc()){
		$vadersPartnerschap_id = $row['ouder_id'];
}
$sql3 = "SELECT `partner1_id`
FROM `partnerschap`
WHERE `partnerschap_id` = ' $vadersPartnerschap_id '
";
$resultaat3 = $db->query($sql3); // partner1_id (ofwel persoon_id) van vader uitlezen (in deze WHERE moet nog komen: of partner2_id)
if (!$resultaat3) {
	echo "fout: " . $db->error . "<br/>"; 
}
$vaders_id = $row['partner1_id'];
while($row = $resultaat3->fetch_assoc()){ // ouder_id binnenhalen voor de vader van het onderwerp
		$vaders_id = $row['partner1_id'];
}
$sql4 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $vaders_id '
";
$resultaat4 = $db->query($sql4); // gegevens van vader uitlezen
if (!$resultaat4) {
	echo "fout: " . $db->error . "<br/>"; 
}

while($row = $resultaat4->fetch_assoc()){ // data binnenhalen voor de vader van het onderwerp
		$geslacht_vader = $row['geslacht'];
		$voornaam_vader = $row['voornaam'];
		$tweedenaam_vader = $row['tweedenaam'];
		$derdenaam_vader = $row['derdenaam'];
		$voorvoegsel_achternaam_vader = $row['voorvoegsel_achternaam'];
		$achternaam_vader= $row['achternaam'];
		$voorvoegsel_meisjesnaam_vader = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_vader = $row['meisjesnaam'];
}
$sql5 = "SELECT `partner2_id`
FROM `partnerschap`
WHERE `partnerschap_id` = ' $vadersPartnerschap_id '
";
$resultaat5 = $db->query($sql5); // partner1_id (ofwel persoon_id) van moeder uitlezen (in deze WHERE moet nog komen: of partner2_id)
if (!$resultaat5) {
	echo "fout: " . $db->error . "<br/>"; 
}
$moeders_id = $row['partner2_id'];
while($row = $resultaat5->fetch_assoc()){ // ouder_id binnenhalen voor de moeder van het onderwerp
		$moeders_id = $row['partner2_id'];
}
$sql6 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $moeders_id '
";
$resultaat6 = $db->query($sql6); // gegevens van moeder uitlezen
if (!$resultaat6) {
	echo "fout: " . $db->error . "<br/>"; 
}

while($row = $resultaat6->fetch_assoc()){ // data binnenhalen voor de moeder van het onderwerp
		$geslacht_moeder = $row['geslacht'];
		$voornaam_moeder = $row['voornaam'];
		$tweedenaam_moeder = $row['tweedenaam'];
		$derdenaam_moeder = $row['derdenaam'];
		$voorvoegsel_achternaam_moeder = $row['voorvoegsel_achternaam'];
		$achternaam_moeder= $row['achternaam'];
		$voorvoegsel_meisjesnaam_moeder = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_moeder = $row['meisjesnaam'];
}

$sql = "SELECT *
FROM `kinderen`
WHERE `kinderen_id` = ' ".$partnerschap_id. " '
ORDER BY `persoon_id` ASC
LIMIT 1
";// hier moet een auto-doortel-dinges komen zodat er geen max zit aan het aantal kinderen
$resultaat = $db->query($sql);
if (!$resultaat) { 
	echo "Fout : " . $db->error . "<br/>";
}
while($row = $resultaat->fetch_assoc()){
	$kind1_id = $row['persoon_id'];
}
$sql1 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $kind1_id '
";
$resultaat1 = $db->query($sql1); // gegevens van kind1 uitlezen
if (!$resultaat1) {
	echo "fout: " . $db->error . "<br/>"; 
}
while($row = $resultaat1->fetch_assoc()){ // data binnenhalen voor de kind1 van het onderwerp
		$geslacht_kind1 = $row['geslacht'];
		$voornaam_kind1 = $row['voornaam'];
		$tweedenaam_kind1 = $row['tweedenaam'];
		$derdenaam_kind1 = $row['derdenaam'];
		$voorvoegsel_achternaam_kind1 = $row['voorvoegsel_achternaam'];
		$achternaam_kind1= $row['achternaam'];
		$voorvoegsel_meisjesnaam_kind1 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_kind1 = $row['meisjesnaam'];
}

$sql2 = "SELECT *
FROM `kinderen`
WHERE `kinderen_id` = ' ".$partnerschap_id. " '
ORDER BY `persoon_id` ASC
LIMIT 2
";// hier moet een auto-doortel-dinges komen zodat er geen max zit aan het aantal kinderen
$resultaat2 = $db->query($sql2);
if (!$resultaat2) { 
	echo "Fout : " . $db->error . "<br/>";
}
while($row = $resultaat2->fetch_assoc()){
	$kind2_id = $row['persoon_id'];
}
$sql3 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $kind2_id '
";
$resultaat3 = $db->query($sql3); // gegevens van kind2 uitlezen
if (!$resultaat3) {
	echo "fout: " . $db->error . "<br/>"; 
}
while($row = $resultaat3->fetch_assoc()){ // data binnenhalen voor de kind2 van het onderwerp
		$geslacht_kind2 = $row['geslacht'];
		$voornaam_kind2 = $row['voornaam'];
		$tweedenaam_kind2 = $row['tweedenaam'];
		$derdenaam_kind2 = $row['derdenaam'];
		$voorvoegsel_achternaam_kind2 = $row['voorvoegsel_achternaam'];
		$achternaam_kind2 = $row['achternaam'];
		$voorvoegsel_meisjesnaam_kind2 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_kind2 = $row['meisjesnaam'];
}

$sql4 = "SELECT *
FROM `kinderen`
WHERE `kinderen_id` = ' ".$partnerschap_id. " '
ORDER BY `persoon_id` ASC
LIMIT 3
";// hier moet een auto-doortel-dinges komen zodat er geen max zit aan het aantal kinderen
$resultaat4 = $db->query($sql4);
if (!$resultaat4) { 
	echo "Fout : " . $db->error . "<br/>";
}
while($row = $resultaat4->fetch_assoc()){
	$kind3_id = $row['persoon_id'];
}
$sql5 = "SELECT `geslacht` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = ' $kind3_id '
";
$resultaat5 = $db->query($sql5); // gegevens van kind3 uitlezen
if (!$resultaat5) {
	echo "fout: " . $db->error . "<br/>"; 
}
while($row = $resultaat5->fetch_assoc()){ // data binnenhalen voor de kind3 van het onderwerp
		$geslacht_kind3 = $row['geslacht'];
		$voornaam_kind3 = $row['voornaam'];
		$tweedenaam_kind3 = $row['tweedenaam'];
		$derdenaam_kind3 = $row['derdenaam'];
		$voorvoegsel_achternaam_kind3 = $row['voorvoegsel_achternaam'];
		$achternaam_kind3 = $row['achternaam'];
		$voorvoegsel_meisjesnaam_kind3 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_kind3 = $row['meisjesnaam'];
}

?>

<html> 
<head> 
	<title>Veltens stamboom</title> 
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
	<div id="input_container">
		<div width="100%">
			<table width="100%" border="1" cellspacing="3" cellpadding="1">
				<tr> 
					<td width="10%" bgcolor="#C5CED3"><a href="<?php echo $path; ?>/stamboom.php">home</a></td>
					<td width="10%" bgcolor="#D6DDE0"><a href="<?php echo $path; ?>/NieuweStamboom/NS1.php">persoon toevoegen/wijzigen</a></td> 
					<td width="10%" bgcolor="#E6EAEC"></td>
					<td width="10%" bgcolor="#EDEEF1"></td> 
					<td width="10%" bgcolor="#F4F5F7">Veltens stamboom</td>
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
		</div>
		<div id="stamboom_container" >
			<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
				<tr>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>Veltens stamboom</H3></p>
					</td>
				</tr>
			</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_kind1; ?>" >
					<p>onderwerp's 1ste kind:</p>
					<p><H3><?php echo $voornaam_kind1; ?> <?php echo $tweedenaam_kind1; ?></H3></p>
					<p><H3><?php echo $derdenaam_kind1; ?> <?php echo $voorvoegsel_achternaam_kind1; ?></H3></p>
					<p><H3><?php echo $achternaam_kind1; ?> - <?php echo $voorvoegsel_meisjesnaam_kind1; ?> <?php echo $meisjesnaam_kind1; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_vader; ?>" >
					<p>onderwerp's pappa:</p>
					<p><H3><?php echo $voornaam_vader; ?> <?php echo $tweedenaam_vader; ?></H3></p>
					<p><H3><?php echo $derdenaam_vader; ?> <?php echo $voorvoegsel_achternaam_vader; ?></H3></p>
					<p><H3><?php echo $achternaam_vader; ?> - <?php echo $voorvoegsel_meisjesnaam_vader; ?> <?php echo $meisjesnaam_vader; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_kind2; ?>" >
					<p>onderwerp's 2de kind:</p>
					<p><H3><?php echo $voornaam_kind2; ?> <?php echo $tweedenaam_kind2; ?></H3></p>
					<p><H3><?php echo $derdenaam_kind2; ?> <?php echo $voorvoegsel_achternaam_kind2; ?></H3></p>
					<p><H3><?php echo $achternaam_kind2; ?> - <?php echo $voorvoegsel_meisjesnaam_kind2; ?> <?php echo $meisjesnaam_kind2; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht; ?>" >
					<p>onderwerp:</p>
					<p><H3><?php echo $voornaam; ?> <?php echo $tweedenaam; ?></H3></p>
					<p><H3><?php echo $derdenaam; ?> <?php echo $voorvoegsel_achternaam; ?></H3></p>
					<p><H3><?php echo $achternaam; ?> - <?php echo $voorvoegsel_meisjesnaam; ?> <?php echo $meisjesnaam; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_moeder; ?>" >
					<p>onderwerp's moeder:</p>
					<p><H3><?php echo $voornaam_moeder; ?> <?php echo $tweedenaam_moeder; ?></H3></p>
					<p><H3><?php echo $derdenaam_moeder; ?> <?php echo $voorvoegsel_achternaam_vader; ?></H3></p>
					<p><H3><?php echo $achternaam_vader; ?> - <?php echo $voorvoegsel_meisjesnaam_moeder; ?> <?php echo $meisjesnaam_moeder; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_kind3; ?>" >
					<p>onderwerp's 3de kind:</p>
					<p><H3><?php echo $voornaam_kind3; ?> <?php echo $tweedenaam_kind3; ?></H3></p>
					<p><H3><?php echo $derdenaam_kind3; ?> <?php echo $voorvoegsel_achternaam_kind3; ?></H3></p>
					<p><H3><?php echo $achternaam_kind3; ?> - <?php echo $voorvoegsel_meisjesnaam_kind3; ?> <?php echo $meisjesnaam_kind3; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<div id="geslacht_<?php echo $geslacht_relatie; ?>" >
					<p>onderwerp's relatie:</p>
					<p><H3><?php echo $voornaam_relatie; ?> <?php echo $tweedenaam_relatie; ?></H3></p>
					<p><H3><?php echo $derdenaam_relatie; ?> <?php echo $voorvoegsel_achternaam; ?></H3></p>
					<p><H3><?php echo $achternaam; ?> - <?php echo $voorvoegsel_meisjesnaam_relatie; ?> <?php echo $meisjesnaam_relatie; ?></H3></p>
					</div>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p>onderwerp's relatie's vader:</p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p>onderwerp's relatie's moeder:</p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H5>Veltens stamboom</H5></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
		<table width="100%" border="1" cellspacing="2" cellpadding="3" rowspan="7">
			<tr>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
				<td colspan="1" width="1/7" align="center" >
					<p><H3>Veltens stamboom</H3></p>
				</td>
			</tr>
		</table>
	</div>
</div>
<div id="footer_container">
	<a href="<?php echo $path; ?>/../">terug</a>
</div>
</div>
</body> 
</html> 
