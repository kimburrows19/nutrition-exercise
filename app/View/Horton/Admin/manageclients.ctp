<?/*php echo $this->Form->create('addnewuser', array(
									'type'=>'post',
									'url' => array('controller' => 'admin', 'action' => 'addNewUser'),
									'class'=> 'form-adduser',
									'role'=>'form'))*/?>

<form class="form-adduser" role="form" id="form-add-new-user">
<button class="btn btn-lg btn-primary btn-block btn-adduser" id="btn-adduser" type="button">Add New User</button>
<div id="add-newuser">
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
	<select class="form-control" name="address[state]" required="">
	  <option value="">Select a State</option>							
		<option value="Alabama" >Alabama</option>
		<option value="Alaska" >Alaska</option>
		<option value="Arizona" >Arizona</option>
		<option value="Arkansas" >Arkansas</option>
		<option value="California" >California</option>
		<option value="Colorado" >Colorado</option>
		<option value="Connecticut" >Connecticut</option>
		<option value="Deleware" >Delaware</option>
		<option value="Floria" >Florida</option>
		<option value="Georgia" >Georgia</option>
		<option value="Guam" >Guam</option>
		<option value="Hawaii" >Hawaii</option>
		<option value="Idaho" >Idaho</option>
		<option value="Illinois" >Illinois</option>
		<option value="Indiana" >Indiana</option>
		<option value="Iowa" >Iowa</option>
		<option value="Kansas" >Kansas</option>
		<option value="Kentucky" >Kentucky</option>
		<option value="Louisiana" >Louisiana</option>
		<option value="Maine" >Maine</option>
		<option value="Marshall Islands" >Marshall Islands</option>
		<option value="Maryland" >Maryland</option>
		<option value="Massachusetts" >Massachusetts</option>
		<option value="Michigan" >Michigan</option>
		<option value="Minnesota" >Minnesota</option>
		<option value="Mississippi" >Mississippi</option>
		<option value="Missouri" >Missouri</option>
		<option value="Montana" >Montana</option>
		<option value="Nebraska" >Nebraska</option>
		<option value="Nevada" >Nevada</option>
		<option value="New Hampshire" >New Hampshire</option>
		<option value="New Jersey" >New Jersey</option>
		<option value="New Mexico" >New Mexico</option>
		<option value="New York" >New York</option>
		<option value="North Carolina" >North Carolina</option>
		<option value="North Dakota" >North Dakota</option>
		<option value="Northern Mariana Islands" >Northern Mariana Islands</option>
		<option value="Ohio" >Ohio</option>
		<option value="Oklahoma" >Oklahoma</option>
		<option value="Oregon" >Oregon</option>
		<option value="Palau" >Palau</option>
		<option value="Pennsylvania" >Pennsylvania</option>
		<option value="Puerto Rico" >Puerto Rico</option>
		<option value="Rode Island" >Rhode Island</option>
		<option value="South Carolina" >South Carolina</option>
		<option value="South Dakota" >South Dakota</option>
		<option value="Tennessee" >Tennessee</option>
		<option value="Texas" >Texas</option>
		<option value="Utah" >Utah</option>
		<option value="Vermont" >Vermont</option>
		<option value="Virgin Island" >Virgin Islands</option>
		<option value="Virgina" >Virginia</option>
		<option value="Washington" >Washington</option>
		<option value="West Virginia" >West Virginia</option>
		<option value="Wisconsin" >Wisconsin</option>
		<option value="Wyoming" >Wyoming</option>
	</select>
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

	<button class="btn btn-lg btn-primary btn-block btn-adduser" type="submit">Submit</button>
</div>
<?php echo $this->Form->end(); ?>

<?php echo $this->element('list_clients', array('clients'=>$clients)); ?>
<?php echo $this->Html->script('admin/manageclients');?>





