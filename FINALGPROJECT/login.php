<?php
    $page = "Login";
    include 'assets/inc/header.php';
    $path = './';
    session_start();
    session_name("Jam");
    $_SESSION['TEST'] = "Hello RIT person";

    if(!empty($_POST['uname']) && !empty($_POST['pass'])) { // if the fields are not empty
        require $path."../../../dbConnect.inc";
        
        $stmt=$mysqli->prepare("SELECT pass FROM learnel_login WHERE uname=?"); // CHANGE TABLE NAME FOR SITE FROM '240Login
        // bind
        $stmt->bind_param("s", $_POST['uname']);
        // do't
        $stmt->execute();
        $stmt->bind_result($res);
        $stmt->fetch(); // fetch the real pass and not the string you typed in (returns value of other column in DB in the same associated tuple as uname)
        
        // verify password and take us to the next page
        if(password_verify($_POST['pass'], $res)) {
            $_SESSION['login'] = true;
            $_SESSION['name'] = $_POST['uname'];
            header('Location: page.php'); // take us home, country road ... if the uname and pass combo works
        } else {
            echo 'The username or password you have entered is invalid'; // if the password is a mismatch
        }
        
        $stmt->close();
    } 

?>
<body>
    <img class = "toppic" src = "assets/img/profile.png" alt="Learnel Kernel Profile">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
    </div>
</body>
<?php
include 'assets/inc/footer.php';
?>
