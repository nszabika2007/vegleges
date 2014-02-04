<?php

	/**
	*	Basic Layout Header Template.
	*	@Parameter $Title String .
	*/

?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $Title; ?></title>

<?php # Loading Javascript and CSS Files. # ?>

<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/main.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $view['assets']->getUrl('assets/css/bootstrap.css') ?>">

<script src="<?php echo $view['assets']->getUrl('assets/js/JQuery.js') ?>" type="text/javascript"></script>
<script src="<?php echo $view['assets']->getUrl('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo $view['assets']->getUrl('assets/js/main.js') ?>" type="text/javascript"></script>
</head>
<body>