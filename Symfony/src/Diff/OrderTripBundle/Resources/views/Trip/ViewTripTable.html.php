<h2 class='text-center' > Trip #<?php echo $TripID ; ?> </h2>

<div class='well' >
	
	<?php
		
		$TableHelper -> set_heading( 'Description' , 'File URL' );
		
		$TMPL = array ( 'table_open'  => '<table class="table"  >' );

		$TableHelper -> set_template($TMPL);
	
		foreach( $Files as $num => $File )
		{
			$File_URL = $URL . $File -> getFileName( ) ;	
			$TableHelper -> add_row( 
				$File -> getDesription( ) , 
				"<a href='" . $File_URL . "'target='_blank' >$File_URL </a>"
			);
		}
		
		Echo $TableHelper -> generate( ); 
		if( count( $Files ) < 1 ):
			?> 
				<h2 class='alert alert-danger text-center' >No Results were found!</h2>
			<?php 
		endif;	
	?>

</div>