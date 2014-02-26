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
		if ( $TripObj -> getUploadFinalize( ) != TRUE )	
		Echo $view -> render( 
							'OrderTripBundle:Trip:UploadFile.html.php' ,
							array (
									'TripID'	=>	$TripID
							)
						);
		if ( $TripObj -> getUploadFinalize( ) == TRUE )
			Echo $view -> render( 
								'OrderTripBundle:Bill:BillForm.html.php' ,
								array (
										'FormBill'	=>	$FormBill
								)
							);
		if ( $TripObj -> getUploadFinalize( ) != TRUE )
		Echo $view -> render( 
							'OrderTripBundle:Trip:CerereOrdinForm.html.php' ,
							array (
									'CerereOrdinForm'	=>	$CerereOrdinForm
							)
						);
		if ( $TripObj -> getUploadFinalize( ) != TRUE )				
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

<?php if ( $Status === FALSE && $TripObj -> getUploadFinalize( ) == TRUE ): ?>
	
	<a  style='margin:10px;' href="<?php echo $URL_Finalize ; ?>" class="btn btn-primary btn-lg pull-right" >
		<i class='glyphicon glyphicon-folder-close' ></i>&nbsp;&nbsp;Finalize And Merge Content 
	</a>
	
<?php endif; ?>

<?php if( $TripObj -> getUploadFinalize( ) == FALSE ): ?>

	<a  style='margin:10px;' href="<?php echo $view['router']->generate( 'upload_finallize_trip' ,array( 'TripID' => $TripID ) ); ?>" class="btn btn-primary btn-lg pull-right" >
		<i class='glyphicon glyphicon-folder-close' ></i>&nbsp;&nbsp;Finalize Uploads 
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

<?php if ( $TripObj -> getUploadFinalize( ) == TRUE ): ?>
	<a class='btn btn-primary btn-lg' style='margin:10px;' download="UPLOAD_FINALIZE.pdf" href="<?php echo $app -> getRequest() -> getBasePath( ) . "/Files/Trips/Bundle_$TripID/UPLOAD_FINALIZE.pdf";?>">
		<i class='glyphicon glyphicon-folder-open' ></i>&nbsp;&nbsp;Download Upload Finalized PDF
	</a>
<?php endif; ?>

<?php if( $Status === TRUE ): ?>
	<a class='btn btn-primary btn-lg' style='margin:10px;' download="PDF_MERGED.pdf" href="<?php echo $app -> getRequest() -> getBasePath( ) . "/Files/Trips/Bundle_$TripID/PDF_MERGED.pdf";?>">
		<i class='glyphicon glyphicon-download-alt' ></i>&nbsp;&nbsp;Download PDF
	</a>
<?php endif; ?>