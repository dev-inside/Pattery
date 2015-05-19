<!DOCTYPE html>
<html lang="<?php echo $site->iso ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php echo $site->title ?></title>
	<meta name="description" content="<?php echo $site->description ?>" />
	<meta name="keywords" content="<?php echo $site->keywords ?>" />
	<?php echo css(Options::style()) ?>
	<?php echo css(Options::code()) ?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
	<?php echo js('highlight.pack') ?>
	<?php echo js('uikit') ?>
	<?php echo less('style') ?>
	<?php echo js('less') ?>
	<?php echo js('components/sticky') ?>
</head>
<body>