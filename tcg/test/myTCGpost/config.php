<?php
/*
 * Created by lollie
 *
 * TCG myCards Admin 1.0
 * Automaticaly generated, DO NOT EDIT
 *
 */

/******************************************************************************
  DATABASE VARIABLES
******************************************************************************/

$db_server = 'internal-db.s237.gridserver.com';
$db_user = 'db237_sayonarane';
$db_password = 'carryon1003';
$db_database = 'db237_mytcgpost';

$prefix = "tcg_";


/**********************************************************************************************
  ____   ___    _   _  ___ _____   _____ ____ ___ _____   ____  _____ _     _____        __  _
 |  _ \ / _ \  | \ | |/ _ \_   _| | ____|  _ \_ _|_   _| | __ )| ____| |   / _ \ \      / / | |
 | | | | | | | |  \| | | | || |   |  _| | | | | |  | |   |  _ \|  _| | |  | | | \ \ /\ / /  | |
 | |_| | |_| | | |\  | |_| || |   | |___| |_| | |  | |   | |_) | |___| |___ |_| |\ V  V /   |_|
 |____/ \___/  |_| \_|\___/ |_|   |_____|____/___| |_|   |____/|_____|_____\___/  \_/\_/    (_)

**********************************************************************************************/


/******************************************************************************
 DATABASE TABLE VARIABLES
******************************************************************************/
  $db_category = $prefix . 'category';
  $db_card = $prefix . 'card';
  $db_collection = $prefix . 'collection';
  $db_mastered = $prefix . 'mastered';
  $db_profile = $prefix . 'profile';
  $db_settings = $prefix . 'settings';
  $db_template = $prefix . 'template';
  $db_token = $prefix . 'token';
  $db_tradelog = $prefix . 'tradelog';



/******************************************************************************
 * SETTINGS VARIABLES -> DIRS + URLS
******************************************************************************/
$query = "SELECT * FROM " . $db_settings;
$db_link = mysql_connect($db_server,$db_user,$db_password);
mysql_select_db($db_database, $db_link) or die( "Impossible de se connecter &agrave; la base");

$result = mysql_query( $query ) or die('Requête invalide : ' . mysql_error());

$row = mysql_fetch_array( $result );
$tcg_path = $row['rootPath'];
$tcg_post_url = $row['url'];
$tcg_cards_dir = $row['cardDir'];
$tcg_tokens_dir = $row['tokenDir'];
$tcg_mastered_dir = $row['masteredDir'];
$tcg_default_filler = $row['defaultFiller'];
$tcg_format = $row['format'];




/******************************************************************************
 ACCESS FUNCTION
******************************************************************************/

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");



/***             PROFILE            ****/
/***************************************/
$query = mysql_query("select * from $db_profile") or die(mysql_error());
$profile = mysql_fetch_array( $query );


/***************************************/
$tcg_name = $profile['tcgName'];

$tcg_url = $profile['tcgUrl'];

$tcg_member_name = $profile['name'];

$tcg_level = $profile['level'];

$tcg_level_image = "<img src='images/" . $profile['lvImage'] . "' />";

$tcg_wishlist = $profile['wishlist'];


// Affichages des collections en cours
$tcg_current_collections = "";

$rCurrentColls = mysql_query("select name, deck from $db_collection") or die(mysql_error());
$currentColls = ", ";
while( $coll = mysql_fetch_array( $rCurrentColls ) ) {
	$currentColls .= $coll[0] ." (". $coll[1] ."), ";
}
if ( $currentColls == ", " ) $tcg_current_collections = "none";

// Suppression de a dernière virgule
else $tcg_current_collections = substr($currentColls, 0, strlen($currentColls)-2);


// Calcul du nombre de cartes
$rCardsOwned = mysql_query("select count(idCard) from $db_card") or die(mysql_error());
$cardsOwned = mysql_fetch_array( $rCardsOwned );

// Calcul de la valeur totale des cartes (worth)
$rCardsWorth = mysql_query("select worth from $db_card") or die(mysql_error());
$cardsWorth = 0;
while( $worth = mysql_fetch_array( $rCardsWorth ) ) {
	$cardsWorth += $worth[0];
}

$tcg_cards_owned = $cardsOwned[0];
$tcg_cards_worth = $cardsWorth;


$tcg_mastered_collections = "";


// Affichage de la liste des mastered collections
$m_opt = $profile['mastered'];
$m_page = $profile['masterPage'];

$m_requete = mysql_query("select deck, card from $db_mastered") or die(mysql_error());


// Text list
if ( $m_opt == 1 ) {
	while( $deck = mysql_fetch_array( $m_requete ) )
	{
		$tcg_mastered_collections .=  $deck[0] . ", ";
	}

	// Suppression de a dernière virgule
	$tcg_mastered_collections = substr($tcg_mastered_collections, 0, strlen($tcg_mastered_collections)-2);
}
// Image list
if ( $m_opt == 2 ) {
	while( $deck = mysql_fetch_array( $m_requete ) )
	{
		$tcg_mastered_collections .=  "<img src=\"" . $tcg_mastered_dir . $deck[1] . "\" /> ";
	}
}
// Text list with links
if ( $m_opt == 3 ) {
	while( $deck = mysql_fetch_array( $m_requete ) )
	{
		$tcg_mastered_collections .= "<a href=\"" . $m_page . "#" . $deck[0] . "\">" . $deck[0] . "</a>, ";
	}

	// Suppression de a dernière virgule
	$tcg_mastered_collections = substr($tcg_mastered_collections, 0, strlen($tcg_mastered_collections)-2);
}
// Image list with links
if ( $m_opt == 4 ) {
	while( $deck = mysql_fetch_array( $m_requete ) )
	{
		$tcg_mastered_collections .=  "<a href=\"" . $m_page . "#" . $deck[0] . "\"><img src=\"" . $tcg_mastered_dir . $deck[1] . "\" /></a> ";
	}
}

// Nombre de collection mastered
$tcg_total_mastered = 0;

$mt_requete = mysql_query("select COUNT(*) from $db_mastered") or die(mysql_error());

$mt_total = mysql_fetch_array( $mt_requete );

$tcg_total_mastered = $mt_total[0];



/***             TOKENS             ****/
/***************************************/
$query = mysql_query("SELECT * FROM $db_token ORDER BY name ASC") or die(mysql_error());



/***************************************/
$tcg_tokens = "";

while( $token = mysql_fetch_array( $query ) )
{
	for( $i = 0 ; $i < $token['number'] ; $i++ )
	{
		$tcg_tokens .= "<img src=\"" . $tcg_tokens_dir . $token['image'] . "\" alt=\"" . $token['name'] . "\" title=\"" . $token['name'] . "\" /> ";
	}
	$tcg_tokens .= "<br />";
}


/***            TRADELOG            ****/
/***************************************/
$query = mysql_query("SELECT * FROM $db_tradelog ORDER BY idTradelog DESC") or die(mysql_error());
$queryl = mysql_query("SELECT * FROM $db_tradelog ORDER BY idTradelog DESC LIMIT 1") or die(mysql_error());


/***************************************/
$tcg_full_log = "";

while( $log = mysql_fetch_array( $query ) )
{
		$tcg_full_log .= "<h3 class=\"log_title\">" . $log['month'] . "</h3><div class=\"log_month\">" . nl2br($log['log']) . "</div><br /><br />";
}


$tcg_last_month = "";

$logl = mysql_fetch_array( $queryl );
$tcg_last_month .= "<h3 class=\"log_title\">" . $logl['month'] . "</h3><div class=\"log_month\">" . nl2br($logl['log']) . "</div><br /><br />";



/***              CARDS             ****/
/***************************************/
// Affichage des cartes selon la categorie choisie

//$order -> 1=ID, 2=card name, 3=worth
function tcg_print_cards( $catCards, $CardTpl, $orderField = 1, $order = "ASC" ){
	global $db_card;
	global $db_template;
	global $db_link;
	global $tcg_post_url;
	global $tcg_cards_dir;

	// Selection des cartes selon la categorie et classement selon l'ordre choisi
	switch( $orderField )
	{
		case 1  : $cardOrder = "idCard";
				break;
		case 2  : $cardOrder = "card";
				break;
		case 3  : $cardOrder = "worth";
				break;
		default : $cardOrder = "idCard";
				break;
	}

	$query = mysql_query("SELECT * FROM $db_card WHERE idCategorie = $catCards ORDER BY $cardOrder $order", $db_link) or die(mysql_error());

	// On selectionne le template à afficher et on le place dans un tableau
	$requeteTpl = mysql_query("SELECT * from $db_template WHERE idTemplate='$CardTpl'", $db_link) or die(mysql_error());
	$tpl = mysql_fetch_array( $requeteTpl );

	$dir = $tcg_post_url . $tcg_cards_dir;

	// Affichage du "start" du template
	echo $tpl[3];

	// Pour chaque carte de la categorie
	while( $card = mysql_fetch_array( $query ) )
	{

		// Affichage du beCard avant chaque carte
		echo $tpl[5];


		$sansFormat = substr($card[1], 0, strlen($card[1])-4);

		// On affiche la carte
		echo "<img src=\"" . $dir . $card[1] . "\" alt=\"$sansFormat\" title=\"$sansFormat\" />";
		// Affichage du afCard apres chaque carte
		echo $tpl[6];
	}

	// Affichage du "end" du template
	echo $tpl[8];

}


//$order -> 1=ID_coll, 2=coll_title, 3=deck_title, 4=nb_img
function tcg_print_1collection( $IdCollection ){
	global $db_collection;
	global $db_card;
	global $db_template;
	global $db_link;
	global $tcg_format;
	global $tcg_post_url;
	global $tcg_cards_dir;
	global $tcg_default_filler;

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection WHERE idCollection='$IdCollection'", $db_link) or die(mysql_error());
	$card = mysql_fetch_array( $requete );

	// On selectionne le template à afficher et on le place dans un tableau
	$requeteTpl = mysql_query("select * from $db_template WHERE idTemplate='$card[6]'", $db_link) or die(mysql_error());
	$tpl = mysql_fetch_array( $requeteTpl );

 	// On affiche le resultat sous forme de tableau
	echo "<h1 class=\"collection_title\"> " . $card[2] . " (" . $card[1] . ")</h1>";

	$dir = $tcg_post_url . $tcg_cards_dir;

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
			$carte = $card[2] . $num . $tcg_format;

			// On afffiche la carte
			echo "<img src=\"" . $dir . $card[2] . $num . $tcg_format . "\" alt=\"". $card[2] . $num ."\" title=\"". $card[2] . $num ."\" />";
		}
		else if ( $card[3] != "" ) {
		    echo "<img src=\"" . $tcg_post_url . "images/" . $card[3] . "\" />";
		}
		else echo "<img src=\"" . $tcg_post_url . "images/" . $tcg_default_filler . "\" />";

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

}


//$order -> 1=idCollection, 2=name, 3=deck, 4=nbCard
// Si collTpl == 0 on affiche toutes les collections confondues
// Sinon on affiche les collection qui correspondent a un type de template
function tcg_print_collections( $orderField = 1, $CollectionTpl = 0, $order = "ASC" ){
	global $db_collection;
	global $db_link;


	// Selection des cartes selon la categorie et classement selon l'ordre choisi
	switch( $orderField )
	{
		case 1  : $collOrder = "idCollection";
				break;
		case 2  : $collOrder = "name";
				break;
		case 3  : $collOrder = "deck";
				break;
		case 4  : $collOrder = "nbCard";
				break;
		default : $collOrder = "idCollection";
				break;
	}

	if ( $CollectionTpl == 0 )
	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection ORDER BY $collOrder $order", $db_link) or die(mysql_error());
	else
	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection WHERE idTemplate = $CollectionTpl ORDER BY $collOrder $order", $db_link) or die(mysql_error());

	// Pour chaque collection
	while( $collection = mysql_fetch_array( $requete ) )
	{
		tcg_print_1collection( $collection[0] );
	}
}

//$order -> 1=ID_coll, 2=coll_title, 3=deck_title, 4=nb_img
function tcg_print_1mastered_coll( $IdCollection ){
	global $db_mastered;
	global $db_template;
	global $db_link;
	global $tcg_format;
	global $tcg_post_url;
	global $tcg_cards_dir;
	global $tcg_mastered_dir;

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_mastered WHERE idMastered='$IdCollection'", $db_link) or die(mysql_error());
	$card = mysql_fetch_array( $requete );

	// On selectionne le template à afficher et on le place dans un tableau
	$requeteTpl = mysql_query("select * from $db_template WHERE idTemplate='$card[5]'", $db_link) or die(mysql_error());
	$tpl = mysql_fetch_array( $requeteTpl );

 	// On affiche le resultat sous forme de tableau
	echo "<h1 class=\"mastered_title\"> " . $card[2] . " (" . $card[1] . ")</h1>
		<a name=\"$card[2]\"></a>";

	$dir = $tcg_post_url . $tcg_cards_dir;

	// Affichage du "start" du template
	echo $tpl[3];

	// On affiche le mastered badge
	echo "<img src=\"" . $tcg_post_url . $tcg_mastered_dir . $card[4] . "\" /><br />";

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

		// On afffiche la carte
		echo "<img src=\"" . $dir . $card[2] . $num . $tcg_format . "\" alt=\"". $card[2] . $num ."\" title=\"". $card[2] . $num ."\" />";

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

}


//$order -> 1=idCollection, 2=name, 3=deck
// Si collTpl == 0 on affiche toutes les collections confondues
// Sinon on affiche les collection qui correspondent a un type de template
function tcg_print_mastered_colls( $orderField = 1, $CollectionTpl = 0, $order = "ASC" ){
	global $db_mastered;
	global $db_link;


	// Selection des cartes selon la categorie et classement selon l'ordre choisi
	switch( $orderField )
	{
		case 1  : $collOrder = "idMastered";
				break;
		case 2  : $collOrder = "name";
				break;
		case 3  : $collOrder = "deck";
				break;
		default : $collOrder = "idMastered";
				break;
	}

	if ( $CollectionTpl == 0 )
	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_mastered ORDER BY $collOrder $order", $db_link) or die(mysql_error());
	else
	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_mastered WHERE idTemplate = $CollectionTpl ORDER BY $collOrder $order", $db_link) or die(mysql_error());

	// Pour chaque collection
	while( $collection = mysql_fetch_array( $requete ) )
	{
		tcg_print_1mastered_coll( $collection[0] );
	}
}

mysql_close();


?>