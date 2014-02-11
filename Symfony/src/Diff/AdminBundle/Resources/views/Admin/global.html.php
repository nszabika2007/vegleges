<button style='margin:10px;' class="pull-right btn btn-success" data-toggle="modal" data-target="#myglob<?php echo $UserID; ?>">
	<i class='glyphicon glyphicon-globe' ></i> Modify Global
</button>

<!-- Modal -->
<div class="modal fade" id="myglob<?php echo $UserID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modify Global</h4>
      </div>
      <div class="modal-body">
      <?php
      		$Url = $view['router']->generate( 'admin_global_submit' ,
      											array( 'UserID' => $UserID )
			 ) ; 
      ?>	
      	<form action='<?php echo $Url ?>' method='POST' >
      		<label for='GlobalTrip'> Trip Global</label>
      		<input style='margin:10px;' class='form-control' type='text' value='<?php echo $GlobalTrip ?>' name='GlobalTrip' />
      		<label for='GlobalOrder'> Order Global</label>
      		<input style='margin:10px;' class='form-control' type='text' value='<?php echo $GlobalOrder ?>' name='GlobalOrder' />
      		
      		<input style='margin:10px;' type='submit' name='submit' value='Save' class='btn btn-primary' />
      		
      	</form>
      	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>