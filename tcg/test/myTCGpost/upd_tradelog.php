<?php
include "header.php";
include "config.php";
?>
<h2>Update Trade log</h2>
<p>Here you can update a month of the tradelog.</p>
<br />
<?php

  // Connexion a la base
  $db_link = mysql_connect($db_server,$db_user,$db_password);
  mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

  $id_log = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

  if( isset($_POST['update']) ) // si formulaire soumis
  {
    // recuperation des variables saisies dans le formulaire
    $log = (isset($_POST['log']) && !empty($_POST['log']))?$_POST['log']:'';
    $id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';

    // On met a jour la table admin
    $up = "UPDATE $db_tradelog SET log='$log' WHERE idTradelog='$id'";
    $maj = mysql_query($up) or die('Requête invalide : ' . mysql_error());

    echo "<img src=\"images/info.gif\" />The log has been updated.<br />";

  }

  // Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_tradelog WHERE idTradelog='$id_log'") or die(mysql_error());

  $log = mysql_fetch_array( $requete );

 	// On affiche le resultat sous forme de tableau
  echo "<form name=\"tradelog\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?id=" . $log[0] . "\"><table>";


  // On affiche la ligne du tableau de l'actu courante
  echo "<tr>
          <input name=\"id\" type=\"hidden\" value=\"" . $log[0] . "\" />
          <td class=\"droite\"> Month : </td><td><input name=\"month\" type=\"month\" size=\"20\" maxlength=\"50\" value=\"" . $log[1] . "\" readonly /></td>
        </tr>
        <tr>
          <td class=\"droite\"> Log : </td><td><textarea rows=5 cols=72 name=\"log\">" . $log[2] . "</textarea></td>
        </tr>";

  echo "<tr><td class=\"droite\"><input name=\"update\" type=\"submit\" value=\"Update\"></td><td><input name=\"cancel\" type=\"reset\" value=\"Cancel changes\"></td></tr></table></form>";

  mysql_close();

  include "footer.php";
?>