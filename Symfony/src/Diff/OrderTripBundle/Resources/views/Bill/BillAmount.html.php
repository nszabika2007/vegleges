<?php if( $CondTrip === True ): ?>
	<h3>Trip #<?php echo $ID ?> Provided Amount: <?php echo $ProvidedAmount ?> Spent: <?php echo $BillAmount ?> 
			Remains: <?php echo $ProvidedAmount - $BillAmount ?></h3>
<?php endif; ?>

<?php if ( $CondOrder ===True ):  ?>
	<h3>Order #<?php echo $ID ?> Provided Amount: <?php echo $ProvidedAmount ?> Spent: <?php echo $BillAmount ?>
		Remains: <?php echo $ProvidedAmount - $BillAmount ?>
	</h3>
<?php endif; ?>