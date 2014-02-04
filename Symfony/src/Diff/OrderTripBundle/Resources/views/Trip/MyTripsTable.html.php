<div class='well' > 
	<?php
	
	$TableHelper -> set_heading( 'ID/Start Date' , 'End Date'  );
	
	$TMPL = array ( 'table_open'  => '<table class="table"  >' );
	
	$TableHelper -> set_template($TMPL);
	
	if ( count( $Trips ) > 0 )
		foreach( $Trips as $num => $Trip )
			{
				$StartDate = (array)$Trip -> getStartdate( ) ;
				
				$EndDate = (array)$Trip -> getEnddate( ) ;
				$Link_Cont = $Trip -> getId( ) . "/" . date ( 'Y-m-d' ,  strtotime($StartDate[ 'date' ]) ) ;	
				$TableHelper -> add_row( 
				"<a href='".
					$view['router']->generate( 
								'view_trip' , 
								array( 'TripID' => $Trip -> getId() ) ) ."' >" . $Link_Cont . "</a>" ,
					 
					( empty( $EndDate ) ) ? 'N/A' : date ( 'Y-m-d' ,  strtotime($EndDate[ 'date' ]) )
				);
			}
		
		Echo $TableHelper -> generate( ); 
		if( count( $Trips ) < 1 ):
			?> 
				<h2 class='alert alert-danger text-center' >No Results were found!</h2>
			<?php 
		endif;	
	
	?>
</div>	