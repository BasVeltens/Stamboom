<?php
require_once('../dbconfigStamboom.php'); //verbinding met de database maken

$db = new mysqli('localhost', 'root', '', 'stamboom'); // met new maken we een nieuw object dat de verbinding met de database heeft, en veel meer
if ($db->connect_errno > 0) { // het object houdt zijn eigen fouten bij in de property connect_errno
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_achternaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_auto_id` = 1"; //bereid de query voor
$resultaat2 = $db->query($sql); // hetzelfde idee, maar nu wordt op het object $db de functie ->query() uitgevoerd. resultaat is weer data-resource of niets.
if (!$resultaat2) {//als geen resource, fout weergeven
	echo "Geen resultaat gevonden voor 'persoon_id' waar 'persoon_auto_id = 1 ': " . $db->error . "<br/>"; // foutmelding van db weergeven. de foutmelding staat in property error
}
while($row = $resultaat2->fetch_assoc()){
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
		<img src="<?php echo $path; ?>/img/BAFWARE.gif" alt="logo" title="BAFWARE"  width="500px" align="center"/>
	</div>
	<div id="input_container" >
		<div width="100%" >
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
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/PT5.php" method="post">
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
		<div id="footer_container" >
			<a href="<?php echo $path; ?>/stamboom.php">terug</a>
		</div>
	</div>
</div>
</body> 
</html> 
