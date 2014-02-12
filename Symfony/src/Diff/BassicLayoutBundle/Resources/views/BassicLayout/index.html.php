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
<meta name="viewport" content="witdht=device-width" />

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

	

<?php						
	$FlashBag = null ;
	if ( isset( $Session ) )
	$FlashBag = $Session -> getFlashBag() -> all( ) ;					
?>
		
<div class='container'>
	
	<?php if( $MenuDisplay === TRUE ): ?>
		<div class='row' >
			<div class="pull-right well">
				Welcome <b><?php echo $UserObject -> getUsername( ) ; ?></b>
			</div>
		</div>
	<?php endif; ?>	
	
	<?php if ( count( $FlashBag ) > 0 ): ?>
		<div class='alert alert-danger text-center' >
			<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
			<h3> Warning! </h3>
		<?php foreach ($FlashBag[ 'Error' ] AS $num => $Message ): ?>
			 <?php echo $Message ; ?> 
		<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php Echo $Content; ?>

</div>

</body>
</html>