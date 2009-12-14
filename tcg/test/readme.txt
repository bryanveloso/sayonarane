                   _______  _______  _______                       __    __
 .--------..--.--.|       ||   _   ||   _   |.-----..-----..-----.|  |_ |  |
 |        ||  |  ||.|   | ||.  1___||.  |___||  _  ||  _  ||__ --||   _||__|
 |__|__|__||___  |`-|.  |-'|.  |___ |.  |   ||   __||_____||_____||____||__|
           |_____|  |:  |  |:  1   ||:  1   ||__|
                    |::.|  |::.. . ||::.. . |
                    `---'  `-------'`-------'

*************************************************
*
*	myTCGpost!
*	Version 1.0
*
*	Made by lollie
*	http://www.lollie.fr
*
*************************************************

%%%%%%%%%%%%%%%%%%
%     ABOUT      %
%%%%%%%%%%%%%%%%%%

myTCGpost! is a php script for simply maintain a TCG post.

It is free for download and for use, and you can modify it for personnal purpose. No distribution of the modified script is allowed without explicit permission from me. Every modification must pass through my website under the modification/plugin section with a link back to the creator of the modification.
If you use it you may link back to http://www.lollie.fr
You can't distribute the script in hole or in parts for commercial purpose.


%%%%%%%%%%%%%%%%%%
%  INSTALLATION  %
%%%%%%%%%%%%%%%%%%

myTCGpost! requires PHP/MySQL. Please check with your host if you are unsure about this.

- Unzip the contents of myTCGpost! on your computer.

- Open the config.php file AND the install.php file in a text editor and modify the database info. If you have several scripts on the same database you can put a prefix to the myTCGpost! tables.

- Upload all the files contained in the .zip to your tcg post directory.

- Go to http://yoursite.com/your_tcg_post/TcgAdmin/install.php. You will be on the installation page. Fill in the fields and process the script installation.

- Create the images directories (for cards, tokens and badges) in your tcg post directory. Change rights to 755 to permit the file upload.

- Once you completed the installation delete the install.php file from your server.

%%%%%%%%%%%%%%%%%%
%     USAGE      %
%%%%%%%%%%%%%%%%%%

You will find some example files, but you can custom all your TCG post like you want!
You just need to include "TcgAdmin/config.php" file in all the files you want to use the script functions.


- TCG Profile :
Name of the TCG : <?= $tcg_name ?>
TCG post  url : <?= $tcg_url ?>
Current level you have in the game <?= $tcg_level ?>
Level image : <?= $tcg_level_image ?>
You membeer name : <?= $tcg_member_name ?>
The number of cards you own : <?= $tcg_cards_owned ?>
The number of card including their worth : <?= $tcg_cards_worth; ?>
List of all your current collections : <?= $tcg_current_collections; ?>
List of your wishlist : <?= $tcg_wishlist ?>
Your mastered collections : <?= $tcg_mastered_collections; ?>
Number of mastered collections : <?= $tcg_total_mastered; ?>

Ex :
<?
	// Display the total number of cards owned including their worth plus the number of mastered badges (worth = 1)
	echo $tcg_cards_worth + $tcg_total_mastered;
?>


- Tokens :
<?= $tcg_tokens ?>



- Cards by category :
$catCards : The category to display (You'll find the ID category in the control panel).

$CardTpl : Template to use.

$orderField :

$order : ASC, ascending, or DESC, descending.

<?= tcg_print_cards( $catCards, $CardTpl, $orderField = 1, $order = "ASC" ) ?>



- Collections :
$orderField : The sorting field ( 1 => idCollection, 2 => name, 3 => deck name, 4 => number of card already owned )

$CollectionTpl : specify the type of collection to display. If you let it to 0, it will display all the current collections. If you specify a number, it will display only the collections corresponding to this template (According to the template you specified in the control panel for each collection).

$order : ASC, ascending, or DESC, descending.

<?= tgc_print_collections( $orderField = 1, $CollectionTpl = 0, $order = "ASC" ); ?>



You can print only one collection by specifying its ID, but I recommend using the function above, to display collections by template.

<?= tgc_print_1collection( $IdCollection ) ?>



- Mastered collections :
$orderField : The sorting field ( 1 => idCollection, 2 => name, 3 => deck name )

$CollectionTpl : specify the type of collection to display. If you let it to 0, it will display all the current collections. If you specify a number, it will display only the collections corresponding to this template (According to the template you specified in the control panel for each mastered collection).

$order : ASC, ascending, or DESC, descending.

<?= tcg_print_mastered_colls( $orderField = 1, $CollectionTpl = 0, $order = "ASC" ); ?>



You can print only one collection by specifying its ID, but I recommend using the function above, to display collections by template.

<?= tcg_print_1mastered_coll( $IdCollection ) ?>



- Trade log :
Full trade log : <?= $tcg_full_log ?>

Display last month only : <?= $tcg_last_month ?>




%%%%%%%%%%%%%%%%%%
%    FEATURES    %
%%%%%%%%%%%%%%%%%%

- Cards Categories
- Multiple cards adding
- Templates
- Full Trade Log

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%    SUPPORT AND ASK FOR PLUGINS    %
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

You can email me at: lollie@orange.fr

