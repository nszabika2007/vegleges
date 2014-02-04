<h1 class='text-center' >Users</h1>

<button  style='margin:10px;' class="pull-right btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
	Add new user
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add user</h4>
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
	echo $GlobalsContent ;
?>

<br />
<br />
<br />

	<?php
		
		foreach( $users AS $num => $user )
		{
			echo '<div class="panel panel-primary">';
				echo '<div class="panel-heading">';
					echo $user->getFirstname().' '.$user->getLastname().'('.$user->getUsername().')';
				echo '</div>';
				echo ' <div class="panel-body">';
					echo '<strong>Email:</strong></br >'.$user->getEmail();
					echo '<br />';
					echo '<strong>Role:</strong></br >'.$user->getRole();
					if($user->getRole()==="USER")
					{
						echo '<br />';
						echo '<strong>Password:</strong></br >'.$user->getPassword();
					}
				echo '</div>';
			echo '</div>';
		}
	?>