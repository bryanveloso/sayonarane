<?php
include "config.php";
session_start();

// Connexion a la base
$db_link = mysql_connect($db_server,$db_user,$db_password);
mysql_select_db($db_database, $db_link) or die( "Impossible de se connecter &agrave; la base");

$type = (isset($_POST['type_del']) && !empty($_POST['type_del']))?$_POST['type_del']:'';


if( $type == "token" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
	$img = (isset($_POST['image']) && !empty($_POST['image']))?$_POST['image']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_token WHERE idToken=$id";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	//Supprimer l'image
	unlink( $_SESSION['rootPath'] . $_SESSION['tokenDir'] . $img );

	$redirection = "token.php";
}

if( $type == "category" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_category WHERE idCategory=$id";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	$redirection = "category.php";
}

if( $type == "card" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
	$image = (isset($_POST['image']) && !empty($_POST['image']))?$_POST['image']:'';
	$copies = (isset($_POST['copies']) && !empty($_POST['copies']))?$_POST['copies']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_card WHERE idCard='$id'";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	//Supprimer l'image si le nombre de copies possedees est == 1
	if ($copies > 1) {
		unlink( $_SESSION['rootPath'] . $_SESSION['cardDir'] . $image );
	}

	$redirection = "card.php";
}

if( $type == "collection" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
	$filler = (isset($_POST['filler']) && !empty($_POST['filler']))?$_POST['filler']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_collection WHERE idCollection='$id'";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	// Si on avait un filler special
	if ( $filler != "" ) {
		unlink( $_SESSION['rootPath'] . "images/" . $filler );
	}

	$redirection = "collection.php";
}

if( $type == "mastered" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
	$badge = (isset($_POST['badge']) && !empty($_POST['badge']))?$_POST['badge']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_mastered WHERE idMastered='$id'";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	// Si on avait un filler special
	unlink( $_SESSION['rootPath'] . $_SESSION['masteredDir'] . $badge );

	$redirection = "mastered.php";
}

if( $type == "template" ) // si formulaire soumis
{
	// recuperation des variables saisies dans le formulaire
	$id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';

	// On l'ajoute dans la table des currency
	$delete = "DELETE FROM $db_template WHERE idTemplate=$id";
	$suppr = mysql_query($delete) or die('Invalid Request : ' . mysql_error());

	$redirection = "template.php";
}

mysql_close();

// redirection vers la page d'origine
header( 'location: ' . $redirection );

?>