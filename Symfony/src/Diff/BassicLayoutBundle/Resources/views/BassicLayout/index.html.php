<?php
	
	/**
	*	Defining the Domain .
	*/
	
	$Host =  'http://'. $app -> getRequest( ) -> getHost( ) ;
	
	/**
	*	Basic Layout Template.
	*	@Parameter $Title String .
	*	@Parameter $Content String.
	*/

?>

<!DOCTYPE html>
<html>
<head>
<title><?php Echo $Title; ?></title>

<?php # Loading Javascript and CSS Files. # ?>

<link rel="stylesheet" type="text/css" href="<?php echo $Host.$view['assets']->getUrl('assets/css/main.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $Host.$view['assets']->getUrl('assets/css/bootstrap.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo $Host.$view['assets']->getUrl('assets/css/bootstrap-fileupload.css') ?>">
<link type="text/css" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />

<script src="<?php echo $Host.$view['assets']->getUrl('assets/js/JQuery.js') ?>" type="text/javascript"></script>
<script src="<?php echo $Host.$view['assets']->getUrl('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo $Host.$view['assets']->getUrl('assets/js/bootstrap-fileupload.min.js') ?>" type="text/javascript"></script>

<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js" type="text/javascript"></script>
<script src="<?php echo $Host.$view['assets']->getUrl('assets/js/main.js') ?>" type="text/javascript"></script>
</head>
<body>

<?php
	/**
	*	Displaying Menu.
	*/
	if( $MenuDisplay === TRUE )
		Echo $view -> render( 
							'BassicLayoutBundle:BassicLayout:menu.html.php',
							array( 'UserObject' => $UserObject ) 
						);
	
?>

<div class='container'>

<?php Echo $Content; ?>

</div>

</body>
</html>