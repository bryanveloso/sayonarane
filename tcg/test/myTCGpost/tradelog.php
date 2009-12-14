<?php
include "header.php";
include "config.php";
?>
<h2>Trade log</h2>
<p>Here you can manage your trade log. You can only update the last month added (the current), when the month change, you add a new one and begin to add the trades of this new month.<br />
You can use html in your log, but no need to add &lt;br /&gt; tags, they will be added automaticaly.
</p>
<p>Clic <a href="displog.php">here</a> to display all the log.</p>
<br />
<form name="add_date" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<p>Add a month : <input name="date" type="text" size="30" maxlength="50" />
<input name="add" type="submit" value="Add"></p>
</form>
<br />
<?php

  // Connexion a la base
  $db_link = @mysql_connect($db_server,$db_user,$db_password);
  @mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");


  if( isset($_POST['add']) ) // si formulaire soumis
  {
    // recuperation des variables saisies dans le formulaire
    $date = (isset($_POST['date']) && !empty($_POST['date']))?$_POST['date']:'';

    // On met a jour la table admin
    $insert = "INSERT INTO $db_tradelog( month ) VALUES('$date' )";
    $ajout = mysql_query($insert) or die('Requête invalide : ' . mysql_error());

    echo "<img src=\"images/info.gif\" /> A date has been added.<br />";

  }

  if( isset($_POST['update']) ) // si formulaire soumis
  {
    // recuperation des variables saisies dans le formulaire
    $log = (isset($_POST['log']) && !empty($_POST['log']))?$_POST['log']:'';
    $id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';

    // On met a jour la table admin
    $up = "UPDATE $db_tradelog SET log='$log' WHERE idTradelog='$id'";
    $maj = mysql_query($up) or die('Requête invalide : ' . mysql_error());

    echo "<img src=\"images/info.gif\" /> The log has been updated.<br />";

  }

  // Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_tradelog ORDER BY idTradelog DESC LIMIT 1") or die(mysql_error());

  $log = mysql_fetch_array( $requete );

	if($log)
	{
		// On affiche le resultat sous forme de tableau
		echo "<form name=\"tradelog\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\"><table>";

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		<input name=\"id\" type=\"hidden\" value=\"" . $log[0] . "\" />
		<td class=\"droite\"> Month : </td><td><input name=\"month\" type=\"text\" size=\"20\" maxlength=\"50\" value=\"" . $log[1] . "\" readonly /></td>
		</tr>
		<tr>
		<td class=\"droite\"> Log : </td><td><textarea rows=5 cols=72 name=\"log\">" . $log[2] . "</textarea></td>
		</tr>";

		echo "<tr><td class=\"droite\"><input name=\"update\" type=\"submit\" value=\"Update\"></td><td><input name=\"cancel\" type=\"reset\" value=\"Cancel changes\"></td></tr></table></form>";
	}

  mysql_close();

  include "footer.php";
?>