<?php
include "header.php";
include "config.php";
?>
<h2>Cards categories</h2>
<p>Manage the categories for sorting the cards you have.</p>
<br />
<form name="add_cat" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
<table>
<tr><th colspan="2">Add a category</th></tr>
<tr><td class="droite">Name : </td><td><input name="name" type="text" size="50" maxlength="100" /></td></tr>
<tr><td class="droite"></td><td><input name="category" type="submit" value="Add"></td></tr>
</table>
</form>
<br />
<?php
	// Connexion a la base
	$db_link = @mysql_connect($db_server,$db_user,$db_password);
	@mysql_select_db($db_database, $db_link) or die( "Cannot connect to the database.");

	if( isset($_POST['category']) ) // si formulaire soumis
	{
		// recuperation des variables saisies dans le formulaire
		$nom = (isset($_POST['name']) && !empty($_POST['name']))?$_POST['name']:'';

		if(get_magic_quotes_gpc()) {
	           $nom = stripslashes($nom);
	      }

		$insert = sprintf("INSERT INTO $db_category ( name ) VALUES ('%s')",
			   mysql_real_escape_string($nom, $db_link));

		// Le fichier a bien ete transfere on ajoute alors les donnees a la table myinfos
		$ajout = mysql_query($insert) or die('Invalid query : ' . mysql_error());


		echo "<p><img src=\"images/info.gif\" />The category has been added.</p><br />";
		}


	// Execution de la requete selectionnant tous les enregistrements la table actualite
	$requete = mysql_query("select * from $db_category ORDER BY idCategory ASC") or die(mysql_error());

 	// On affiche le resultat
	echo "<h3>Categories</h3>
	<table>
	<th> ID </th>
	<th> Name </th>
	<th> Action </th>";

	// Pour afficher une ligne sur deux de couleur differente on declare une variable a 1, qu'on multiplie par -1 a chaque passage de boucle. et on teste son signe.
	$pair = 1;


	while( $actu = mysql_fetch_array( $requete ) )
	{
		// On definit si on est dans une ligne paire ou impaire pour afficher une couleur de fond différente
		($pair > 0) ? $classe = "pair" : $classe = "impair";
		$pair = $pair * -1;

		// On affiche la ligne du tableau de l'actu courante
		echo  "<tr>
		<td class=\"". $classe ."\">
		#" . $actu[0] . "</td>
		<td class=\"". $classe ."\">" . $actu[1] . "</td>
		<td class=\"". $classe ."\">";

		if ( $actu[0]!=1 && $actu[0]!=2 ) {
		echo "<a href=\"upd_category.php?id=" . $actu[0] . "\"> <img src=\"images/edit.gif\" /></a>	<a href=\"del_category.php?id=" . $actu[0] . "\" ><img src=\"images/del.gif\" /></a>";
		}

		echo "</td></tr>";
	}

	echo "</table>";

	mysql_close();

	include "footer.php";
?>