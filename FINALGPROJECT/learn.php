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
      $sql = 'SELECT unit, question, a1, a2, a3, a4 FROM quizquestions';
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
            <?php echo "\"" . $this_row['question'] . "\""; ?>,
            <?php echo "\"" . $this_row['a1'] . "\""; ?>,
            <?php echo "\"" . $this_row['a2'] . "\""; ?>,
            <?php echo "\"" . $this_row['a3'] . "\""; ?>,
            <?php echo "\"" . $this_row['a4'] . "\""; ?>
        );
    
    </script>
<?php            
        }//end foreach    
	}
?>

<body onload="makeQuizzes()">
    <img class = "toppic" src = "assets/img/learn.png" alt="Learnel Kernel Profile">
    <img class = "toppic" src = "assets/img/chapter1.png" alt="Learnel Kernel chapter">
    <div class = "content">
        qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm qwertyuiopasdfghjklzxcvbnm, qwertyuiosdfghjklzxcvbnm
        
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


</body>
<?php
include 'assets/inc/footer.php';
?>
