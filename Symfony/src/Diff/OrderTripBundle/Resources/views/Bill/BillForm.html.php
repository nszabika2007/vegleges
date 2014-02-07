<button class="pull-right btn btn-success btn-lg" style='margin:10px;'  data-toggle="modal" data-target="#billModal">
	<i class='glyphicon glyphicon-upload' ></i> Add Bill
</button>

<div class="modal fade" id="billModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Bill</h4>
      </div>
      <div class="modal-body">
        <?php echo $view['form']->form($FormBill) ; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>