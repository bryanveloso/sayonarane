<?php
/*
 * Created on 7 mars 2006 by Pascale OUDIN
 *
 * Site de la Mairie de Bettancourt La Ferrée
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
session_start();
$_SESSION = array();
session_destroy();
//setcookie( 'enth3_password', '', time() - 3600 );
header( 'location: index.html' );
?>
