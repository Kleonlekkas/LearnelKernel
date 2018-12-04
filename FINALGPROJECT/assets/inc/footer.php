<footer>
    <div class="foot">
        <ul>
            <li><p>Directory:</p></li>
            <li><a href="index.php">Home</a></li>
		    <li><a href="learn.php">Learn</a></li>
		    <li><a href="story.php">Story</a></li>
		    <li><a href="command.php">Terminal</a></li>
		    <li><a href="poem.php">Alma Mater</a></li>
		    <li><a href="login.php">Profile</a></li>
            <li><a href="review.php">Review</a></li>
        </ul>
        <div>
            <?php
                $filename = $page.".php";
                $filename = strtolower($filename);
                if (strcmp($filename, 'home.php') == 0 ) {
                    $filename = 'index.php';
                }   
                if (strcmp($filename, 'terminal.php') == 0 ) {
                    $filename = 'command.php';
                }
                if (file_exists($filename)) {
                    echo "<p class='time'>Last modified: " . date ("l, F d Y h:ia", filemtime($filename))."</p>";
                }
            ?>
        </div>
    </div>
</footer>
</html>