
<?php if ( isset( $TripID ) ): ?>
	<h2 class='text-center' > Bills For Trip #<?php echo $TripID ; ?> </h2>
<?php endif ; ?>

<?php if ( isset( $OrderID ) ): ?>
	<h2 class='text-center' > Bills For Order #<?php echo $OrderID ; ?> </h2>
<?php endif ; ?>



<div class='well' >
	<div class="table-responsive">
	<?php
		
		$Type = ( isset($TripID) ) ? "TRIP" : "ORDER" ; 
		$ID = ( isset( $TripID ) ) ? $TripID : $OrderID ; 
		
		$TableHelper -> set_heading( 'Date' , 'Amount' , 'File URL' , '' );
		
		$TMPL = array ( 'table_open'  => '<table class="table"  >' );

		$TableHelper -> set_template($TMPL);
	
		foreach( $Bills as $num => $Bill )
		{
			$DeleteLink =  $view['router']->generate(
				'bill_delete', 
				array( 
					'Type' 	=> $Type ,
					'BillID' 	=> $Bill -> getId( ) ,
					'ID'		=> $ID				
			 ) );
			$File_URL = $URL . $Bill -> getFileName( ) ;	
			$date = (array)$Bill -> getDate();
			$FormattedDate =  date( 'Y-m-d' , strtotime( $date['date'] ) ) ;
			$TableHelper -> add_row( 
						$FormattedDate ,
				$Bill -> getAmount( ) , 
				"<a href='" . $File_URL . "'target='_blank' >Click here to view bill </a>" ,
				"<a href='" . $DeleteLink . "'>Delete</a>"
			);
		}
		
		Echo $TableHelper -> generate( ); 
		if( count( $Bills ) < 1 ):
			?> 
				<h2 class='alert alert-danger text-center' >No Results were found!</h2>
			<?php 
		endif;	
	?>
	
	</div>
</div>