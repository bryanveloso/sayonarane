<?php
include "header.php";
include "config.php";

// Connexion a la base
$db_link = @mysql_connect($db_server,$db_user,$db_password);
@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");
?>
<h2>Cards</h2>
<p>You can add your cards here.</p>
<br />
<?php
	if ( isset($_POST['numCard']) )
	{
		$num = (isset($_POST['number']) && !empty($_POST['number']))?$_POST['number']:1;
		$pair = 1;
		$categories = array();

		// Remplissage d'un tableau associatif qui contiendra les ID de categories ainsi que leurs noms
		$requeteCat = mysql_query("select * from $db_category WHERE idCategory<>'1' AND idCategory<>'2' ORDER BY name") or die(mysql_error());
		while( $cat = mysql_fetch_array( $requeteCat ) )
		{
			$categories[$cat[0]] = $cat[1];
		}

		// Aficchage du tableau contenant les formulaires d'ajout
		echo "<form name=\"add_card\" method=\"post\" enctype=\"multipart/form-data\" action=\"" . $_SERVER['PHP_SELF'] . "\">
		<input name=\"numCards\" type=\"hidden\" value=\"" . $num . "\" /><table>";

		for( $i=1 ; $i<=$num ; $i++ )
		{
			// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
			($pair > 0) ? $classe = "pair" : $classe = "impair";
			$pair = $pair * -1;


			// On affiche le formulaire d'ajout d'une carte
			echo "<tr><td class=\"". $classe ."\">Image : </td><td class=\"". $classe ."\"><input type=\"file\" name=\"card". $i ."\" /></td></tr>
			<tr><td class=\"". $classe ."\">Worth : </td><td class=\"". $classe ."\"><input name=\"worth". $i ."\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"1\" /></td></tr>
			<tr><td class=\"". $classe ."\">Category : </td><td class=\"". $classe ."\"><select name=\"category". $i ."\">
				<option value=\"\">       </option>
				<option value=\"\">-------</option>
				<option value=\"1\">Currently Collecting</option>
				<option value=\"2\">Mastered Collections</option>
				<option value=\"\">-------</option>";

				// Remplissage du menu deroulant avec les valeurs du tableau categories
				foreach($categories as $key=>$value)
				{
					echo "<option value=\"". $key ."\">". $value ."</option>";
				}


				echo "</select></td></tr>";

		}
		echo "<tr><td colspan=\"3\"><input name=\"addCard\" type=\"submit\" value=\"Add\"></td></tr></table></form>";
	}

	if ( isset($_POST['addCard']) )
	{
		// Recuperation du nombre de cartes normalement ajouté
		$num = (isset($_POST['numCards']) && !empty($_POST['numCards']))?$_POST['numCards']:1;
		$content_dir = $_SESSION['rootPath'] . $_SESSION['cardDir']; // dossier où sera déplacé le fichier
		$dir = $_SESSION['url'] . $_SESSION['cardDir'];

		// On boucle le nombre de fois qu'on ajoute de cartes
		for( $i=1 ; $i<=$num ; $i++ )
		{
			$catField = "category" . $i;
			$worthField = "worth" . $i;
			$cardField = "card" . $i;

			// recuperation des variables saisies dans le formulaire
			$cat = (isset($_POST[$catField]) && !empty($_POST[$catField]))?$_POST[$catField]:'';
			$worth = (isset($_POST[$worthField]) && !empty($_POST[$worthField]))?$_POST[$worthField]:'';

			$tmp_file = $_FILES[$cardField]['tmp_name'];

			// on vérifie maintenant l'extension
			$type_file = $_FILES[$cardField]['type'];

			// on copie le fichier dans le dossier de destination
			$name_file = $_FILES[$cardField]['name'];


			if( !is_uploaded_file($tmp_file) )
			{
			    echo("<p><img src=\"images/info.gif\" /> File \"$name_file\" not found.</p><br />");
			}
			else if( !strstr($type_file, 'gif') && !strstr($type_file, 'png'))
			{
			    echo("<p><img src=\"images/info.gif\" /> The file type must be gif or png.</p><br />");
			}

			// Si le fichier a uploader existe mais qu'on a pas coche la case, on previent qu'il existe et qu'en cas de remplacement il faut cocher la case
			else if( file_exists($content_dir . $name_file) )
			{
				echo("<p><img src=\"images/info.gif\" /> The file \"$name_file\" already exists.<br />");
				echo("It means you already have this card registered.<br />
					If you want to add a copy to this card, clic on the <img src=\"images/copy.gif\" /> link on the chosen card.</p><br />");
			}
			else if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
			{
			    echo("<p><img src=\"images/info.gif\" /> The file \"$name_file\" was not copied in the directory \"$content_dir\".</p><br />");
			}
			else
			{

				$insert = sprintf("INSERT INTO $db_card ( card, worth, idCategorie ) VALUES ('%s', '%d', '%d')",
						$name_file,
						$worth,
						$cat);

				// Le fichier a bien ete transfere on ajoute alors les donnees a la table card
				$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());


				echo "<p><img src=\"images/info.gif\" />The card <img src=\"". $dir . $name_file ."\" /> has been added.</p><br />";
			}

		}

		// Affichage du formulaire d'ajout de nouvelles cartes
		echo "<h3>Add other cards ?</h3>
			<form name=\"num_card\" method=\"post\" action=\"" . $_SERVER['PHP_SELF'] . "\">
			Number of cards to add : <input name=\"number\" type=\"text\" size=\"5\" maxlength=\"2\" value=\"1\" />
			<input name=\"numCard\" type=\"submit\" value=\"ok\">
			</form>";
	}
	mysql_close();

	include "footer.php";
?>