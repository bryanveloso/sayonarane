<?php
include "header.php";
include "config.php";

?>
<h2>Copy a card</h2>
<p>You can choose the category of the new card, and its worth.</p>
<br />
<?php
// Connexion a la base
$db_link = @mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database, $db_link) or die("Cannot connect to the database.");

$id_card = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

if (isset($_POST['addCard']) && !empty($_POST['addCard'])) { // si formulaire soumis
	echo "<p><img src=\"images/info.gif\" /> ";

	// recuperation des variables saisies dans le formulaire
	$image = (isset($_POST['image']) && !empty($_POST['image']))?$_POST['image']:'';
	$num = (isset($_POST['num']) && !empty($_POST['num']))?$_POST['num']:'';
	$cat = (isset($_POST['category']) && !empty($_POST['category']))?$_POST['category']:'';


	$insert = sprintf("INSERT INTO $db_card ( card, worth, idCategorie ) VALUES ('%s', '%d', '%d')",
		$image,
		$num,
		$cat);

	// Le fichier a bien ete transfere on ajoute alors les donnees a la table card
	$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());

	echo "The card has been copied.</p><br />";
}
// Execution de la requete selectionnant tous les enregistrements la table actualite
$requete = mysql_query("select * from $db_card WHERE idCard='$id_card'") or die(mysql_error());
// On affiche le resultat sous forme de tableau
echo "<table>";

while ($patch = mysql_fetch_array($requete)) {

	// On affiche la ligne du tableau de l'actu courante
	echo "<tr><td class=\"droitep\"> Card </td>
	<form name=\"add_card\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_card\">
	<input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
	<input name=\"image\" type=\"hidden\" value=\"" . $patch[1] . "\" />
	<td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['cardDir'] . $patch[1] . "\" /></td></tr>
	<tr><td class=\"droite\"> Category </td>
	<td><select name=\"category\"><option value=\"1\">Currently Collecting</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";

	$requete = mysql_query("select * from $db_category WHERE idCategory<>'1' AND idCategory<>'2' ORDER BY name") or die(mysql_error());
	while( $cat = mysql_fetch_array( $requete ) )
	{
	     echo "<option value=\"$cat[0]\">$cat[1]</option>";
	}

	echo "</select></td><tr><td class=\"droitep\"> Worth </td>
	<td class=\"pair\"><input name=\"num\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"" . $patch[3] . "\" />
	<p class=\"legend\">(If you have one copy of the card, leave this number to 0.)</p></td></tr>
	<tr>
	<td><input name=\"addCard\" type=\"submit\" value=\"Copy\"></td><td></td>
	</form></tr>";
}

echo "</table>";

mysql_close();

include "footer.php";

?>