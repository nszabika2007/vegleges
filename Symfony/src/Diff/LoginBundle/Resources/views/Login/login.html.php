<?php 

/**
*	Rendering Header.
*/
	
Echo $view->render(
            'BassicLayoutBundle:BassicLayout:header.html.php' ,
			array( 'Title' => $Title )
			);
?>


<div class='container'>
	<br />
	<br />
	<div class='col-md-4' > </div> 
	<div class='col-md-4 well' >
	<h1 class='text-center' >Please Login</h1>
	<?php if ($error): ?>
    <div class='alert alert-danger text-center' ><b> <?php echo $error->getMessage() ?> </b></div>
	<?php endif; ?>
		<form method='POST' action='<?php echo $view['router']->generate('login_check'); ?>' >
			<label for="username">User:</label>
			<input class='form-control' id="username" type="text" name="_username" value="<?php echo $last_username; ?>" />
			<label for="password">Password:</label>
			<input class='form-control' id="password" type="password" name="_password" />
			<br />
			<input class='btn btn-primary' type="submit" name="login" />
		</form>
	</div>
	<div class='col-md-4' > </div> 
</div>
<?php 

/**
*	Rendering Footer.
*/
	
Echo $view->render(
            'BassicLayoutBundle:BassicLayout:footer.html.php' , 
			array( )
			);
?>
