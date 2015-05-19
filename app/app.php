<?php
/**
 * Pattery
 *
 * Pattery is a simple, flat-file-based pastebin/documentator/styleguide written in PHP.
 * You can simply store your scripts in the content-folder and add some extra-informations with ease.
 *
 * @package Pattery
 * @author Konrad Schneider <info@gregg.in>
 * @copyright Konrad Schneider
 *
 */

if(!defined('Pattery')) {
 die('Direct access not permitted');
}

define('DS', DIRECTORY_SEPARATOR);

// include vendors
include 'vendors/Spyc.php';
include 'vendors/parsedown.php';
include 'lib/helpers.php';

$files 	= new Files();
$site 	= new Site();

// render template
include render('content');
?>