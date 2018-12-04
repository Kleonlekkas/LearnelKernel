<?php
$page = "Learn";
include 'assets/inc/header.php';
?>

<?php
    $path = './';
	require $path.'../../../dbConnect.inc';
    //This should only run if a quiz was just completed and the data values were set
    if (isset($_POST['username'])) {
        if (isset($_POST['quizchap'])) {
            $loadedName = $_POST['username'];
            $loadedChap = $_POST['quizchap'];
            
            //send the data to our server
            if ($mysqli) {
                //IM SO HAPPY
                $sql = "UPDATE `learnel_login` SET `" . $loadedChap . "` = '1' WHERE `learnel_login`.`uname` = '" . $loadedName . "'";
        
                $res=$mysqli->query($sql);
            }//end mysqli if
            
        }//end quizchap if
    }//end username if

    //Give the session name a var on javascript side
    session_start();

    if (isset($_SESSION['name'])) {
        $username = $_SESSION['name'];
    } else {
        $username = '';
    }

?>
    <script>
        var userName = <?php echo "\"" . $username . "\"";?>;
        //our function in the phpScript include
    </script>

<?php
    
    //Get Data
	if ($mysqli) {

      //READ IN QUESTIONS FROM DATABASE
      $sql = 'SELECT unit, question, a1, a2, a3, a4 FROM learnel_quiz';
	  $res=$mysqli->query($sql);
	  if($res){
		while($rowHolder = mysqli_fetch_array($res,MYSQLI_ASSOC)){
            //FILL OUR RECORDS
			$records[] = $rowHolder;
		}
	  }             
    //goal is to display all the data in $records
        foreach($records as $this_row) {
    //Drop out to call script for each row        
?>
    
    <script>
        //Pass this function to populate quiz,
        //with each individual value
        makeQuizObjects(
            <?php echo $this_row['unit']; ?>,
            <?php echo $this_row['question']; ?>,
            <?php echo $this_row['a1']; ?>,
            <?php echo $this_row['a2']; ?>,
            <?php echo $this_row['a3']; ?>,
            <?php echo $this_row['a4']; ?>
        );
    
    </script>
<?php            
        }//end foreach    
	}
?>

    <img class = "toppic" src = "assets/img/learn.png" alt="Learnel Kernel Profile">
    <img class = "toppic" src = "assets/img/chapter1.png" alt="Learnel Kernel chapter">
    <div class = "content">
        <h2>What is Linux?</h2>
         <p>
            Whats up <username> (default: friendo)! Lets get right into the learning! What really is <b>Linux</b>? Well, to start simply, Linux is an <b>operating system (OS)</b>. Isnt this fun? Operating systems are <b>software</b> in every single computer (even your smartphone) you use as the OS manages how all the <b>hardware</b> pieces of the computer works. 
            Other famous and popular operating systems are Windows, OSX,  iOS, and Windows XP; though, Linux is an <b>open-source</b> operating system which makes Linux a little cooler from those other operating systems. Open-source software refers to software where the source code is openly available and able to be changed (by you, the user!). Open-source also implies free-use, meaning there is no pay wall behind using or editing Linux.
            The final piece to defining Linux is that is based on <b>UNIX</b>, another operating system although, unlike Linux, neither open-source nor free to use. Linux is free :D
            All in all, here is a definition for Linux: <b>Linux is an open-source operating system based off UNIX.</b> Thatll be on a quiz so make sure to remember that definition!
        </p>    
        <h2>History of Linux</h2>
        <p>
            Linux was developed by a finnish undergraduate student, Linus Torvalds, after he did not wish to work on MINUX anymore. MINUX was another operating system built off of UNIX, though still not open source. Linus wanted to make his own free-use open-source operating system and so he did. Linux was born. There is a lot more to this story with a bunch of tech talk about code bases but that is a little beyond the level we are discussing here.
            A Few Components of Linux
        </p>    
        <h2>Kernel:</h2>
        <p>
            One important tech component to discuss is the <b>kernel</b> (which is what our website is named after!). The kernel is the core of the operating system and links all the components of the programs Linux is based off of, including MINIX and GNU. The kernel is the part of Linux which manages the hardware: the CPU, memory, and peripheral devices.
        </p>
        <h2>Terminal/Command Line:</h2>    
        <p>    
            The terminal is where a user can interact and edit the operating system on his or her own accord. Users can use a large list of commands to throw in the terminal to gain access to all sorts of functions and files (directories). The terminal is where all the juicy Linux fun happens!
        </p>
        <h2>Other Parts of Linux:</h2>    
        <p>    
            There are multiple other parts to Linux including the <b>bootloader</b> which helps turn your computer on (or “boot” it), <b>daemons</b> which are just some background services that help manage the extras to your computer (like a printer), and <b>applications</b> which are not exactly a part of Linux but rather additions you can add to your computer which can be run on the Linux operating system. Every part is important, but the most important to our lessons are the kernel and command line. 
            Throughout the rest of the lessons you will see references to some of the terms in this first unit and you will actually get a chance to work with the site in the terminal/command line!
        </p>
        <h2>RECAP</h2>  
        <p>  
            In this lesson we discussed the definition of Linx and described what each term in the definition means. Remember that Linux is 100% free-use, and there are multiple different versions for you to use (called <b>distributions</b>), so dont be afraid to try out Linux and work along with our lessons to become a true Linux amateur! After we discussed the definition of Linux, we went over an extremely short summary of how and why Linux was created! Thank you Mr. Linus. Finally, we looked at two of the most important components of Linux, the kernel and command line, with a brief look at some of components we will not mention as much in future lessons.
        </p>
        
<!-- *********************QUIZ 1 ********************** -->  
    
    <button onclick="revealQuiz('quiz1')" class="loadQuiz" type="button">Start Quiz 1!</button>
 
<form action="learn.php" id="quiz1" method="POST" class="myForm" onsubmit="return validateQuiz('quiz1')">
    
        <!----------QUESTION 1------------>
  		<fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans1"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans1"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans1"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans1"       value="d" /><span class="answer">answer here</span>   </label>                 
            </div>
	   </fieldset>
    	
    	        <!----------QUESTION 2------------>
  		<fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans2"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans2"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans2"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans2"       value="d" /><span class="answer">answer here</span>   </label>                 
            </div>
	   </fieldset>
        <!-- what we'll pass through on quiz completion to update their values in database-->
        <input type="hidden" name="username" value="<?php echo $username; ?>"/>
        <input class="chapName" type="hidden" name="quizchap" value=""/>
  		
        <input type="submit" class="button" value="Send"  />
    <span class="errorAnswer">You need to answer each question.</span>
    <span class="wrongAnswer">An answer is incorrect.</span>

</form>
        
    </div><!--END CHAPTER 1 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter2.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
        
        <!-- *********************QUIZ 2 ********************** -->  
    
    <button onclick="revealQuiz('quiz2')" class="loadQuiz" type="button">Start Quiz 2!</button>
 
<form action="" id="quiz2" method="POST" class="myForm" onsubmit="return false">
    
        <!----------QUESTION 1------------>
  		<fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans1"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans1"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans1"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans1"       value="d" /><span class="answer">answer here</span>   </label>                 
            </div>
	   </fieldset>
  		
        <input type="submit" class="button" value="Send" onclick="validateQuiz('quiz2')" />
    <span class="errorAnswer">You need to answer each question.</span>

</form>
    </div><!-- END CHAPTER 2 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter3.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
    </div>
    <img class = "toppic" src = "assets/img/chapter4.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
    </div>
    <img class = "toppic" src = "assets/img/chapter5.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
    </div>
    <img class = "toppic" src = "assets/img/chapter6.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
    </div>


<?php
include 'assets/inc/footer.php';
?>
