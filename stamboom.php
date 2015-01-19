<?php
require_once('dbconfigStamboom.php'); 

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
					<td width="10%" bgcolor="#C5CED3">home</td>
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
		</div>
		<div id="stamboom_container">
<B>Vraagjes aan de professor:</B><br/><br/>

- bij de aanmaak van een nieuwe stamboom moet ik een nieuwe db met tabellen maken. ik weet niet hoe<br/>
- bij het uitlezen van een onbekent aantal waardes heb ik een "auto-naampjes-doortel-dinges" nodig. geen idee hoe.<br/>
- hoe include ik een file zonder dat ik m'n post of variabelen verlies? lukt nog steeds niet<br/>
- hoe doe ik die structuur van cellen zoals in "VeltensStamboom.php" met divjes ipv tables. (het naast elkaar zetten bijv.)<br/><br/><br/>

<B>To do:</B><br/><br/>
- alles waar je onbekent aantal doortelt en wat nu max 3 is<br/>
	- lijst met personen die familie kunnen zijn<br/>
	- kinderen in de stamboom<br/>
	- bij "nieuwe stamboom" dus een nieuwe db aanmaken<br/>
	- maak "nummereringslogica" ff af<br/>
	- bij het toevoegen van personen (overal waar dat zo is) moet bij de bevestiging de gegevens opnieuw worden ingevoerd, de contole is nu voor niets<br/>
	
		</div>
	</div>
	<div id="footer_container">
		<a href="<?php echo $path; ?>/../">terug</a>
	</div>
</div>
</body> 
</html> 
