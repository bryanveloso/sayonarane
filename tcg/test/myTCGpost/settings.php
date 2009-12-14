<?php
include "header.php";
include "config.php";
?>
<h2>Change Settings</h2>
<p>If you change your password, you'll receive an email with the new password.</p>
<br />
<?php
  // Connexion a la base
  $db_link = @mysql_connect($db_server,$db_user,$db_password);
  @mysql_select_db($db_database, $db_link) or die( "Impossible de se connecter &agrave; la base");


 // Changement du mot de passe dans la base et envoi par mail du nouveau mot de passe
  if( isset($_POST['changemdp']) ) // si formulaire soumis
  {
	echo "<p><img src=\"images/info.gif\" /> ";

    // On recupere les variables du formulaire
    $cur_mdp  = (isset($_POST['cur_mdp']) && !empty($_POST['cur_mdp']))?$_POST['cur_mdp']:'';
    $new_mdp1 = (isset($_POST['new_mdp1']) && !empty($_POST['new_mdp1']))?$_POST['new_mdp1']:'';
    $new_mdp2 = (isset($_POST['new_mdp2']) && !empty($_POST['new_mdp2']))?$_POST['new_mdp2']:'';

    // On teste si le mot de passe courant saisi est bien identique a celui de la base
    $selectmdp = "SELECT password, email FROM $db_settings";
    $resmdp = mysql_query($selectmdp) or die('Requête invalide : ' . mysql_error());

    $mdpadmin = mysql_fetch_array( $resmdp );

    // Si le mot de passe correspond, et que les nouveaux mots de passe saisis sont identiques : on fait la mise a jour et on envoie le mail de confirmation du changement de mot de passe
    if (md5($cur_mdp) == $mdpadmin[0] )
    {
      // On teste la correspondance entre les 2 nouveaux mdp
      if( $new_mdp1 != $new_mdp2 )
      {
        echo "<p>The 2 passwords doesn't match.</p><br />";
      }
      else
      {
        // Cryptage du mot de passe
        $mdp = md5($new_mdp1);

        // Mise a jour de la base
        $update = "UPDATE $db_settings SET password='$mdp' WHERE email='".$mdpadmin[1]."'";
        $maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());

        // Envoi du mail de confirmation

        // liste des destinataires du message
        // On recupere l'adresse de l'administrateur stockee dans la base
        $adresse = $mdpadmin[1];

        // titre du message : zone sujet
        $sujet="Tcg admin panel : Confirmation of your new password";

        // contenu du message
        $corps="<html><head><title>Tcg admin panel</title></head><body>You changed your password.<br /><br />
        Here is the new password : ". $new_mdp1 ."<br />
        You can now log in in your panel with this password.<br />
        </body></html>";

        // Création de l'entête du message
        // cette entete contient l'email de l'expéditeur ainsi que l'email pour la réponse.
        $entete="Content-type:text/html\nFrom:Tcg admin panel\r\nReply-To: $adresse";

        // envoi du mail
        mail ( $adresse, $sujet, $corps, $entete );

        echo "Your password has been changed.</p>
        <p>An email with the new password has been sent to this email adress : $adresse.</p>";
      }

    }
    // Sinon on indique que le mot de passe saisi n'est pas celui de l'administrateur
    else
    {
      echo "<p><img src=\"images/info.gif\" /> The password your typed is not the one registered.</p><br />";
    }
  }

  // Changement des infos generales
  if (isset($_POST['general'])) { // si formulaire soumis
	echo "<p><img src=\"images/info.gif\" /> ";

	$content_dir = $_SESSION['rootPath'] . 'images/'; // dossier où sera déplacé le fichier
	$name_file = "";

	// recuperation des variables saisies dans le formulaire
	$choix = (isset($_POST['choice']) && !empty($_POST['choice']))?$_POST['choice']:'';
	$nbcard = (isset($_POST['nbcard']) && !empty($_POST['nbcard']))?$_POST['nbcard']:'';
	$fformat = (isset($_POST['format']) && !empty($_POST['format']))?$_POST['format']:'';

	if (get_magic_quotes_gpc()) {
	  $alt = stripslashes($alt);
	}

	// Cas ou l'on supprime le filler
	if ( $choix == "opt4" || $choix == "opt5" ) {
		// On selectionne le nom du patch a supprimer
		$delFiller = "select defaultFiller from $db_settings WHERE login='" . $_SESSION['login'] . "'";
		$requete = mysql_query( $delFiller ) or die(mysql_error());

		// Contient le nom du fichier a modifier
		$nom_filler = mysql_fetch_array($requete);

		// Supprimer l'image
		unlink($_SESSION['rootPath'] . 'images/' . $nom_filler[0]);
	}

	if ( $choix == "opt5" ) {
		$_SESSION['defaultFiller'] = "";
	}

	// Cas ou l'on upload un nouveau filler
	if ( $choix == "opt2" || $choix == "opt4" ) {

		$tmp_file = $_FILES['filler']['tmp_name'];
		// on vérifie maintenant l'extension
		$type_file = $_FILES['filler']['type'];
		// on copie le fichier dans le dossier de destination
		$name_file = $_FILES['filler']['name'];


		if (!is_uploaded_file($tmp_file)) {
			echo("File not found.<br />");
		} else if (!strstr($type_file, 'gif') && !strstr($type_file, 'png')) {
			echo("The file type must be gif or png.<br />");
		}
		// Si le fichier existe
		if (file_exists($content_dir . $name_file)) {
			if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
				echo("The file was not copied in the directory \"$content_dir\".<br />");
			} else {
				echo "The existing file has been replaced.<br />";
			}
		} else if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
			echo("The file was not copied in the directory $content_dir.<br />");
		} else echo "The file has been uploaded.<br />";

		$update = sprintf("UPDATE $db_settings SET format='%s', defaultFiller='%s', nbCardDesk='%d' WHERE login='%s'",
            $fformat,
		$name_file,
            $nbcard,
            $_SESSION['login']
            );

		// maj des variables de session
		$_SESSION['defaultFiller'] = $name_file;
		$_SESSION['nbCardDesk'] = $nbcard;
		$_SESSION['format'] = $fformat;
	}
	else {
		$update = sprintf("UPDATE $db_settings SET format='%s', nbCardDesk='%d' WHERE login='%s'",
            $fformat,
            $nbcard,
            $_SESSION['login']
            );

		// maj des variables de session
		$_SESSION['nbCardDesk'] = $nbcard;
		$_SESSION['format'] = $fformat;
	}



    $maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
    echo "Data updated.</p><br />";
}

  // Changement des dossiers d'images
  if (isset($_POST['directories'])) { // si formulaire soumis
	echo "<p><img src=\"images/info.gif\" /> ";

    // recuperation des variables saisies dans le formulaire
    $url = (isset($_POST['url']) && !empty($_POST['url']))?$_POST['url']:'';
    $rootpath = (isset($_POST['rootpath']) && !empty($_POST['rootpath']))?$_POST['rootpath']:'';
    $cardsdir = (isset($_POST['cardsdir']) && !empty($_POST['cardsdir']))?$_POST['cardsdir']:'';
    $tokendir = (isset($_POST['tokendir']) && !empty($_POST['tokendir']))?$_POST['tokendir']:'';
    $mastereddir = (isset($_POST['mastereddir']) && !empty($_POST['mastereddir']))?$_POST['mastereddir']:'';

    if (get_magic_quotes_gpc()) {
	  $url = stripslashes($url);
        $rootpath = stripslashes($rootpath);
        $cardsdir = stripslashes($cardsdir);
        $tokendir = stripslashes($tokendir);
        $mastereddir = stripslashes($mastereddir);
    }

        $update = sprintf("UPDATE $db_settings SET url='%s', rootPath='%s', cardDir='%s', tokenDir='%s', masteredDir='%s' WHERE login='%s'",
           $url,
	     $rootpath,
           $cardsdir,
           $tokendir,
           $mastereddir,
	     $_SESSION['login']
            );

	  // maj des variables de session
	  $_SESSION['url'] = $url;
	  $_SESSION['rootPath'] = $rootpath;
	  $_SESSION['cardDir'] = $cardsdir;
	  $_SESSION['tokenDir'] = $tokendir;
	  $_SESSION['masteredDir'] = $mastereddir;

	  $maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());
	  echo "The images directories has been updated.</p><br />";
}

    // Creation du formulaire de modification du mot de passe
    echo "<form name=\"change_mdp\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
    <table>
    <tr><td class=\"title\" colspan=\"2\">Log in information</td></tr>
    <tr><td class=\"droitep\">Current password : </td><td class=\"pair\"><input name=\"cur_mdp\" type=\"password\" size=\"25\" maxlength=\"25\" /></td></tr>
  <tr><td>&nbsp;</td></tr>
    <tr><td class=\"droite\">New password : </td><td><input name=\"new_mdp1\" type=\"password\" size=\"25\" maxlength=\"25\" /></td></tr>
    <tr><td class=\"droitep\">Confirmation : </td><td class=\"pair\"><input name=\"new_mdp2\" type=\"password\" size=\"25\" maxlength=\"25\" /></td></tr>
    <tr><td class=\"droite\"><input name=\"changemdp\" type=\"submit\" value=\"Update\"><br /><br /></td></tr></form>";

	// Creation du formulaire de modification des infos generales
	echo "<form name=\"change_general\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "\">
	<tr><td class=\"title\" colspan=\"2\">General information</td></tr>
	<tr><td class=\"droitep\">Cards file format : </td><td class=\"pair\"><input name=\"format\" size=\"10\" maxlength=\"5\" value=\"" . $_SESSION['format'] . "\" />
	</td></tr>
	<tr><td class=\"droite\">Default filler : </td><td>";

	if ( $_SESSION['defaultFiller'] == "" ) {
		echo "<img src=\"images/nofiller.gif\" /><br />
		<input type=\"radio\" name=\"choice\" value=\"opt1\" checked /> Keep no default filler.<br />
		<input type=\"radio\" name=\"choice\" value=\"opt2\" /> Choose a default filler.<br />";
	}
	else {
		echo "<img src=\"" . $_SESSION['url'] . "images/" . $_SESSION['defaultFiller'] . "\" /><br />
				<input type=\"radio\" name=\"choice\" value=\"opt3\" checked /> Keep the current default filler.<br />
				<input type=\"radio\" name=\"choice\" value=\"opt4\" /> Choose a new default filler.<br />
				<input type=\"radio\" name=\"choice\" value=\"opt5\" /> Delete default filler.<br />";
	}


	echo "<br /><br /><input type=\"file\" name=\"filler\" /></td></tr>
	<tr><td class=\"droitep\">Number of cards in a desk : </td><td class=\"pair\"><input name=\"nbcard\" size=\"25\" maxlength=\"20\" value=\"" . $_SESSION['nbCardDesk'] . "\" /><br />
	<p class=\"legend\">(It's the default number of cards that constitutes a desk. If some desks are constituted of more or less cards, this number can be changed in the collection managing panel.)</p>
	</td></tr>
	<tr><td class=\"droite\"><input name=\"general\" type=\"submit\" value=\"Update\"><br /><br /></td></tr></form>";

    // Creation du formulaire de modification des dossiers d'images
    echo "<form name=\"change_dir\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
    <tr><td class=\"title\" colspan=\"2\">Directories</td></tr>
    <tr><td class=\"droite\">Url : </td><td><input name=\"url\" size=\"50\" maxlength=\"250\" value=\"" . $_SESSION['url'] . "\" /></td></tr>
    <tr><td class=\"droitep\">Root path (absolute) : </td><td class=\"pair\"><input name=\"rootpath\" size=\"50\" maxlength=\"250\" value=\"" . $_SESSION['rootPath'] . "\" /></td></tr>
    <tr><td class=\"droite\">Cards directory : </td><td><input name=\"cardsdir\" size=\"50\" maxlength=\"250\" value=\"" . $_SESSION['cardDir'] . "\" /></td></tr>
    <tr><td class=\"droitep\">Token images directory : </td><td class=\"pair\"><input name=\"tokendir\" size=\"50\" maxlength=\"250\" value=\"" . $_SESSION['tokenDir'] . "\" /></td></tr>
    <tr><td class=\"droite\">Mastered badges directory : </td><td><input name=\"mastereddir\" size=\"50\" maxlength=\"250\" value=\"" . $_SESSION['masteredDir'] . "\" /></td></tr>
    <tr><td class=\"droite\"><input name=\"directories\" type=\"submit\" value=\"Update\"><br /><br /></td></tr></table></form>";

  mysql_close();

  include "footer.php";
?>