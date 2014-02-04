<h1 class='text-center' >My Orders.</h1>
<h3> The Global Amount is: <?php echo $GlobalAmount ?> You have spent so far: <?php echo $SumBills ?> </h3>
<button class="pull-right btn btn-success btn-lg" style='margin:10px;' data-toggle="modal" data-target="#myModal">
	New Order
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Order</h4>
      </div>
      <div class="modal-body">
        <?php echo $view['form']->form($Form) ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php
	Echo $view -> render( 
							'StatsBundle:Stats:StatsForm.html.php' ,
							array (
									'StatsForm'	=>	$StatsForm
							)
						);
?>

<br />
<br />
<br />
<div class='well' >
	<div class="table-responsive">
	<?php 
		
		$TableHelper -> set_heading( 'ID/Date' , 'Provided Amount' , 'Product Nr.' , 'Status');
		
		$TMPL = array ( 'table_open'  => '<table class="table"  >' );

		$TableHelper -> set_template($TMPL);
		
		foreach( $Orders AS $num => $Order )
		{
			$Date = (array)$Order -> getCreated( ) ;
			
			$Status = ( $Order -> getFinalized( ) ) ? 
					"<b style='color:orange;' >Finalized</b>" : 
							"<b style='color:green;' >Open</b>"  ;
			
			$FormattedDate =  date( 'Y-m-d' , strtotime( $Date['date'] ) ) ;
			$OrderID = $Order -> getId( );
			$Link = "<a href='". $view['router']->generate( 
								'view_order' , 
								array( 'OrderID' => $OrderID )
								) ."'>".$OrderID."/".$FormattedDate."</a>";
			$TableHelper -> add_row( 
				$Link,
				$Order -> getProvidedamount( ),
				count( $Order -> GetProducts( ) ) ,
				$Status
			);
		}
		
		Echo $TableHelper -> generate( ); 
	?>
	</div>
</div>	