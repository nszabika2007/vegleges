<?php  
	
	/**
	*	Using the UserHelper.
	*	Getting Currently Logged in Users Object.
	*/

 ?>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo  $view['router']->generate( 'user_homepage' ); ?>">Home</a>
        </div>
		
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
          <ul class="nav navbar-nav">
					<li> <a href='<?php echo $view['router']->generate( 'order_trip_homepage' ); ?>'> Orders </a> </li>
					<li ><a href="<?php echo  $view['router']->generate( 'trip_homepage' ); ?>">Trips</a></li>
              <?php if ( $UserObject -> getRole( ) == 'ADMIN' ): ?>
                    <li class=""><a href="<?php echo  $view['router']->generate( 'admin_homepage' ); ?>"><b>Admin</b></a></li>
              <?php endif; ?>
              		<li  ><a href="<?php echo  $view['router']->generate( 'logout_page' ); ?>">Logout</a></li>
          </ul>
          
        </div><!-- /.navbar-collapse -->
      </nav>