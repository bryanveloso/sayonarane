<?php
function epure_nom( $nom_fichier )
{
// On remplace les caracteres accentues par des lettres sans accents
$dest_fichier = strtr($nom_fichier,

'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝאבגדהוחטיךכלםמןנעףפץצשתûü‎ÿ',

'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');

// On remplace les caracteres autres que lettres, chiffres et point par _
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);

return $dest_fichier;
}



?>