<?php
	$PostLink = $view['router']->generate( 
								'trip_upload' , 
								array( 'TripID' => $TripID ) ) ;
?>

<button class="pull-right btn btn-success btn-lg" data-toggle="modal" style='margin:10px;' data-target="#myModal">
	 <i class='glyphicon glyphicon-file' ></i> Upload File
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Upload File.</h4>
      </div>
      <div class="modal-body">
       	
       	<form method="POST" action="<?php echo $PostLink; ?>" enctype="multipart/form-data" >
       	
                                <input type="file" name="file"/>
                                <Br />
     				<textarea name='description' style='resize:vertical;' class="form-control" rows="3" required></textarea>
       		<br />
       		 <button class="btn btn-primary pull-right" type="submit">Submit</button>
       		 <Br />
       	</form>	
       	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>