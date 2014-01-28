<?/*php echo $this->Form->create('addnewuser', array(
									'type'=>'post',
									'url' => array('controller' => 'admin', 'action' => 'addNewUser'),
									'class'=> 'form-adduser',
									'role'=>'form'))*/?>

<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">My Clients</h3></div>
<div class="panel-body">
<?php echo $this->element('list_clients', array('clients'=>$clients)); ?>
</div>
</div>

<div class="panel panel-primary">
<div class="panel-heading" id="btn-adduser"><h3 class="panel-title">Add New Client</h3></div>
<div class="panel-body" id="add-newuser">
	<form class="form" role="form" id="form-add-new-user">
	<input type="hidden" name="user[consultant_id]" value="<?php echo $consultant['User']['id']; ?>"/>
	<div class="form-group">
	<label>Personal Information</label>
	<input type="hidden" name="action" value="add_user"/>
	<input class="form-control" name="user[first_name]" type="text" autofocus="" required="" placeholder="First Name">
	<input class="form-control" name="user[last_name]" type="text" autofocus="" required="" placeholder="Last Name">
	<input class="form-control" name="user[email_address]" type="text" autofocus="" required="" placeholder="Email Adrress">
	<input class="form-control" name="user[phone_primary]" type="text" autofocus="" required="" placeholder="Primary Phone Number">
	<input class="form-control" name="user[phone_secondary]" type="text" autofocus="" placeholder="Secondary PHone Number">
	<input class="form-control" name="address[street]" type="text" autofocus="" required="" placeholder="Street Address">
	<input class="form-control" name="address[city]" type="text" autofocus="" required="" placeholder="City">
	<?php echo $this->element('states_dropdown');?>
	<input class="form-control" name="address[postal_code]" type="text" autofocus="" required="" placeholder="Postal Code">

	</div>
	<div class="form-group">
	<label>Login Info:</label>
	<input type="password" name="user[password]" class="form-control" id="password" required="" placeholder="Password">
	</div>

	<div class="form-group">
		<label>User Role:</label>
	    <div class="radio">
	  <label>
	    <input type="radio" name="user[role_id]" id="optionClient" value="1">
	    Client
	  </label>
	</div>
	<div class="radio">
	 <label>
	    <input type="radio" name="user[role_id]" id="optionConsultant" value="2">
	    Consultant
	  </label>
	 </div>
	 <div class="radio">
	   <label>
	    <input type="radio" name="user[role_id]" id="optionAdmin" value="3">
	    Administrator
	  </label>
	</div>
	</div>
	<h4>Consultant: <span class="label label-info"><?php echo $consultant['User']['first_name']." ".$consultant['User']['last_name']?></span></h4>

	<button class="btn btn-lg btn-primary btn-block btn-adduser" type="submit">Submit</button>

<?php echo $this->Form->end(); ?>

</div>
</div>

<?php echo $this->Html->script('admin/manageclients');?>





