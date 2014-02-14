	<button class="btn btn-primary btn-lg pull-left" style='margin:10px;' data-toggle="modal" data-target="#myeditTrip">
		<i class='glyphicon glyphicon-edit' ></i> Edit Trip
	</button>

<div class="modal fade" id="myeditTrip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Edit Trip</h4>
      </div>
      <div class="modal-body">
        <?php echo $view['form']->form($FormEditTrip) ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>