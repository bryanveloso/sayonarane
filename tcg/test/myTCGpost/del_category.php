<?php
include "header.php";
include "config.php";
?>
<h2>Delete a Category</h2>
<p>Do you really want to delete this Category?</p>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

	$id_cat = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_category WHERE idCategory='$id_cat'") or die(mysql_error());

	// On affiche le resultat sous forme de tableau
	echo "<table>";

	while( $patch = mysql_fetch_array( $requete ) )
	{
		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		      <form name=\"delete\" method=\"post\" action=\"delete.php\">
		      <input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
	          	<input name=\"type_del\" type=\"hidden\" value=\"category\" />
		      <td class=\"droitep\"> Name : </td>
		      <td class=\"pair\"><input name=\"name\" type=\"text\" size=\"50\" maxlength=\"100\" value=\"" . $patch[1] . "\" readonly /></td></tr>
		      <tr><td><input name=\"delete\" type=\"submit\" value=\"Delete\"><br /></td>
		      <td></td>
		      </form></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>