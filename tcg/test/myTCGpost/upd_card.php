<?php
include "header.php";
include "config.php";

?>
<h2>Edit a card</h2>
<p>You can edit the category of the card, or its worth.</p>
<br />
<?php
// Connexion a la base
$db_link = @mysql_connect($db_server, $db_user, $db_password);
@mysql_select_db($db_database, $db_link) or die("Cannot connect to the database.");

$id_card = (isset($_GET['id']) && !empty($_GET['id']))?$_GET['id']:'';

if (isset($_POST['update']) && !empty($_POST['update'])) { // si formulaire soumis
        echo "<p><img src=\"images/info.gif\" /> ";

    // recuperation des variables saisies dans le formulaire
    $id = (isset($_POST['id']) && !empty($_POST['id']))?$_POST['id']:'';
    $num = (isset($_POST['num']) && !empty($_POST['num']))?$_POST['num']:'';
    $cat = (isset($_POST['category']) && !empty($_POST['category']))?$_POST['category']:'';


        $update = sprintf("UPDATE $db_card SET worth='%d', idCategorie='%d' WHERE idCard='%d'",
            $num,
		$cat,
            $id
            );

    $maj = mysql_query($update) or die('Invalid Request : ' . mysql_error());
    echo "Data updated.</p><br />";
}
// Execution de la requete selectionnant tous les enregistrements la table actualite
$requete = mysql_query("select * from $db_card WHERE idCard='$id_card'") or die(mysql_error());
// On affiche le resultat sous forme de tableau
echo "<table>";

while ($patch = mysql_fetch_array($requete)) {

	// On affiche la ligne du tableau de l'actu courante
	echo "<tr><td class=\"droitep\"> Card </td>
	<form name=\"update\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "?id=$id_card\">
	<input name=\"id\" type=\"hidden\" value=\"" . $patch[0] . "\" />
	<td class=\"pair\"><img src=\"" . $_SESSION['url'] . $_SESSION['cardDir'] . $patch[1] . "\" /></td></tr>
	<tr><td class=\"droite\"> Category </td>
	<td><select name=\"category\">";

	switch( $patch[2] ){
		case 1 : echo "<option value=\"1\" selected>Currently Collecting (Current)</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";
			break;
		case 2 : echo "<option value=\"1\">Currently Collecting</option>
	<option value=\"2\" selected>Mastered Collections (Current)</option>
	<option value=\"\">-------</option>";
			break;
		default: echo "<option value=\"1\">Currently Collecting</option>
	<option value=\"2\">Mastered Collections</option>
	<option value=\"\">-------</option>";
	} // switch

	$requete = mysql_query("select * from $db_category WHERE idCategory<>'1' AND idCategory<>'2' ORDER BY name") or die(mysql_error());
	while( $cat = mysql_fetch_array( $requete ) )
	{
	  if ( $cat[0] == $patch[2] )
	  {
	 	echo "<option value=\"$cat[0]\" selected>$cat[1] (Current)</option>";
	  }
	  else echo "<option value=\"$cat[0]\">$cat[1]</option>";
	}

	echo "</select></td><tr><td class=\"droitep\"> Worth </td>
	<td class=\"pair\"><input name=\"num\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"" . $patch[3] . "\" />
	<p class=\"legend\">(If you have one copy of the card, leave this number to 0.)</p></td></tr>
	<tr>
	<td><input name=\"update\" type=\"submit\" value=\"Edit\"></td><td></td>
	</form></tr>";
}

echo "</table>";

mysql_close();

include "footer.php";

?>