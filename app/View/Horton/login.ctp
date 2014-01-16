

<!--<form class="form-signin" role="form" action="post" method="login/controlle">-->
<?php echo $this->Form->create('login', array(
									'type'=>'post',
									'url' => array('controller' => 'LoginHub', 'action' => 'login'),
									'class'=> 'form-signin',
									'role'=>'form'))?>
<h2 class="form-signin-heading">Please sign in</h2>
<input class="form-control" name="email_address" type="text" autofocus="" required="" placeholder="Email address">
<input class="form-control" name="login_pw" type="password" required="" placeholder="Password">
<label></label>
<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
<?php echo $this->Form->end(); ?>