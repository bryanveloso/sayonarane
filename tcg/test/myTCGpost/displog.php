<?php
include "header.php";
include "config.php";
?>
<h2>Trade log</h2>
<p>You see here all the months logs from you joined the TCG.</p>
<br />
<?php

  // Connexion a la base
  $db_link = mysql_connect($db_server,$db_user,$db_password);
  mysql_select_db($db_database, $db_link) or die( "Impossible de se connecter &agrave; la base");

  // Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_tradelog ORDER BY idTradelog DESC") or die(mysql_error());

 	// On affiche le resultat sous forme de tableau
  echo "<table>";

  while ( $log = mysql_fetch_array( $requete ) )
  {
  // On affiche la ligne du tableau de l'actu courante
  echo "<tr>
          <td><input name=\"member_num\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"" . $log[1] . "\" readonly /></td>
        </tr>
        <tr>
          <td><textarea rows=5 cols=72 name=\"contenu\" class=\"oblige\" readonly>" . $log[2] . "</textarea></td>
        </tr>
        <tr>
        <td><a href=\"upd_tradelog.php?id=" . $log[0] . "\"><img src=\"images/edit.gif\" /></a></td>
        </tr>
        <tr><td><hr /></td></tr>";
  }
  echo "</table>";

  mysql_close();

  include "footer.php";
?>