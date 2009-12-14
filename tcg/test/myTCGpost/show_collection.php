<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Collections</h2>
<br />
<p><img src="images/info.gif" /> Blank images with a red border (<img class="red" src="images/space.gif" width="7" height="7" />), represent cards # you checked but that doesn't exist in the cards database.</p>
<?php

	$id = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection WHERE idCollection='$id'") or die(mysql_error());
	$card = mysql_fetch_array( $requete );

	// On selectionne le template à afficher et on le place dans un tableau
	$requeteTpl = mysql_query("select * from $db_template WHERE idTemplate='$card[6]'") or die(mysql_error());
	$tpl = mysql_fetch_array( $requeteTpl );

	// On calcule la largeur et hauteur a l'aide du filler

	if ( $card[3] != "" ) {
		$img = $_SESSION['url'] . "images/" . $card[3];
		$size = getimagesize($img);
	}
	else {
		$img = $_SESSION['url'] . "images/" . $_SESSION['defaultFiller'];
		$size = getimagesize($img);
	}

	$c_height = $size[0]-6;
	$c_width  = $size[1]-6;

 	// On affiche le resultat sous forme de tableau
	echo "<h3>Showing : " . $card[1] . " (" . $card[2] . ")</h3>
	<p>Total cards : " . $card[4] . "</p><br />";

	$dir = $_SESSION['url'] . $_SESSION['cardDir'];

	// Recuperation de la liste des cartes possedees
	$clist = explode(';', $card[5]);

	// Affichage du "start" du template
	echo $tpl[3];

	// Affichage des cases a cocher pour choisir les cartes possedees
	$th = 0;
	for ( $i=1 ; $i<=$card[4] ; $i++ )
	{
		// Affichage du startLine
		if ( $th == 0 ) {
			echo $tpl[4];
		}

		$th++;

		if ( $i < 10 ) $num = "0" . $i;
		else $num = $i;

		// Affichage du beCard avant chaque carte
		echo $tpl[5];

		if ( in_array ($i, $clist) ) {
			$carte = $card[2] . $num . $_SESSION['format'];

			// On teste si la carte existe bien dans la table card
			// Elle n'existe pas on affiche une image vide avec un bord rouge
			$requete = mysql_query("SELECT idCard FROM $db_card WHERE card='$carte'") or die(mysql_error());
			$isCarte = mysql_fetch_array( $requete );
			if ( $isCarte[0] == "" ) {
				echo "<img class=\"red\" src=\"images/space.gif\" width=\"" . $c_height . "\" height=\"" . $c_width . "\" />";
			}

			// Elle existe on affiche la carte
			else echo "<img src=\"" . $dir . $card[2] . $num . $_SESSION['format'] . "\" />";
		}
		else if ( $card[3] != "" ) {
		    echo "<img src=\"" . $_SESSION['url'] . "images/" . $card[3] . "\" />";
		}
		else echo "<img src=\"" . $_SESSION['url'] . "images/" . $_SESSION['defaultFiller'] . "\" />";

		// Affichage du afCard apres chaque carte
		echo $tpl[6];

		// Affichage du endLine et remise a zero du compteur
		if ( $th == $tpl[2] ) {
			echo $tpl[7];
			$th = 0;
		}

	}

	// Affichage du "end" du template
	echo $tpl[8];

	mysql_close();

	include "footer.php";
?>