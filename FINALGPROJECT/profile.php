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
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch1'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter1 Div-->
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter2.png" alt="Learnel Kernel chapter">
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch2'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter2 Div--> 
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter3.png" alt="Learnel Kernel chapter">
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch3'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter3 Div--> 
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter4.png" alt="Learnel Kernel chapter">
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch4'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter4 Div--> 
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter5.png" alt="Learnel Kernel chapter">
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch5'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter5 Div--> 
        <div class="chapterHolder">
            <img class="chapImg" src = "assets/img/chapter6.png" alt="Learnel Kernel chapter">
            <?php
                foreach($records as $this_row) {      
                    if ($this_row['ch6'] == 1) {
                        echo "<img class='checkImg' src='assets/img/checkmark.png' alt='Learnel Kernel chapter'>";
                    }//end if
                }//end for each
            ?>
        </div><!-- end Chapter6 Div--> 
        
    </div><!--END CONTENT-->
    
    <div class="logout">
            <a href='logout.php' class="out">Log Out</a>
    </div><!--END OF LOG OUT DIV--> 
    
</body>
<?php
include 'assets/inc/footer.php';
?>
