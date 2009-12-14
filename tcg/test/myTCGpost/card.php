<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Cards</h2>
<p>You can manage your cards here.</p>
<br />
<form name="num_card" method="post" action="add_card.php">
Number of cards to add : <input name="number" type="text" size="5" maxlength="2" value="1" />
<input name="numCard" type="submit" value="ok">
</form>
<br />
<?php
 	// On affiche le resultat sous forme de tableau
	echo "<h3>Cards</h3>";


	if (isset($_POST['display']) && isset($_POST['choice']) && !empty($_POST['choice']) )
	{
		if($_POST['choice'] == 10000 )
			$request = "select * from $db_card ORDER BY card";
		else $request = "select * from $db_card WHERE idCategorie=" . $_POST['choice'] . " ORDER BY card ASC";
	}
	else $request = "select * from $db_card ORDER BY idCard DESC LIMIT 21";

	// Afficher les cartes de la categorie selectionnee
	// Creation de la liste de selection
	$requeteCat = mysql_query("select * from $db_category WHERE idCategory<>'1' AND idCategory<>'2' ORDER BY name") or die(mysql_error());

	echo "<br /><form action=\"" . $_SERVER['PHP_SELF'] . "\" method=\"post\">Display : <select name=\"choice\">";


	switch( $_POST['choice'] ){
		case 10000 : echo "
	<option value=\"\">Last added</option>
	<option value=\"10000\" selected>All cards</option>
	<option value=\"\">-------</option>
	<option value=\"1\">Currently Collecting</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";
			break;
		case 1 : echo "
	<option value=\"\">Last added</option>
	<option value=\"10000\">All cards</option>
	<option value=\"\">-------</option>
	<option value=\"1\" selected>Currently Collecting</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";
			break;
		case 2 : echo "
	<option value=\"\">Last added</option>
	<option value=\"10000\">All cards</option>
	<option value=\"\">-------</option>
	<option value=\"1\">Currently Collecting</option>
	<option value=\"2\" selected>Mastered Collections</option>
	<option value=\"\">-------</option>";
			break;
		default: echo "
	<option value=\"\" selected>Last added</option>
	<option value=\"10000\">All cards</option>
	<option value=\"\">-------</option>
	<option value=\"1\">Currently Collecting</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";
	} // switch


	while( $cat = mysql_fetch_array( $requeteCat ) )
	{
		if ( isset($_POST['choice']) && !empty($_POST['choice']) && $_POST['choice']==$cat[0] )
		{
			echo "<option value=\"" . $cat[0] . "\" selected>" . $cat[1] . "</option>";
		}
		else echo "<option value=\"" . $cat[0] . "\">" . $cat[1] . "</option>";
	}
	echo "</select>
	<input name=\"display\" type=\"submit\" value=\"ok\">
	</form><br /><br />";


	// Creation de la requete qui selectionne les cartes a afficher
	$affCards = mysql_query($request) or die(mysql_error());


	// Pour afficher une ligne sur deux de couleur differente on declare une variable a 1, qu'on multiplie par -1 a chaque passage de boucle. et on teste son signe.
	$pair = 1;
	$line = 0;

	$dir = $_SESSION['url'] . $_SESSION['cardDir'];

	echo "<table>";

	while( $card = mysql_fetch_array( $affCards ) )
	{
		// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
		($pair > 0) ? $classe = "centrep" : $classe = "centrei";
		$pair = $pair * -1;

		if ($line == 0) echo "<tr>";

		// On affiche la ligne du tableau de l'actu courante
		echo "<td class=\"". $classe ."\"><img src=\"" . $dir . $card[1] . "\" alt=\"" . $card[1] . "\" title=\"" . $card[1] . "\" /><br /><br /><a href=\"upd_card.php?id=" . $card[0] . "\"><img src=\"images/edit.gif\" /></a> <a href=\"copy_card.php?id=" . $card[0] . "\"><img src=\"images/copy.gif\" /></a> <a href=\"del_card.php?id=" . $card[0] . "\" ><img src=\"images/del.gif\" /></a></td>";

		$line++;

		if ($line == 7) {
			echo "</tr>";
			$line = 0;
		}
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>