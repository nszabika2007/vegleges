<h1 class='text-center' > Orders Usage </h1>
<h3> Global Amount <?php echo $GlobalAmount ; ?> </h3>
<div class='well'>
	
	<?php 
		//d( $UserStats );
	 ?>
	<?php
		$TableHelper -> set_heading( 'User' , 'Name' , 'Provided Amount' , 'Billed Amount' );
			
			$TMPL = array( 'table_open'  => '<table class="table"  >' );
	
			$TableHelper -> set_template($TMPL);
			
			foreach( $UserStats as $num => $Stats )
			{
				$TableHelper -> add_row( 
					$Stats -> getUsername( ) ,
					$Stats -> getLastname( ) . " " . $Stats -> getFirstname( ) , 
					$Stats -> ProvidedAmount ,
					$Stats -> BillAmount
				);
			}
			
			Echo $TableHelper -> generate( ); 
			if( count( $UserStats ) < 1 ):
				?> 
					<h2 class='alert alert-danger text-center' >No Results were found!</h2>
				<?php 
			endif;	
		?>
</div>

<h3>Total Provided Amount: <?php echo $TotalProvidedAmount ; ?></h3>
<h3>Total Billed Amount: <?php echo $TotalBilledAmount ; ?></h3>