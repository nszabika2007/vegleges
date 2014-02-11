<div class="well">
	<div class="global">
		<ul class="list-group pull-right">
		  <li class="list-group-item"><strong>Order:</strong><?php echo $UserObj -> getGlobalorder(); ?></li>
		  <li class="list-group-item"><strong>Trip:</strong><?php echo $UserObj -> getGlobaltrip(); ?></li>
		</ul>
	</div>
	<br /><br /><br /><br /><br /><br />
	<div class="pull-right">
		<input type="button" class="btn btn-primary" value="Change Password" />
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
				
				if($UserObj->getLastname() !="" ) 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Lastname</span>';
					  echo '<input type="text" class="form-control" name="lastname" id="lastname" value="'. $UserObj -> getLastname().'" readonly />';
					echo '</div>';
				}
			
				if($UserObj->getEmail() !="") 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Email</span>';
					  echo '<input type="text" class="form-control" name="email" id="email" value="'.$UserObj -> getEmail().'" readonly />';
					echo '</div>';
				}	
		
				if($UserObj->getTel() !="")
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">Phone number</span>';
					  echo '<input type="text" class="form-control" name="tel" id="tel" value="'.$UserObj -> getTel() .'" readonly />';
					echo '</div>';
				}	
		
				if($UserObj->getUniversity() !="") 
				{
					echo '<div class="input-group margin">';
					  echo '<span class="input-group-addon">University</span>';
					  echo '<input type="text" class="form-control" name="university" id="university" value="'.$UserObj -> getUniversity().'" readonly />';
					echo '</div>';
				}	
			?>
			<input type="submit" class="btn btn-primary hide margin" id="enable_submit" value="Submit" />
		</form>
	</div>
</div>