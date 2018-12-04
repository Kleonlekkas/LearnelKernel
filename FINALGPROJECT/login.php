<?php
    $page = "Login";
    include 'assets/inc/header.php';
    $path = './';
    session_start();
    session_name("Learnel");
    $_SESSION['TEST'] = "Hello RIT person";

    if(!empty($_SESSION['name'])) {
        header('Location: profile.php');
    }

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
            header('Location: profile.php'); // take us home, country road ... if the uname and pass combo works
        } else {
            echo 'The username or password you have entered is invalid'; // if the password is a mismatch
        }
        
        $stmt->close();
    } 

?>
    <img class = "toppic" src = "assets/img/profile.png" alt="Learnel Kernel Profile">
    <div class = "content">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>User Name:</p>
        <input type="text" name="uname" id="uname" /><br />
        
        Password:
        <input type="password" name="pass" id="pass" /><br />
        
        <input type="submit" value="Log In" />
        
        <input type="reset" value="Reset" /><br />
            
        <input type="button" value ="Register" onclick="window.location='register.php'" />
        </form>
    </div>
<?php
include 'assets/inc/footer.php';
?>
