<?php
require_once('oefen/dbconfig.php'); //verbinding met de database maken
?>

<head> 
	<title>basje's probeersel</title> 
	<link rel="icon" 
      type="image/png" 
      href="<?php echo $path; ?>/img/ZwitsalBasje.jpg" />
	<link rel="stylesheet" href="<?php echo $path; ?>/css/style.css" type="css/text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/> 
</head> 
<body>
<div id="main_container">
	<div id="header_container" align="center">
		<img src="<?php echo $path; ?>/img/BAFWARE.gif" alt="logo" title="BAFWARE"  width="500px" />
	</div>
	<div id="left_container" align="left">
	</div>
	<div id="right_container" align="right">
		<p><b>De tijd is nu :</b></p><h2><?php echo date("H:i:s");?></h2>
	</div>
	<div id="input_container">	
				<table width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#516B88">
					<tr> 
						<td width="10%" bgcolor="#C5CED3">Home</td> 
						<td width="10%" bgcolor="#D6DDE0"><a href="<?php echo $path; ?>/oefen/produkten.php">Produkten</a></td> 
						<td width="10%" bgcolor="#E6EAEC"><a href="<?php echo $path; ?>/oefen/bedrijfsinfo.php">Bedrijfsinfo</a></td>
						<td width="10%" bgcolor="#EDEEF1"><a href="/oefen/contact.html">Contact</a></td> 
						<td width="10%" bgcolor="#F4F5F7"></td>
						<td width="50%" bgcolor="#F4F5F7"></td> 
					</tr>
				</table>
				<table border="0" cellspacing="2" cellpadding="15">
					<tr> 
						<td width="20%" height="316" valign="top">
							<ul> 
								<li><a href="<?php echo $path; ?>/pagina1.php" onmouseover="alert('huh')">link1</a></li> 
								<li><a href="<?php echo $path; ?>/example.mp3">huh</a>
									<ul> 
										<li><a href="<?php echo $path; ?>/oefen/pagina1.php">link1</a></li>
										<li><a href="<?php echo $path; ?>/oefen/oefentabeldingetjes.php">oefentabeldingetjes</a></li>
										<li><a href="<?php echo $path; ?>/oefen/klokje.php">klokje</a></li>
										<li><a href="<?php echo $path; ?>/rekenmachine/rekenmachine1.php">rekenmachine</a></li>
										<li><a href="<?php echo $path; ?>/../FlightsimEconomics/main/home.php">FlightsimEconomics</a></li>
										<li><a href="<?php echo $path; ?>/schaak/schaakstart.php">schaak</a></li>
										<li><a href="<?php echo $path; ?>/stamboom/stamboom.php">stamboom</a></li>
									</ul>
								</li> 
							</ul>

						</td> 
						<td width="80%" valign="top" align="left">
							<h2>Basje's probeersel</h2>
							<br/>
							<p>Vraagjes aan de professor:</p>
							<br/>
							<p>* hoogte van linker en rechter divjes sluit niet zelf aan bij de footer, heb zelf hoogte gegeven, hoe maak ik dat auto-fit?</p>
							<p>* Ik heb nu de linker en rechter divjes een hight meegegeven om te zorgen dat niet de hele pagina in elkaar klapt. 
							doe ik dat niet dan trekt het linkerkantje helemaal naar boven en sluit mijn inputcontainer (middenstuk met text) links aan.</p>
							<p>    dat is niet gek, is links uitgelijnt maar waarom "float " dan mijn rechterkantje niet alsnog links (heeft wel een breedte nl) en drukt hij niet mijn inputcontainer gewoon naar het midden</p>
							<br/>
							<p>* hoe krijg ik deze text nou in het midden?"textalign=center" is leuk voor de titel maar niet voor de text. een andere tr of td maken krijg ik niet klaar. moet ik een hele table maken alleen om mijn titel van de text te scheiden?.</p>
							<p>    snap wel da'k ergens met m'n table aan't kutten moet maar vraag liever ff, hoop tijd voor nix.</p>
							<br/>
							<p>* waarom zijn mijn bolletjes fucked (links bij mijn linkjes)</p>
							<br/>
							<p>* waarom krijg ik met spatie's (zie bovenstaande in index.php) de text niet onder de sterretjes?</p>
							<br/>
							<br/>
							<p>Je snapt het niet? <a href="http://www.bixie.nl" target="_blank">klik mij</a>  </p> 
						</td> 
					</tr> 
				</table> 
	</div>
</div>
<div id="footer_container" align="center"> 
&copy; <?php echo date("Y")?>  BasGepruts by Bixie.nl
</div> 
</body> 
</html>