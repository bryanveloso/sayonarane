<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Mastered Collections</h2>
<br />
<?php

	$id = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_mastered WHERE idMastered='$id'") or die(mysql_error());
	$card = mysql_fetch_array( $requete );

	// On selectionne le template à afficher et on le place dans un tableau
	$requeteTpl = mysql_query("select * from $db_template WHERE idTemplate='$card[5]'") or die(mysql_error());
	$tpl = mysql_fetch_array( $requeteTpl );

 	// On affiche le resultat sous forme de tableau
	echo "<h3>Showing : " . $card[1] . " (" . $card[2] . ")</h3>
	<p>Total cards : " . $card[3] . "</p><br />";


	// On affiche le mastered badge
	echo "<img src=\"" . $_SESSION['url'] . $_SESSION['masteredDir'] . $card[4] . "\" /><br /><br /><br />";


	$dir = $_SESSION['url'] . $_SESSION['cardDir'];

	// Affichage du "start" du template
	echo $tpl[3];

	// Affichage des cases a cocher pour choisir les cartes possedees
	$th = 0;
	for ( $i=1 ; $i<=$card[3] ; $i++ )
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

		echo "<img src=\"" . $_SESSION['url'] . $_SESSION['cardDir'] . $card[2] . $num . $_SESSION['format'] . "\" />";

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