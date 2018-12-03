<?php
$page = "Profile";
include 'assets/inc/header.php';
session_start();

?>
<body>
    <img class = "toppic" src = "assets/img/profile.png" alt="Learnel Kernel Profile">
    <div class = "content">
    <?php  
    echo "<p>Hello and welcome, " . $_SESSION['name'] . " to this useless page!" ?>
    <a href='logout.php'>Click here to log out</a>
    </div>
</body>
<?php
include 'assets/inc/footer.php';
?>
