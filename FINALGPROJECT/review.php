<?php
$page = "Review";
include 'assets/inc/header.php';
require "../../../dbConnect.inc";
session_start();
?>
    <!-- form with inputs dedicated -->

    <img class = "toppic" src = "assets/img/review.png" alt="Learnel Kernel review">

    <form action="process.php" method="POST" class="content" onsubmit="return validateForm();">
        
        
        <div class="question">
            <p>What is your name?</p>
            <input type="name" name="name" id="name" placeholder="Your Full Name" />
        </div><!--end of div question-->
        
        <div class="question">
            <p>When did you visit?</p>
            <input type="date" name="notdate" id="notdate" />
        </div><!--end of div question-->
        
        <div class="question">
            <p>How many quizzes did you attempt?</p>
            <input type="number" min="1" name="quiz" id="quiz" value="1" />
            <br />
            <br />
        </div><!--end of div question-->
        
        <!-- fieldset with legend and radio input -->
        <fieldset id="fieldset">
            <legend>Did you learn something?</legend>
            <div class="indent">
                <label for="yes">Yes<input type="radio" id="yes" name="learn" value="yes" onclick="testValue()" /></label><br />
                
                <label for="maybe">Maybe<input type="radio" id="maybe"
                name="learn" value="maybe"  onclick="testValue()" /></label><br />
                
                <label for="no">No<input type="radio" id="no"
                name="learn" value="no"  onclick="testValue()" /></label><br />
            </div>
        </fieldset> <br />
        
        <!-- checkbox input -->
            
            <fieldset id="fieldset">
                <legend>What pages did you visit?</legend>
                <div class="indent">
                    <label for="home">The Homepage<input type="checkbox" id="home" name="webpage" value="The Homepage" /></label><br />
                    <label for="learn">The Learnel<input type="checkbox" id="learn" name="webpage" value="The Learnel" /></label><br />
                    <label for="story">The Story<input type="checkbox" id="story" name="webpage" value="The Story" /></label><br />
                    <label for="terminal">The Terminal<input type="checkbox" id="terminal" name="webpage" value="The Terminal" /></label><br />
                    <label for="poem">The Alma Mater<input type="checkbox" id="poem" name="webpage" value="The Alma Mater" /></label><br />
                </div>
            </fieldset>
        
            <!-- range input -->
            <p>On a scale of 1 to 10, rate how much you liked out website: </p>
            <div class="slidecontainer"> 
                <input type="range" min="1" max="10" value="5" name="rating" id="rating" onclick="postValue()" />
                <p>Your Rating: <span id="result"></span></p>
            </div> <br />
        
            <input type="submit" class="button" id="sendB" value="Send" />&nbsp; &nbsp;<input type="Reset" class="button" value="Reset" />
    </form>
<?php
include 'assets/inc/footer.php';
?>
