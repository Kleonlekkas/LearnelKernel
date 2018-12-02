<?php
    $path = "./";
    
    // makes password a variable to be stored, otherwise the variable cannot be passed to DB without a reference error 
    if(!empty($_POST['pass'])) {
        $passWord = password_hash($_POST['pass'],PASSWORD_DEFAULT);
    }

    // uses query and connects to DB only if uname and pass are entered and passMatch() returns true
    if(!empty($_POST['uname']) && !empty($_POST['pass']) && !empty($_POST['pass2']) && passMatch()) {
        require $path."../../../dbConnect.inc";
        
        // basic insert query code
        $stmt=$mysqli->prepare("INSERT INTO learnel_login (uname, pass) VALUES (?,?)"); // CHANGE THE TABLE NAME FROM '240Login'
        $stmt->bind_param("ss", $_POST['uname'], $passWord); 
        // encrypts password
        $stmt->execute();
        $stmt->close();
        
        header('Location: index.php');
    } // end of if (!empty...)
    


    // checks if passwords are the same (strcmp = string compare)
    function passMatch() {
            if(strcmp($_POST['pass'], $_POST['pass2']) == 0) {
                return true;
            } else {
                return false;
            }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8" />
    <title>Register</title>   
</head>
<body>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p>User Name:</p>
        <input type="text" name="uname" id="uname" /><br />
        
        <p>Password:</p>
        <input type="password" name="pass" id="pass" /><br />
        
        <p>Password (again):</p>
        <input type="password" name="pass2" id="pass2" /><br />
        
        <input type="submit" value="Submit form" /><input type="reset" value="Reset form" />
        <input type="button" value ="Login" onclick="window.location='login.php'" />
        
    </form>
    
    
    
</body>
</html>