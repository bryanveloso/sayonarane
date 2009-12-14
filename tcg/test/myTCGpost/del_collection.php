<?php
include "header.php";
include "config.php";
?>
<h2>Delete a Collection</h2>
<p>Do you really want to delete this Collection ?</p>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

  	$id_coll = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection WHERE idCollection='$id_coll'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $patch = mysql_fetch_array( $requete ) )
	{

		// Selection du template
	    	$requeteTpl = mysql_query("select * from $db_template WHERE idTemplate=$patch[6]") or die(mysql_error());
   		$tpl = mysql_fetch_array( $requeteTpl );

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		      <form name=\"delete\" method=\"post\" action=\"delete.php\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
          	  <input name=\"type_del\" type=\"hidden\" value=\"collection\" />
		      <td class=\"droitep\"> Name : </td><td class=\"pair\"><input name=\"name\" type=\"text\" size=\"30\" maxlength=\"50\" value=\"" . $patch[1] . "\" /></td></tr>
			<tr><td class=\"droite\"> Deck name : </td><td><input name=\"deck\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[2] . "\" /></td></tr>
			<tr><td class=\"droitep\"> Filler : </td>
			  <td class=\"pair\">";

			if ( $patch[3] == "" ) {
				echo "<img src=\"" . $_SESSION['url'] . "images/" . $_SESSION['defaultFiller'] . "\" />
				<input name=\"filler\" type=\"hidden\" value=\"" . $patch[3] . "\" />
				<br /><p class=\"legend\">(Default Filler)</p>";
			}
			else {
				echo "<img src=\"" . $_SESSION['url'] . "images/" . $patch[3] . "\" />";
			}

			echo "</td></tr>
			 <tr><td class=\"droite\"> Total cards : </td>
			  <td>" . $patch[4] . "</td></tr>
		      <tr><td class=\"droitep\"> Template : </td>
			  <td class=\"pair\">" . $tpl[1] . "</td></tr>
		      <tr><th></th><td><input name=\"delete\" type=\"submit\" value=\"Supprimer\"><br /></td>
		      </form></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>