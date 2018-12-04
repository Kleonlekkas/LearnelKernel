<?php
	header('Content-Type: application/json');
	$data = getcwd();
	echo json_encode($data);
?>
