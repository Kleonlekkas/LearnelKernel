<?php
$page = "Profile";
include 'assets/inc/header.php';
session_start();
?>
<body>
    <img class = "toppic" src = "assets/img/profile.png" alt="Learnel Kernel Profile">
    <div class = "content">
    <?php  
    echo "<p>Hello and welcome, " . $_SESSION['name'] . " to your profile page!"
    ?>
    <a href='logout.php'>Click here to log out</a>
        
<?php
    $path = './';
	require $path.'../../../dbConnect.inc';
    
    //Get Data
	if ($mysqli) {
        if ($_SESSION['name']) {
               //READ IN QUESTIONS FROM DATABASE
                $sql = 'SELECT ch1, ch2, ch3, ch4, ch5, ch6 FROM learnel_login WHERE uname="' . $_SESSION['name'] .'"';
                $res=$mysqli->query($sql);
                if($res){
		          while($rowHolder = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                      //FILL OUR RECORDS
			         $records[] = $rowHolder;
                  }
	            }   
        }//end session name if    
	}//end mysqli if
        
?>                
    
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter1.png" alt="Learnel Kernel chapter">
            <img class="checkImg" src = "assets/img/checkmark.png" alt="Learnel Kernel chapter"
        </div><!-- end Chapter1 Div-->
            
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter2.png" alt="Learnel Kernel chapter">
            <img class="checkImg" src = "assets/img/checkmark.png" alt="Learnel Kernel chapter"
        </div><!-- end Chapter2 Div-->            
        
    </div><!--END CONTENT-->
</body>
<?php
include 'assets/inc/footer.php';
?>
