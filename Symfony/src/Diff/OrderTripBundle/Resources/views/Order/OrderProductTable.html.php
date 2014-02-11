
<h2 class='text-center' > Orders Nr. #<?php echo $OrderID ?> </h2>
<div class='well' >
	<?php
		
		$TableHelper -> set_heading( 'Product Name' , 'Price' , 'Product URL','' );
		
		$TMPL = array ( 'table_open'  => '<table class="table table table-responsive"  >' );

		$TableHelper -> set_template($TMPL);
		
		
		foreach( $Products as $num => $Product )
		{
			$DeleteLink = $view['router']->generate( 
								'product_delete' , 
								array( 'ProductID' => $Product -> getId(),
										'OrderID' => $OrderID 
									) );
			$TableHelper -> add_row( 
				$Product -> getProductname( ) ,
				$Product -> getPrice( ),
				"<a href='".$Product -> getProducturl( )."'>Product Link.</a>",
				( $Status === True ) ? "" : "<a href='" .$DeleteLink. "'> Delete</a>"
			);
		}
		
		Echo $TableHelper -> generate( ); 
		if( count( $Products ) < 1 ):
			?> 
				<h2 class='alert alert-danger text-center' >No Results were found!</h2>
			<?php 
		endif;	
	?>
</div>