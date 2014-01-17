
<table>
<?php echo $this->Html->tableHeaders(array('First', 'Last', 'Phone','Email'));?>
<tbody>
	<?php
	foreach ($clients as $key=>$client) {
		echo $this->Html->tableCells(array(
	    array($client['users']['first_name'], 
	    	   $client['users']['last_name'], 
	    	   $client['users']['phone_primary'],
	    	   $client['users']['email_address'])));
	}
?>
</tbody>
</table>

