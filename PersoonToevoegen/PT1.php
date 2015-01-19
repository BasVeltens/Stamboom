<?php
require_once('../dbconfigStamboom.php');

$db = new mysqli($dbConfig['dbhost'], $dbConfig['dbuser'], $dbConfig['dbpass'], $dbConfig['dbname']);
if ($db->connect_errno > 0) {
	echo 'Fout! : ' . $db->connect_error;
}
$sql = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '1' 
"; 
$resultaat = $db->query($sql);
if (!$resultaat) { // hoe vraag ik deze en onderstaande queries in 1x? het mooiste is een "auto aanvul - zoekdingetje" in ajax (?)
	echo "Fout: ': " . $db->error . "<br/>";
}
while($row = $resultaat->fetch_assoc()){
		$persoonkeuze = $row['persoon_id'];
		$voornaam = $row['voornaam'];
		$tweedenaam = $row['tweedenaam'];
		$derdenaam = $row['derdenaam'];
		$voorvoegsel_achternaam = $row['voorvoegsel_achternaam'];
		$achternaam = $row['achternaam'];
		$voorvoegsel_meisjesnaam = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam = $row['meisjesnaam'];
}

$sql1 = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '2' 
";
$resultaat1 = $db->query($sql1); 
if (!$resultaat1) {
	echo "Fout: ': " . $db->error . "<br/>"; 
}
while($row = $resultaat1->fetch_assoc()){
		$persoonkeuze1 = $row['persoon_id'];
		$voornaam1 = $row['voornaam'];
		$tweedenaam1 = $row['tweedenaam'];
		$derdenaam1 = $row['derdenaam'];
		$voorvoegsel_achternaam1 = $row['voorvoegsel_achternaam'];
		$achternaam1 = $row['achternaam'];
		$voorvoegsel_meisjesnaam1 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam1 = $row['meisjesnaam'];
}

$sql2 = "SELECT `persoon_id` , `voornaam` , `tweedenaam` , `derdenaam` , `voorvoegsel_achternaam` , `achternaam` , `voorvoegsel_meisjesnaam` , `meisjesnaam`
FROM `personenregister`
WHERE `persoon_id` = '3' 
"; 
$resultaat2 = $db->query($sql2);
if (!$resultaat2) {
	echo "Fout: ': " . $db->error . "<br/>"; 
}
while($row = $resultaat2->fetch_assoc()){
		$persoonkeuze2 = $row['persoon_id'];
		$voornaam2 = $row['voornaam'];
		$tweedenaam2 = $row['tweedenaam'];
		$derdenaam2 = $row['derdenaam'];
		$voorvoegsel_achternaam2 = $row['voorvoegsel_achternaam'];
		$achternaam2 = $row['achternaam'];
		$voorvoegsel_meisjesnaam2 = $row['voorvoegsel_meisjesnaam'];
		$meisjesnaam2 = $row['meisjesnaam'];
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
			<form name="input" action="<?php echo $path; ?>/PersoonToevoegen/PT2.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="right" >
						<p><B>Toevoegen :</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="10%" align="left" >
						<select name="geslacht">
							<option value=""></option>
							<option value="man">man</option>
							<option value="vrouw">vrouw</option>
							<option value="onbekend">onbekend</option>
						</select>
					</td>
					<td colspan="0" width="15%" align="right" >
						<p>(*) Is <select name="relatie">
							<option value=""></option>
							<option value="partner">partner (nog te maken)</option>
							<option value="ouder">ouder</option>
							<option value="broer/zus">broer/zus (nog te maken)</option>
							<option value="kind">kind</option>
						</select> van :</p>
					</td>
					<td colspan="0" width="10%" align="left" >
						<select name="familie">
							<option value=""></option>
							<option value="<?php echo $persoonkeuze;?>"><?php echo $voornaam;?><?php echo $tweedenaam;?><?php echo $derdenaam;?><?php echo $voorvoegsel_achternaam;?><?php echo $achternaam;?><?php echo $voorvoegsel_meisjesnaam;?><?php echo $meisjesnaam;?></option>
							<option value="<?php echo $persoonkeuze1;?>"><?php echo $voornaam1;?><?php echo $tweedenaam1;?><?php echo $derdenaam1;?><?php echo $voorvoegsel_achternaam1;?><?php echo $achternaam1;?><?php echo $voorvoegsel_meisjesnaam1;?><?php echo $meisjesnaam1;?></option>
							<option value="<?php echo $persoonkeuze2;?>"><?php echo $voornaam2;?><?php echo $tweedenaam2;?><?php echo $derdenaam2;?><?php echo $voorvoegsel_achternaam2;?><?php echo $achternaam2;?><?php echo $voorvoegsel_meisjesnaam2;?><?php echo $meisjesnaam2;?></option>
						</select>
					</td>
					<td colspan="0" width="45%" align="left" valign="center">
						<p><H3> </H3></p>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*) Voornaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="voornaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Tweede naam :</p>
					</td>
					<td align="left" >
						<input type="text" name="tweedenaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Derde naam :</p>
					</td>
					<td align="left" >
						<input type="text" name="derdenaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel achternaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="voorvoegsel_achternaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Achternaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="achternaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Voorvoegsel meisjesnaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="voorvoegsel_meisjesnaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>(*1) Meisjesnaam :</p>
					</td>
					<td align="left" >
						<input type="text" name="meisjesnaam" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboortedatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="geboortedatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopdatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="doopdatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Geboorteplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="geboorteplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Doopplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="doopplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfdatum :</p>
					</td>
					<td align="left" >
						<input type="text" name="sterfdatum" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Sterfplaats :</p>
					</td>
					<td align="left" >
						<input type="text" name="sterfplaats" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Beroep 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="beroep3" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="opmerking1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Opmerking 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="opmerking2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="documentatie1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Documentatie 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="documentatie2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Foto 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="foto1" value=""/>
					</td>
					<td align="left" >
						<input type="submit" name="Toevoegen" value="toevoegen"  /><br/>
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
	<div id="footer_container" >
		<a href="<?php echo $path; ?>/stamboom.php">terug</a>
	</div>
</div>
</body> 
</html> 
