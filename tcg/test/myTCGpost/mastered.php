<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Mastered Collections</h2>
<p>You can see your mastered collections here.</p>
<br />
<?php
	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_mastered ORDER BY name ASC") or die(mysql_error());

 	// On affiche le resultat sous forme de tableau
	echo "<table>
	<th> Name (Deck) </th>
	<th> Master badge </th>
	<th> Action </th>";

	// Pour afficher une ligne sur deux de couleur differente on declare une variable a 1, qu'on multiplie par -1 a chaque passage de boucle. et on teste son signe.
	$pair = 1;

	$dir = $_SESSION['url'] . $_SESSION['currencyDir'];

	while( $actu = mysql_fetch_array( $requete ) )
	{
		// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
		($pair > 0) ? $classe = "pair" : $classe = "impair";
		$pair = $pair * -1;

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		<td class=\"". $classe ."\">" . $actu[1] . " (" . $actu[2] . ")</td>
		<td class=\"". $classe ."\"><img src=" . $_SESSION['url'] . $_SESSION['masteredDir'] . $actu[4] . " /></td>
		<td class=\"". $classe ."\"><a href=\"show_mastered.php?id=" . $actu[0] . "\"><img src=\"images/show.gif\" /></a> <a href=\"upd_mastered.php?id=" . $actu[0] . "\"><img src=\"images/edit.gif\" /></a> <a href=\"del_mastered.php?id=" . $actu[0] . "\" ><img src=\"images/del.gif\" /></a> </td>
		</tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>