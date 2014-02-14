<?php

	if ( $Status === FALSE )
	{
		Echo $view -> render( 
							'OrderTripBundle:Trip:EditTripForm.html.php' ,
							array (
									'TripID'		=>	$TripID ,
									'FormEditTrip'	=> $FormEditTrip
							)
						);	
			
		Echo $view -> render( 
							'OrderTripBundle:Trip:UploadFile.html.php' ,
							array (
									'TripID'	=>	$TripID
							)
						);
		
		Echo $view -> render( 
							'OrderTripBundle:Bill:BillForm.html.php' ,
							array (
									'FormBill'	=>	$FormBill
							)
						);
		
		Echo $view -> render( 
							'OrderTripBundle:Trip:CerereOrdinForm.html.php' ,
							array (
									'CerereOrdinForm'	=>	$CerereOrdinForm
							)
						);
		Echo $view -> render( 
							'OrderTripBundle:Trip:MyDeclaratie.html.php' ,
							array (
									'DeclaratieForm'	=>	$DeclaratieForm
							)
						);	
													
		?>
			<Br />
			<Br />
			<Br />		
		<?php	
		
		 
	}

	echo $AmountContent ;

	echo $TableData ;
	
	echo $BillTableData ;
	
?>

<?php if ( $Status === FALSE ): ?>
	
	<a  style='margin:10px;' href="<?php echo $URL_Finalize ; ?>" class="btn btn-primary btn-lg pull-right" >
		<i class='glyphicon glyphicon-folder-close' ></i>&nbsp;&nbsp;Finalize And Merge Content 
	</a>
	
<?php endif; ?>

<?php  if( $Declaratie_URL !== FALSE ): ?>
	<a  style='margin:10px;' href="<?php echo $Declaratie_URL.'DECLARATIE.pdf' ; ?>" download='DECLARATIE.pdf' class="btn btn-primary btn-lg pull-right" >
		<i class='glyphicon glyphicon-briefcase' ></i>&nbsp;&nbsp;Download Declaratie
	</a>
<?php endif; ?>	

<?php if( $CerereURL !== FALSE ): ?>
	<a  style='margin:10px;' href="<?php echo $CerereURL.'CEREREDEORDIN.pdf' ; ?>" download='CEREREDEORDIN.pdf' class="btn btn-primary btn-lg pull-right" >
		<i class='glyphicon glyphicon-list-alt' ></i>&nbsp;&nbsp;Download Cerere De Ordin
	</a>
<?php endif; ?>

<?php if( $Status === TRUE ): ?>
	<a class='btn btn-primary btn-lg' download="PDF_MERGED.pdf" href="<?php echo $app -> getRequest() -> getBasePath( ) . "/Files/Trips/Bundle_$TripID/PDF_MERGED.pdf";?>">
		<i class='glyphicon glyphicon-download-alt' ></i>&nbsp;&nbsp;Download PDF
	</a>
<?php endif; ?>