
<table id="tbl_clients">
<?php echo $this->Html->tableHeaders(array('First', 'Last', 'Phone','Email','Update','Program'));?>
<tbody>
	<?php
	foreach ($clients as $key=>$client) {
		echo $this->Html->tableCells(array(
	    array($client['User']['first_name'], 
	    	   $client['User']['last_name'], 
	    	   $client['User']['phone_primary'],
	    	   $client['User']['email_address'],
	    	   '<button type="button" class="btn btn-default btn-xs btn-edit-user" value="'.$client['User']['id'].'">
				  <span class="glyphicon glyphicon-edit"></span> Edit
			   </button>',

	    	   )));
	}
?>
</tbody>
</table>

glyphicon glyphiconjkfdsa;