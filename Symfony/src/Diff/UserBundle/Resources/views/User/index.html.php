<div class="well">
	<div class="global">
		<ul class="list-group pull-right">
		  <li class="list-group-item"><strong>Order:</strong><?php echo $UserObj -> getGlobalorder(); ?></li>
		  <li class="list-group-item"><strong>Trip:</strong><?php echo $UserObj -> getGlobaltrip(); ?></li>
		</ul>
	</div>
	<br /><br /><br /><br /><br /><br />
	<div class="pull-right">
		<button class="btn btn-success"  data-toggle="modal" data-target="#myModal">
			Change Password
		</button>
		<button class="btn btn-primary " id="enable_edit">
			<i class="glyphicon glyphicon-edit"></i>Edit credentials
		</button>
	</div>
	<br /><br />
	<div clas="stats">
		<?php
			$SubmitURL = $view['router'] -> generate('edit_user');
		?>
		<form action="<?php echo $SubmitURL;  ?>" method="POST">
			<div class="input-group margin">
			  <span class="input-group-addon">Username</span>
			  <input type="text" class="form-control" name="username" value="<?php echo $UserObj -> getUsername(); ?>" readonly />
			</div>
			<div class="input-group margin">
			  <span class="input-group-addon">Role</span>
			  <input type="text" class="form-control" name="role" value="<?php echo $UserObj -> getRole(); ?>" readonly />
			</div>
			
			<?php 
				if($UserObj->getFirstname() !="" ) 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Firstname</span>';
					  echo '<input type="text" class="form-control" name="firstname" id="firstname" value="'.$UserObj -> getFirstname().'" readonly />';
					echo '</div>';
				}
				else
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Firstname</span>';
					  echo '<input type="text" class="form-control" name="firstname" id="firstname" placeholder="N/A" readonly />';
					echo '</div>';
				}
					
				
				if($UserObj->getLastname() !="" ) 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Lastname</span>';
					  echo '<input type="text" class="form-control" name="lastname" id="lastname" value="'. $UserObj -> getLastname().'" readonly />';
					echo '</div>';
				}
				else
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Lastname</span>';
					  echo '<input type="text" class="form-control" name="lastname" id="lastname" placeholder="N/A" readonly />';
					echo '</div>';
				}
			
				if($UserObj->getEmail() !="") 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Email</span>';
					  echo '<input type="text" class="form-control" name="email" id="email" value="'.$UserObj -> getEmail().'" readonly />';
					echo '</div>';
				}
				else
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Email</span>';
					  echo '<input type="text" class="form-control" name="email" id="email" placeholder="N/A" readonly />';
					echo '</div>';
				}	
		
				if($UserObj->getTel() !="")
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Phone number</span>';
					  echo '<input type="text" class="form-control" name="tel" id="tel" value="'.$UserObj -> getTel() .'" readonly />';
					echo '</div>';
				}
				else
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Phone number</span>';
					  echo '<input type="text" class="form-control" name="tel" id="tel" placeholder="N/A" readonly />';
					echo '</div>';
				}	
		
				if($UserObj->getUniversity() !="") 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">University</span>';
					  echo '<input type="text" class="form-control" name="university" id="university" value="'.$UserObj -> getUniversity().'" readonly />';
					echo '</div>';
				}
				else
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">University</span>';
					  echo '<input type="text" class="form-control" name="university" id="university" placeholder="N/A" readonly />';
					echo '</div>';
				}
			?>
			<input type="submit" class="btn btn-primary hide margin" id="enable_submit" value="Submit" />
		</form>
	</div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Add Trip</h4>
      </div>
      <div class="modal-body">
        <?php
			 $SubmitURL2 = $view['router'] -> generate('edit_password');
		?>
		<form action="<?php echo $SubmitURL2;  ?>" method="POST">
			<div class="input-group margin">
			  <span class="input-group-addon">Current password</span>
			  <input type="password" class="form-control" name="opass" />
			</div>
			<div class="input-group margin">
			  <span class="input-group-addon">New password</span>
			  <input type="password" class="form-control" name="npass" />
			</div>
			<div class="input-group margin">
			  <span class="input-group-addon">Confirm password</span>
			  <input type="password" class="form-control" name="cpass" />
			</div>
			<input type="submit" class="btn btn-primary" value="Submit" />
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>