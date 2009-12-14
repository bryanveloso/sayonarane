<?php
include "header.php";
include "config.php";
?>
<h2>Delete a card</h2>
<p>Do you really want to delete this card?</p>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

  	$id_card = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';




	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_card WHERE idCard='$id_card'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $patch = mysql_fetch_array( $requete ) )
	{
		// Requete qui compte le nombre de cartes qui utilisent la meme image
		$requetenb = mysql_query("select COUNT(idCard) from $db_card WHERE card='$patch[1]'") or die(mysql_error());
		$nbCopies = mysql_fetch_array( $requetenb );

		// Selection de la categorie
		$requeteCat = mysql_query("select * from $db_category WHERE idCategory=$patch[2]") or die(mysql_error());
   		$cat = mysql_fetch_array( $requeteCat );

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		      <form name=\"delete\" method=\"post\" action=\"delete.php\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
		      <input name=\"image\" type=\"hidden\" value=\"" . $patch[1] . "\" />
		      <input name=\"copies\" type=\"hidden\" value=\"" . $nbCopies[0] . "\" />
	          	<input name=\"type_del\" type=\"hidden\" value=\"card\" />
		      <td class=\"droitep\"> Card </td>
			<td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['cardDir'] . $patch[1] . "\" /><br /><br /><img src=\"images/info.gif\" /> ";

			if ($nbCopies[0] == 1) {
				echo "This is the only card that uses this image.<br />If you delete the card, the image will be deleted too.";
			}
			else if ($nbCopies[0] == 2) {
				echo "There is 1 card left that uses this image.<br />If you delete the card, the image won't be deleted.";
			} else if ($nbCopies[0] > 2) {
				echo "There are " . ($nbCopies[0]-1) . " cards left that use this image.<br />If you delete the card, the image won't be deleted.";
			}

		      echo "</td></tr><tr><td class=\"droite\"> Category </td>
			<td>" . $cat[1] . "</td></tr>
			<tr><td class=\"droitep\"> Worth </td>
		      <td class=\"pair\"><input name=\"worth\" type=\"text\" size=\"30\" maxlength=\"5\" value=\"" . $patch[3] . "\" readonly /></td></tr>
		      <tr><td></td><td><input name=\"delete\" type=\"submit\" value=\"Delete\"><br /></td>
		      </form></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>