<h3>Update User Profile</h3>

<?php 

//echo $this->Form->create('update-user',array('class'=>'form', 'role'=>'form-group'));?>
<form class="form" id="form-update-user" role="form-group">
<input type="hidden" name="action" value="update_user"/>
<input type="hidden" name="user[id]" value="<?php echo $User['User']['id']?>"/>
<input type="hidden" name="address[id]" value="<?php echo $User['Address']['id']?>"/>
<div class="form-group">
<label>Personal Info:</label>
<?php	echo $this->Form->input('first_name', array('label'=>'First Name: ', 'class'=>'form-control', 'name'=>'user[first_name]','value'=>$User['User']['first_name']));
	echo $this->Form->input('last_name', array('label'=>'Last Name: ', 'class'=>'form-control', 'name'=>'user[last_name]','value'=>$User['User']['last_name']));
	echo $this->Form->input('phone_primary', array('label'=>'Phone(Primary): ', 'class'=>'form-control','name'=>'user[phone_primary]','value'=>$User['User']['phone_primary']));
	echo $this->Form->input('phone_secondary', array('label'=>'Phone(Secondary): ','class'=>'form-control', 'name'=>'user[phone_secondary]','value'=>$User['User']['phone_secondary']));
	echo $this->Form->input('email', array('label'=>'Email: ', 'type'=>'email','class'=>'form-control', 'name'=>'user[email]','value'=>$User['User']['email_address']));
	//role is a dropdown
	//consultant dropdown?>

<?php echo $this->Form->input('street', array('label'=>'Street Address', 'class'=>'form-control', 'name'=>'address[street]', 'value'=>$User['Address']['street']));
    echo $this->Form->input('city', array('label'=>'City', 'class'=>'form-control', 'name'=>'address[city]', 'value'=>$User['Address']['city']));?>
    <label>State: </label>
    <?php
	echo $this->element('states_dropdown',array('state'=>$User['Address']['state']));
	echo $this->Form->input('postal-code', array('label'=>'Postal Code', 'class'=>'form-control', 'name'=>'address[postal_code]', 'value'=>$User['Address']['postal_code']));
	?>
	</div>
	<div class="form-group">
		<label>User Role:</label>
	    <div class="radio">
	  <label>
	    <input type="radio" name="user[role_id]" id="optionClient" value="1" <?php if($User['Role']['id']=='1'){echo 'checked=true';} ?>>
	    Client
	  </label>
	</div>
	<div class="radio">
	 <label>
	    <input type="radio" name="user[role_id]" id="optionConsultant" value="2" <?php if($User['Role']['id']=='2'){echo 'checked=true';} ?>>
	    Consultant
	  </label>
	 </div>
	 <div class="radio">
	   <label>
	    <input type="radio" name="user[role_id]" id="optionAdmin" value="3" <?php if($User['Role']['id']=='3'){echo 'checked=true';} ?>>
	    Administrator
	  </label>
	</div>
	</div>
	<div class='form-group'>
		<label>
			Consultant: 
			<select name="user[consultant_id]">
			<?php
				foreach ($Consultants as $c) {?>
					<option  <?php if($c['User']['id']==$User['User']['consultant_id']){echo 'selected=selected';}?> value='<?php echo $c['User']['id']; ?>'><?php echo $c['User']['last_name'].", ".$c['User']['first_name']; ?></option>
			<?php	}
			?>
			</select>
		</label>
	</div>

	<button class="btn btn-lg btn-primary btn-block btn-adduser" type="submit">Submit</button>

<?php echo $this->Form->End();

?>
hi
<?php echo $this->Html->script('admin/manageclients');?>
