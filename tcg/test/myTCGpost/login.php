<?php
/*--
 * Created on 16 avril 2006 by lollie
 *
 * Qbee Admin
 *
 */
session_start();

include ('config.php');


$db_link = mysql_connect( $db_server, $db_user,
   $db_password )
   or die( 'Cannot connect to the database. Try again.' );
mysql_select_db( $db_database )
   or die( 'Cannot connect to the database. Try again.' );

// on declare une variable qui sera mise a vrai quand on aura bien verifie
// que le login existait et que le mot de passe correspondait
//$loginOK = false;
$_SESSION['loginOK'] = '';

$login = (isset($_POST['login_name']) && !empty($_POST['login_name']))?$_POST['login_name']:'';
$pass = (isset($_POST['login_password']) && !empty($_POST['login_password']))?$_POST['login_password']:'';

if(get_magic_quotes_gpc()) {
           $login = stripslashes($login);
           $pass = stripslashes($pass);
}

// On n'effectue les traitements qu'a la condition que
// les informations aient été effectivement postées
if ( (!empty($login)) && (!empty($pass)) )
{

	$login = mysql_real_escape_string($login, $db_link);
	$pass = mysql_real_escape_string($pass, $db_link);

  // On va chercher le mot de passe correspondant a ce login
  $sql = "SELECT * FROM " . $db_settings . " WHERE login = '" . $login . "'";
  $req = mysql_query($sql) or die('Erreur SQL : <br />'.$sql);

  // On vérifie que l'utilisateur existe bien
  if (mysql_num_rows($req) > 0) {
     $data = mysql_fetch_assoc($req);

    // On vérifie que son mot de passe est correct
    if (md5($pass) == $data['password']) {
      $_SESSION['loginOK'] = "ok";
    }
  }
}

// Si le login a été validé on met les données en sessions
if ($_SESSION['loginOK'] == "ok") {

  $_SESSION['login'] = $data['login'];
  $_SESSION['email'] = $data['email'];
  $_SESSION['format'] = $data['format'];
  $_SESSION['defaultFiller'] = $data['defaultFiller'];
  $_SESSION['nbCardDesk'] = $data['nbCardDesk'];
  $_SESSION['url'] = $data['url'];
  $_SESSION['rootPath'] = $data['rootPath'];
  $_SESSION['cardDir'] = $data['cardDir'];
  $_SESSION['tokenDir'] = $data['tokenDir'];
  $_SESSION['masteredDir'] = $data['masteredDir'];

  header('location: index.php');
}
else{
header('location: index.html');// Redirection sur une page car mauvais login
}
?>