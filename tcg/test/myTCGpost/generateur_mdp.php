
<?php
include "header.php";
include "config.php";


// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database");

function generateur_mdp()
{
	$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
	$clongueur = strlen($chaine);
	$taille = 8;
	$motdepasse = "";

	srand( (double)microtime()*1000000 );

	for($i=0; $i<$taille; $i++)
	{
      // Tirage aléatoire d'une valeur entre 1 et clongueur
      $cpos = rand( 0, $clongueur-1 );
		  $motdepasse .= $chaine[$cpos];
  }
return $motdepasse;
}

echo "<h3>Creation of a new password.</h3>";

// Enregistrement du nouveau mot de passe dans la base de donnees

// Creation du mot de passe
$temp = generateur_mdp();

// Enregistrement du nouveau mot de passe dans la base de donnees
// Cryptage du mot de passe
$mdp = md5($temp);

// Mise a jour de la base
$update = "UPDATE $db_settings SET password='$mdp'";
$maj = mysql_query($update) or die('Invalid request : ' . mysql_error());



// Envoi du mail qui donne le nouveau mot de passe


// Recuperation de l'email, et de l'url.
$requete = mysql_query("select email, url from $db_settings", $db_link) or die(mysql_error());
$infos = mysql_fetch_array( $requete );


// liste des destinataires du message
// On recupere l'adresse de l'administrateur stockee dans la base
$adresse = $info[2];

// titre du message : zone sujet
$sujet="New password for myTCGpost! Admin panel";

// contenu du message
$corps="<html><head><title>myTCGpost! Admin panel</title></head><body>You ask for password reset.<br /><br />
Here is your new password : ". $temp ."<br />
You can connect to the admin panel with it now.<br />
<a href=\"" . $info[7] . "/myTCGpost\">Connect to the control panel.</a></body></html>";

// Création de l'entête du message
// cette entete contient l'email de l'expéditeur ainsi que l'email pour la réponse.
$entete="Content-type:text/html\nFrom:myTCGpost! Admin panel\r\nReply-To:" . $adresse;

// envoi du mail
mail ( $adresse, $sujet, $corps, $entete );

echo "<p>An email with your new password has been sent.</p>";

include "footer.php";
?>