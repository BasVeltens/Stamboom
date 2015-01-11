<?php
require_once('dbconfigStamboom.php'); 

$db = new mysqli('localhost', 'root', '', 'stamboom'); 
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `opmerking1` = 'veltensstamboom' 
"; //bereid de query voor
$resultaat = $db->query($sql);
if (!$resultaat) {
	echo " fout: " . $db->error . "<br/>";
}
while($row = $resultaat->fetch_assoc()){ // data binnenhalen voor het onderwerp
		$persoon_id = $row['persoon_id'];
		$partner_id = $row['partner_id'];
		$voornaam = $row['voornaam'];
		$tweedenaam = $row['tweedenaam'];
		$derdenaam = $row['derdenaam'];
		$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];
}

$sql1 = "SELECT `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '2'
"; // ik smokkel hier nog met die 2. ik krijg het niet voor elkaar hier een variabele te maken die $partner_id van bovenstaande vangt
$resultaat1 = $db->query($sql1);
if (!$resultaat1) {
	echo "fout: " . $db->error . "<br/>"; 
}
$voornaam_relatie = $row['voornaam'];
$tweedenaam_relatie = $row['tweedenaam'];
$derdenaam_relatie = $row['derdenaam'];
$voorvoegsel_achternaam_relatie = $row['voorvoegsel_achternaam'];
$achternaam_relatie= $row['achternaam'];
$voorvoegsel_meisjesnaam_relatie = $row['voorvoegsel_meisjesnaam'];
$meisjesnaam_relatie = $row['meisjesnaam'];

while($row = $resultaat1->fetch_assoc()){ // data binnenhalen voor de relatie van het onderwerp
		$voornaam_relatie = $row['voornaam'];
		$tweedenaam_relatie = $row['tweedenaam'];
		$derdenaam_relatie = $row['derdenaam'];
		$voorvoegsel_achternaam_relatie = $row['voorvoegsel_achternaam'];
		$achternaam_relatie= $row['achternaam'];
		$voorvoegsel_meisjesnaam_relatie = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam_relatie = $row['meisjesnaam'];
}
?>

<html> 
<head> 
	<title>Stamboom</title> 
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
			<table width="100%" border="1" cellspacing="2" cellpadding="3" >
				<tr> 
					<td width="10%" bgcolor="#C5CED3">home</td>
					<td width="10%" bgcolor="#D6DDE0"><a href="<?php echo $path; ?>/NieuweStamboom/PT1.php">persoon toevoegen/wijzigen</a></td> 
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
						<p><H3>$onderwerp's mamma</H3></p>
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
						<p><H5>$pappa's relatie</H5></p>
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
						<p>onderwerp:</p>
						<p><H3><?php echo $voornaam; ?> <?php echo $tweedenaam; ?></H3></p>
						<p><H3><?php echo $derdenaam; ?> <?php echo $voorvoegsel_achternaam; ?></H3></p>
						<p><H3><?php echo $achternaam; ?> - <?php echo $voorvoegsel_meisjesnaam; ?> <?php echo $meisjesnaam; ?></H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>$onderwerp's pappa</H3></p>
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
						<p>onderwerp's relatie:</p>
						<p><H3><?php echo $voornaam_relatie; ?> <?php echo $tweedenaam_relatie; ?></H3></p>
						<p><H3><?php echo $derdenaam_relatie; ?> <?php echo $voorvoegsel_achternaam_relatie; ?></H3></p>
						<p><H3><?php echo $achternaam_relatie; ?> - <?php echo $voorvoegsel_meisjesnaam_relatie; ?> <?php echo $meisjesnaam_relatie; ?></H3></p>
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
						<p><H3>Veltens stamboom</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>$onderwerp's partner</H3></p>
					</td>
					<td colspan="1" width="1/7" align="center" >
						<p><H3>$partner's pappa</H3></p>
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
						<p><H5>$partner's pappa's relatie</H5></p>
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
					<p><H3>$partner's mamma</H3></p>
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
	<div id="footer_container" >
		<a href="<?php echo $path; ?>/../">terug</a>
	</div>
</div>
</body> 
</html> 
