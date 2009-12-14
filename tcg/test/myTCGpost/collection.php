<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Collections</h2>
<p>You can add a collection here.</p>
<br />
<form name="add_collection" method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF']; ?>">
<table>
<tr><th colspan="2">Add a collection</th></tr>
<tr><td class="droite">Name : </td><td><input name="name" type="text" size="30" maxlength="50" /><br />
<p class="legend">(This is the name of the serie.)</p>
</td></tr>
<tr><td class="droitep">Deck name : </td><td class="pair"><input name="deck" type="text" size="50" maxlength="100" /><br />
<p class="legend">(This is the name of the card deck (Or root of the images names).)</p>
</td></tr>
<tr><td class="droite">Filler : </td><td><br /><img src="<?= $_SESSION['url'] . 'images/' . $_SESSION['defaultFiller'] ?>" /><br />
<p class="legend">(Default Filler)</p>
<input type="file" name="filler" /><br />
<input type="checkbox" name="d_filler" value="d" id="replace" checked /> Use default filler defined in the settings.
</td></tr>
<tr><td class="droitep">Total cards : </td><td class="pair"><input name="total" type="text" size="5" maxlength="2" value="<?= $_SESSION['nbCardDesk']; ?>" /></td></tr>
<tr><td class="droite">Template : </td><td>
<select name="template">
<option value="">       </option>
<option value="">-------</option>
<?php
// Execution de la requete selectionnant tous les enregistrements la table category
$requete1 = mysql_query("select * from $db_template ORDER BY name") or die(mysql_error());
while( $tpl = mysql_fetch_array( $requete1 ) )
{
  // On affiche la ligne du tableau de l'actu courante
  echo "<option value=\"" . $tpl[0] . "\">" . $tpl[1] . "</option>";
}
?>
</select>
</td></tr>
<tr><td class="droite"></td><td><input name="addColl" type="submit" value="Add"></td></tr>
</table>
</form>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

	if( isset($_POST['addColl']) ) // si formulaire soumis
	{
		// recuperation des variables saisies dans le formulaire
		$name = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';
		$deck = (isset($_POST['deck']) && !empty($_POST['deck']))?$_POST['deck']:'';
		$dFiller = (isset($_POST['d_filler']) && !empty($_POST['d_filler']))?$_POST['d_filler']:'';
		$total = (isset($_POST['total']) && !empty($_POST['total']))?$_POST['total']:'';
		$tpl = (isset($_POST['template']) && !empty($_POST['template']))?$_POST['template']:'';

		$content_dir = $_SESSION['rootPath'] . "images/"; // dossier où sera déplacé le fichier

		if ($dFiller != "d") {
			$tmp_file = $_FILES['filler']['tmp_name'];

			// on vérifie maintenant l'extension
			$type_file = $_FILES['filler']['type'];

			// on copie le fichier dans le dossier de destination
			$name_file = $_FILES['filler']['name'];

			if( !is_uploaded_file($tmp_file) )
			{
			    echo("<p><img src=\"images/info.gif\" /> File not found.</p><br />");
			}
			else if( !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
			{
			    echo("<p><img src=\"images/info.gif\" /> The file type must be gif or png.</p><br />");
			}

			// Si le fichier a uploader existe mais qu'on a pas coche la case, on previent qu'il existe et qu'en cas de remplacement il faut cocher la case
			else if( file_exists($content_dir . $name_file) )
			{
				echo("<p><img src=\"images/info.gif\" /> The file already exists.<br />");
			}
			else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
			{
			    echo("<p><img src=\"images/info.gif\" /> The file was not copied in the directory \"$content_dir\".</p><br />");
			}
			else
			{
				$insert = sprintf("INSERT INTO $db_collection ( name, deck, filler, nbCards, idTemplate ) VALUES ('%s', '%s', '%s', '%d', '%d')",
						mysql_real_escape_string($name, $db_link),
						mysql_real_escape_string($deck, $db_link),
						$name_file,
						$total,
						$tpl);
			}
		}
		else {
				$insert = sprintf("INSERT INTO $db_collection ( name, deck, nbCards, idTemplate ) VALUES ('%s', '%s', '%d', '%d')",
						mysql_real_escape_string($name, $db_link),
						mysql_real_escape_string($deck, $db_link),
						$total,
						$tpl);

		}

		// Le fichier a bien ete transfere on ajoute alors les donnees a la table card
		$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());

		echo "<p><img src=\"images/info.gif\" />The collection has been added.</p><br />";
	}



	// Mise à jour des cartes de la collection possedees
	if( isset($_POST['listC']) ) // si formulaire soumis
	{
		$ido = (isset($_POST['ido']) && !empty($_POST['ido']))?$_POST['ido']:'';
		$clist = (isset($_POST['card_list']) && !empty($_POST['card_list']))?$_POST['card_list']:'';

		$list = implode(';',$clist);

		$update = sprintf("UPDATE $db_collection SET cardList='%s' WHERE idCollection='%d'",
				   $list,
				   $ido);

	    	$maj = mysql_query($update) or die('Requête invalide : ' . mysql_error());

		echo "<p><img src=\"images/info.gif\" />Your collection has been updated.</p><br />";
	}



	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_collection ORDER BY name ASC") or die(mysql_error());

 	// On affiche le resultat sous forme de tableau
	echo "<h3>Collections</h3>
	<table>
	<th> Name (Deck) </th>
	<th> Cards </th>
	<th> Total </th>
	<th> Action </th>";

	// Pour afficher une ligne sur deux de couleur differente on declare une variable a 1, qu'on multiplie par -1 a chaque passage de boucle. et on teste son signe.
	$pair = 1;

	while( $actu = mysql_fetch_array( $requete ) )
	{
		// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
		($pair > 0) ? $classe = "pair" : $classe = "impair";
		$pair = $pair * -1;

		// On affiche la ligne du tableau de l'actu courante
		echo "<tr>
		<td class=\"". $classe ."\">" . $actu[1] . " (" . $actu[2] . ")</td>
		<td class=\"". $classe ."\">
		<form name=\"listC" . $actu[0] . "\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
		<input name=\"ido\" type=\"hidden\" size=\"1\" maxlength=\"1\" value=\"" . $actu[0] . "\" />";

		// Recuperation de la liste des cartes possedees
		$clist = explode(';',$actu[5]);

		// Affichage des cases a cocher pour choisir les cartes possedees
		$th = 0;
		for ( $i=1 ; $i<=$actu[4] ; $i++ )
		{
			$th++;

			if ( $i < 10 ) $num = "0" . $i;
			else $num = $i;

			if ( in_array ($i, $clist) ) {
			   echo "<input type=\"checkbox\" name=\"card_list[]\" value=\"" . $num . "\" checked/>" . $num . " &nbsp; ";
			}
			else echo "<input type=\"checkbox\" name=\"card_list[]\" value=\"" . $num . "\" />" . $num . " &nbsp; ";

			if ($th == 5) {
				echo "<br />";
				$th = 0;
			}

		}

		echo "<input name=\"listC\" type=\"submit\" value=\"Update cards\">
		</form>
		</td>
		<td class=\"". $classe ."\">" . $actu[4] . "</td>
		<td class=\"". $classe ."\"><a href=\"show_collection.php?id=" . $actu[0] . "\"><img src=\"images/show.gif\" /></a> <a href=\"upd_collection.php?id=" . $actu[0] . "\"><img src=\"images/edit.gif\" /></a> <a href=\"master_collection.php?id=" . $actu[0] . "\"><img src=\"images/master.gif\" /></a> <a href=\"del_collection.php?id=" . $actu[0] . "\" ><img src=\"images/del.gif\" /></a> </td>
		</tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>