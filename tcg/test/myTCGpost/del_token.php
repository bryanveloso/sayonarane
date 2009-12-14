<?php
include "header.php";
include "config.php";
?>
<h2>Delete a Token</h2>
<p>Do you really want to delete this Token ?</p>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

  $id_cur = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_token WHERE idToken='$id_cur'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $patch = mysql_fetch_array( $requete ) )
	{
		echo "<tr><td class=\"droitep\"> Token : </td>
			  <form name=\"update\" method=\"post\" action=\"delete.php\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
		      <input name=\"image\" type=\"hidden\" value=\"" . $patch[2] . "\" />
			<input name=\"type_del\" type=\"hidden\" value=\"token\" />
		      <td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['tokenDir'] . $patch[2] . "\" /><br />
			<tr><td class=\"droite\"> Name : </td>
		      <td><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[1] . "\" readonly /></td></tr>
		      <tr><td class=\"droitep\"> Number : </td>
		      <td class=\"pair\"><input name=\"num\" type=\"text\" size=\"10\" maxlength=\"5\" value=\"" . $patch[3] . "\" readonly /></td></tr>
		      <tr><td class=\"droite\"></td>
		      <td> <input name=\"delete\" type=\"submit\" value=\"Delete\"><br /></td>
		      </form></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>