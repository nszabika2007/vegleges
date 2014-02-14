<?php if( $FinalizeStatus === FALSE ): ?>
<div class='row' > 	
<button class="pull-right btn btn-success btn-lg" style='margin:10px;' data-toggle="modal" data-target="#myModal">
	Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Product</h4>
      </div>
      <div class="modal-body">
        <?php 
		echo $view['form']->form($Form) 
		?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php
	Echo $view -> render( 
							'OrderTripBundle:Bill:BillForm.html.php' ,
							array (
									'FormBill'	=>	$FormBill
							)
						);
?>
	<button class="btn btn-primary btn-lg pull-left" style='margin:10px;' data-toggle="modal" data-target="#myOrder">
		<i class='glyphicon glyphicon-edit' ></i> Edit Order
	</button>
	
	<!-- Modal -->
	<div class="modal fade" id="myOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">Add Order</h4>
	      </div>
	      <div class="modal-body">
	        <?php echo $view['form']->form($FormOrder) ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>
	  </div>
	</div>
</div>
<br />
<br />
<br />
<br />
<?php endif; ?>

<?php
	echo $AmountContent ;
	Echo $TableData;
	
?>

<?php
	echo $BillTableData ;
?>

<?php if( $FinalizeStatus === FALSE ): 
	$Link = $view['router']->generate( 
								'view_order' , 
								array( 
									'OrderID' 	=> $OrderID ,
									'Finalize'	=> 'generate'
									)
								);
?>
	
	<br />
	<a class="pull-right btn btn-warning btn-lg" data-toggle="modal" data-target="" href='<?php echo $Link; ?>' >
		Finalize Order And Generate PDF
	</a>
	
<?php endif; ?>

<?php if( $FinalizeStatus === TRUE ): ?>
<a class='btn btn-primary btn-lg' download="PDF_MERGED.pdf" href="<?php echo $app -> getRequest() -> getBasePath( ) . "/Files/Orders/Bundle_$OrderID/PDF_MERGED.pdf";?>">
		<i class='glyphicon glyphicon-download-alt' ></i>&nbsp;&nbsp;Download PDF
</a>
<br />
<br />
<br />
<?php endif; ?>
