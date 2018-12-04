<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="assets/js/script.js"></script>
    <title>Learnel Kernel - <?php echo $page ?></title>

		<?php
			if (strcmp($page, "Terminal") == 0) {
		?>
			<link rel="stylesheet" type="text/css" href="assets/css/terminal.css">
			<script src="assets/js/terminal.js"></script>
		<?php
			}
		?>
</head>
<body <?php if (strcmp($page, "Learn") == 0) { ?>onload="makeQuizzes()" <?php } ?> >
<header>
    <div class="topnav" id="myTopnav">
        <a class="active" href="index.php"><img class="logo" src="assets/img/penguinLogoColor.png"></a>
            <a href="index.php">Home</a>
		    <a href="learn.php">Learn</a>
		    <a href="story.php">Story</a>
		    <a href="command.php">Terminal</a>
		    <a href="poem.php">Alma Mater</a>
		    <a href="login.php">Profile</a>
        <a href="javascript:void(0);" class="icon" onclick="menuHider()">&#9776;</a>
    </div>
</header>
