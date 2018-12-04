<?php
$page = "Poem";
include 'assets/inc/header.php';
session_start();
?>
    <img class = "toppic" src = "assets/img/alma_mater.png" alt="Learnel Kernel Poem">
    <div class = "content">
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
            
        //Display the sentences of the chapter was completed
        foreach($records as $this_row) {      
         
            if ($this_row['ch1'] == 1) {
                echo "<p>So you've come here cuz you wanna learn Linux,</p>
        <p>A topic boring nuff to send you to clinics.</p>";
            }
            if ($this_row['ch2'] == 1) {
                echo "<p>But fear not friend, for it can be fun!</p>
        <p>At the Learnel Kernel, it can be done.</p>";
            }
            
            echo "<br/>";
            
            
            if ($this_row['ch3'] == 1) {
                echo "<p>On this site, we'll have all that you'll need.</p>
        <p>A place you can learn, a place you can read.</p>";
            }
            if ($this_row['ch4'] == 1) {
                echo "<p>When all's said and done, you'll be a master.</p>
        <p>At the Learnel Kernel, it couldn't be faster.</p";
            }
            
            echo "<br />";
            
            
            if ($this_row['ch5'] == 1) {
                echo "<p>Wasn't that easy? We didn't pretend!</p>
        <p>Through your hard work our lessons come to an end</p>";
            }
            if ($this_row['ch6'] == 1) {
                echo "<p>You're a Linux pro now, why not say it louder?</p>
        <p>At the Learnel Kernel, we couldn't be prouder.</p>";
            }
            
            
        }//end foreach    
        }//end session name if    
	}//end mysqli if
        
?>
      
    </div>
<?php
include 'assets/inc/footer.php';
?>
