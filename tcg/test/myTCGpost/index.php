<?php
/*
 *
 * Created on 16 avril 2006 by lollie
 *
 * Qbee Admin
 *
 *
 */
?>
<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Home</h2>
<p>Welcome <strong><?= $_SESSION['login']; ?></strong>! You are now logged in to the control panel.</p>
<br />
<h3>Statistics</h3>
<?php
// Calcul du nombre de cartes
$rCardsOwned = mysql_query("select count(idCard) from $db_card") or die(mysql_error());
$cardsOwned = mysql_fetch_array( $rCardsOwned );

// Calcul de la valeur totale des cartes (worth)
$rCardsWorth = mysql_query("select worth from $db_card") or die(mysql_error());
$cardsWorth = 0;
while( $worth = mysql_fetch_array( $rCardsWorth ) ) {
	$cardsWorth += $worth[0];
}

// Affichages des collections en cours
$rCurrentColls = mysql_query("select name, deck from $db_collection") or die(mysql_error());
$currentColls = "- ";
while( $coll = mysql_fetch_array( $rCurrentColls ) ) {
	$currentColls .= $coll[0] ." (". $coll[1] .") - ";
}
if ( $currentColls == "- " ) $currentColls = "none";

// Affichage des collections terminées
$rMasteredColls = mysql_query("select name, deck from $db_mastered") or die(mysql_error());
$masteredColls = "- ";
while( $mcoll = mysql_fetch_array( $rMasteredColls ) ) {
	$masteredColls .= $mcoll[0] ." (". $mcoll[1] .") - ";
}
if ( $masteredColls == "- " ) $masteredColls = "none";

?>
Total cards owned : <?= $cardsOwned[0]; ?><br />
Total cards worth : <?= $cardsWorth; ?><br /><br />

Current collections : <?= $currentColls; ?><br />
Mastered collections : <?= $masteredColls; ?><br />
<?php

include ("footer.php");
?>