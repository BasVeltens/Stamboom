<?php
require_once('../dbconfigStamboom.php');

$soort = $_POST["soort"];

if ($soort == "nieuw"){ // het "personenregister" moet hernoemt naar "veltens" en de aanmaak van een nieuwe db met naam ($achternaam) moet gemaakt
	header('Location:  NS2.php');
	exit();
}
if ($soort == "toevoegen"){ // verwijziging naar "persoon toevoegen aan bestaande stamboom"
	header('Location:  ../PersoonToevoegen/PT1.php');
	exit();
}
if ($soort == "wijzigen"){ // verwijziging naar "persoon wijzigen"
	header('Location:  ../PersoonWijzigen/PW1.php');
	exit();
}

?>

<html> 
<head> 
	<title>Stamboom wijzigen</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>/img/ZwitsalBasje.jpg" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
	<link rel="stylesheet" href="<?php echo $path; ?>/css/style.css" type="text/css" />
</head> 
<body>
<div id="main_container">
	<div id="header_container">
		<img src="<?php echo $path; ?>../img/Veltens.png" alt="logo" title="Veltens"  width="96px" align="center"/>
		<img src="<?php echo $path; ?>../img/BAFWARE.png" alt="logo" title="BAFWARE"  width="500px" align="center"/>
		<img src="<?php echo $path; ?>../img/ZwitsalBasje.jpg" alt="logo" title="ZwitsalBasje.jpg"  width="96px" align="center"/>
	</div>
	<div id="input_container">
		<div width="100%">
			<table width="100%" border="1" cellspacing="3" cellpadding="1" >
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
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/NS1.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="2" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="left" >
						<p><B>Maak een keuze: </B> <select name="soort">
																	<option value=""></option>
																	<option value="wijzigen">gegevens van een bestaande persoon wijzigen</option>
																	<option value="toevoegen">nieuwe persoon toevoegen aan een bestaande stamboom</option>
																	<option value="nieuw">nieuwe stamboom maken</option>
																</select> 
						<input type="submit" name="Selecteren" value="kiezen"  /><br/>
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
