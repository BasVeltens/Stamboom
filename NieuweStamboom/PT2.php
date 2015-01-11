<?php
require_once('../dbconfigStamboom.php'); //verbinding met de database maken

$persoonid = $_POST["persoon_id"];
$partnerid = $_POST["partner_id"];
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
			<form name="input" action="<?php echo $path; ?>/NieuweStamboom/PT3.php" method="post">
			<table width="100%" border="0" cellspacing="1" cellpadding="0" rowspan="3">
				<tr>
					<td colspan="0" width="20%" align="right" >
						<p><B>Persoon 1:</B> (*) Geslacht :</p>
					</td>
					<td colspan="0" width="10%" align="left" >
						<select name="geslacht">
							<option value=""></option>
							<option value="man">man</option>
							<option value="vrouw">vrouw</option>
							<option value="onbekend">onbekend</option>
						</select>
					</td>
					<td colspan="0" width="70%" align="left" valign="center">
						<p><H3> <?php echo $voornaam; ?> <?php echo $tweedenaam; ?> <?php echo $derdenaam; ?> <?php echo $tussenvoegsel; ?><?php echo $achternaam; ?> - <?php echo $meisjesnaam; ?>
								</H3></p>
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
						<p>Voorvoegsel meisjesnaam:</p>
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
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 1 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum1" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 2 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum2" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Partner 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="partner3" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
						<p>Huwelijksdatum 3 :</p>
					</td>
					<td align="left" >
						<input type="text" name="huwlijksdatum3" value=""/>
					</td>
				</tr>
				<tr>
					<td align="right" >
					</td>
					<td align="right" >
						<input type="submit" name="Toevoegen" value="toevoegen"  /><br/>
					</td>
				</tr>
				<tr>
					<td width="150px">
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
</div>
	<div id="footer_container" >
			<a href="<?php echo $path; ?>/stamboom.php">terug</a>
		</div>
</body> 
</html> 

