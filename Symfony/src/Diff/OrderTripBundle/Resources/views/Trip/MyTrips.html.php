<h1 class='text-center' > My Trips </h1>
<h3> The Global Amount is: <?php echo $GlobalAmount ?> You have spent so far: <?php echo $SumBills ?> </h3>
<div class="pull-right">
	<a href='<?php echo  $view['router']->generate( 'trip_user_stats' ); ?>' class="btn btn-success btn-lg" target='_blank' > 
		<i class="glyphicon glyphicon-credit-card"></i> View Usage For All Users 
	</a>
	<button class="btn btn-success btn-lg" style='margin:10px;' data-toggle="modal" data-target="#myModal">
		New Trip
	</button>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Trip</h4>
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

	<?php
		Echo $TableData ;
	?>	
