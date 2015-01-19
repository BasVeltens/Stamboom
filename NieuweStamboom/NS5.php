<?php
require_once('../dbconfigStamboom.php');

$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}

$sql = "SELECT `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_achternaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = 1";
$resultaat2 = $db->query($sql); // gegevens voor weergave uit db lezen
if (!$resultaat2) {
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>";
}
while($row = $resultaat2->fetch_assoc()){ // gegevens van eerste persoon inladen
		$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];

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
	</iv>
	<div id="input_container">
		<div width="100%" >
			<table width="100%" border="1" cellpadding="3" cellspacing="1">
				<tr> 
					<td width="10%" bgcolor="#C5CED3"><a href="<?php echo $path; ?>/stamboom.php">home</a></td>
					<td width="10%" bgcolor="#D6DDE0"><a href="<?php echo $path; ?>/NieuweStamboom/NS1.php">persoon toevoegen/wijzigen</a></td> 
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
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/NS5.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="right" >
					</td>
					<td colspan="0" width="5%" align="left" >
					</td>
					<td align="right" width="25%">
						<p><B>Stamboom van fam. <?php echo $voorvoegsel_achternaam; ?> <?php echo $achternaam; ?> - <?php echo $voorvoegsel_meisjesnaam; ?> <?php echo $meisjesnaam; ?> is succesvol aangemaakt.</B></p>
						<a href="<?php echo $path; ?>/stamboom.php"><H3>Laat stamboom zien</H3></a>
					</td>
					<td align="left" width="10%">
							<?php echo $_POST["relatie"]; ?><br/>
							<?php echo $_POST["geslacht"]; ?>
					</td>
					<td colspan="0" width="40%" align="center" valign="center">
							
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
