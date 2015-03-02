<?php
require "app.php";
$app = new App();

$action = $_POST['action'];
$table = $app->db_prefix . $_POST['table'];
$id = (int)$_POST['id'];
$primary_key = $_POST['primary_key'];
unset($_POST['action']);
unset($_POST['table']);
unset($_POST['id']);
unset($_POST['primary_key']);


if( $action == 'insert' ) {
	foreach( $_POST as $key => $value ) {
		$value = empty($value) ? 'null' : '"' . $app->db->real_escape_string($value) . '"';
		
		$keys .= $prefix . $key;
		$values .= $prefix . $value;
		
		$prefix = ',';
	}
	
	$sql = "INSERT INTO $table ($keys) VALUES ($values)";
	$success = 'Entry was added!';
	$insert_id = $app->db->insert_id;
} else


if( $action == 'delete' ) {
	$sql = "DELETE FROM $table WHERE $primary_key = $id";
	$success = 'Entry was deleted!';
} else


if( $action == 'update' ) {
	foreach( $_POST as $key => $value ) {
		$value = empty($value) ? 'null' : '"' . $app->db->real_escape_string($value) . '"';
		
		$updates .= $prefix . $key . '=' . $value;
		
		$prefix = ',';
	}
	
	$sql = "UPDATE $table SET ($updates) WHERE $primary_key = $id";
	$success = 'Entry was updated!';
}


	
if( $app->db->query($sql) ) {
	feedback($success, 'success');
} else {
	feedback($app->db->error, 'danger');
}

function feedback($message, $level = 'info') {
	$response = array(
		'message' => $message,
		'level' => $level,
		'data' => $_POST
	);
	
	if( isset( $insert_id ) )
		$response['data']['ID'] = (int)$insert_id;
	
	header('Content-Type: application/json');
	echo json_encode($response);
}