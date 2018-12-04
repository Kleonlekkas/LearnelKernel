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

<body onload="makeQuizzes()">
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
    
<div class="quiz">
        <button onclick="revealQuiz('quiz1')" class="loadQuiz" type="button">Start Quiz 1!</button>
    </div>
 
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
       <!----------QUESTION 3------------>
       <fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans3"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans3"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans3"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans3"       value="d" /><span class="answer">answer here</span>   </label>                 
            </div>
	   </fieldset>
    	
    	        <!----------QUESTION 4------------>
  		<fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans4"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans4"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans4"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans4"       value="d" /><span class="answer">answer here</span>   </label>                 
            </div>
	   </fieldset>
              <!----------QUESTION 5------------>
  		<fieldset>
            <legend class="question">Whats the answer?</legend>
            <div class="indent">
                <label for="a">A: <input type="radio" id="1a" name="ans5"       value="a" /><span class="answer">answer here</span> </label> 
                <label for="b">B: <input type="radio" id="1b" name="ans5"       value="b" /> <span class="answer">answer here</span>  </label> 
                <label for="c">C: <input type="radio" id="1c" name="ans5"       value="c" /><span class="answer">answer here</span>   </label> 
                <label for="d">D: <input type="radio" id="1d" name="ans5"       value="d" /><span class="answer">answer here</span>   </label>                 
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
        <h2>What the heckle smheck is a permission?</h2>
        <p>Permissions are like “you can't drink that apple juice, that is moms work apple juice!” Permissions in linux tell you (and anyone in the system) what they can and cannot  do. No volition! Yay! More specifically, permissions are a 10 character sequence that guide access to files, directories, applications, etc.. They may look something like:</p>
        
        drwxr-xr--<br>
        -r--r--rwx<br>
        Drwxrwxrwx
        <br>
        <p>
        But what the heckle shmeck do any of these mean? What does the “rwx” or “-” stuff stand for? Let's get right into that!
        </p>
        
        <p>
        There are 3 types of people who get permissions and there are three different kinds of permissions. <b>Read (r)</b>, <b>Write (w)</b>, and <b>Execute (x)</b>. Read lets you open and look at a the file, write lets you edit the file, and execute lets you run it. The three people types are <b>User (USR)</b>, <b>Group (GRP)</b>, and <b>Others (OTH)</b> which again are very simple. User is who you are logged in as, group is the group of people you are a part of, and others is everyone else on the system. The order of the permissions is always the same, first is user, second is group, third is other, here is an example:
        </p>
        
        USR GRP OTH<br>
        - rwx r-x   r-x<br>
        7     5      5
        
        
        <h2>What do the numbers mean?</h2>
        <p>You may have noticed we added the three numbers (7, 5, 5) under the permission character (rwx) in that last example. The numbers below that you see correspond with that permission. If you want to understand the numbers in terms of math or addition, think of <b>Read (r) = 4</b>, <b>Write (w) = 2</b>, and <b>Execute (x) = 1</b>. Just add the numbers associated to each character in the group of three to get the permission value. So say you assign 7 to group, that means anyone in the group could do anything to the file (4 + 2 + 1, since rwx are all active). That means the The User can do anything and the Group and Others can Read and Execute. Here is a list of every number with its permissions:
        </p>
        | rwx | 7 | Read, write and execute <br> 
        | rw-  | 6 | Read, write <br>             
        | r-x   | 5 | Read, and execute<br>       | r--    | 4 | Read, <br>               
        | -wx  | 3 | Write and execute<br>      
        | -w-   | 2 | Write<br>                  
        | --x    | 1 | Execute<br>                | ---     | 0 | no permissions<br>   
        - rwx rwx rwx <br>
        
        <h2>How about that very first letter or "-"? What does that mean?</h2>
        <p>You can think of the whole permission as three sets of three after the first letter or dash. That very first letter or dash specifies what type of file you are setting the permission of. These are a little complicated and hard to remember, but you will not be quizzed on this in our lessons and likely not have to worry about these beyond the first 2, <b>regular file</b> and <b>directory</b>.</p>
        <i>- : regular file - no special file attributes</i><br>
        <i>>d : directory - file containing files other files</i><br>
        <i>p : pipe - connects the input of one process to the output of another process</i><br>
        <i>s : socket - enables two-way communication between two processes</i><br> 
        <i>D : Door - connects processes between a user/client and server</i><br>
        <i>l : symbolic link - references another file</i><br>
        
        <h2>RECAP</h2>
        <p>This chapter was a little of a jump from the last chapter. Permissions are pretty confusing for a lot of people so we at Learnel Kernel suggest you try to reread some of the information here is you may not understand the first time.
        </p>
        
        <p>
        We discussed how permissions permit different users to either read, write, or execute a file. Not all users can use a file or read a file or edit a file, and the permissions are what enforce the rules. Remember the reference at the beginning to mom's apple juice, you can see (read) the apple juice, but you cannot drink (execute) the apple juice. I did not say anything about editing the apple juice (spilling it?) so feel free to do that (write). In permission terms that might looks like -rwxrw-rw- with the file type being regular, the owner/user being mom, you being part of the group, the family, who can see the apple juice and edit it (along with everyone else).
        </p>
        
        <p>
        Splitting it up we get - (regular file) rwx (mom has all permissions) rw- (the family can read and write, but not execute) rw- (other people can read and write, but not execute).
        </p>
        
        <p>
        We also discussed the numbers associated with different combinations of the three permissions. Read is 4, write is 2, and execute is 1, so after a bit of math you can find the value of any three permissions combined! (Or just use out table for reference)
        </p>
        
        <p>
        Finally, we discussed file types. We won't require you to use any beyond regular file and directory, but it is still important to know other file types do exist.
        </p>
        
        <h2>NEXT UP: Unit 3 - File Structures</h2>        
        <!-- *********************QUIZ 2 ********************** -->  
    
            <div class="quiz">
                <button onclick="revealQuiz('quiz2')" class="loadQuiz" type="button">Start Quiz 2!</button>
            </div>
        

        <form action="learn.php" id="quiz2" method="POST" class="myForm" onsubmit="return validateQuiz('quiz2')">
     
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
        <!----------QUESTION 3------------>
        <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans3"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans3"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans3"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans3"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         
                 <!----------QUESTION 4------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans4"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans4"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans4"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans4"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
               <!----------QUESTION 5------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans5"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans5"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans5"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans5"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         <!-- what we'll pass through on quiz completion to update their values in database-->
         <input type="hidden" name="username" value="<?php echo $username; ?>"/>
         <input class="chapName" type="hidden" name="quizchap" value=""/>
           
         <input type="submit" class="button" value="Send"  />
     <span class="errorAnswer">You need to answer each question.</span>
     <span class="wrongAnswer">An answer is incorrect.</span>
 
 </form>

    </div>
    
    <!-- END CHAPTER 2 CONTENT DIV-->

    <!-- BEG CHAPTER 3 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter3.png" alt="Learnel Kernel chapter">
    <div class = "content">
<h2>Unit 3 - What is File Structure?</h2>
        <p>
        The <b>file structure</b> of Linux is rather basic, but very important to understand before jumping into the command line. When you are on the command line, it is easy to sometimes become lost. Working with a bunch of words and numbers without images can be very daunting and confusing. This is because there is no visual representation like the Windows file explorer. Instead, you will have the name of the folder you are in on the current line of the command line. That's why we are going to look at the basic file structure. Keep in mind that what we are looking at will be an example, if you already have files or folders, you may have more entries than what we see here.
        </p>
        <p>
        The Linux file structure is <b>hierarchical</b>. Think about it like a kingdom with a king. At the top is the king, beneath him is his lords, then his knights, and then skipping a few all the way to the bottom are the peasants: that is more of less what a hierarchical structure is. At the top is the <b>Root</b> which is represented by <b>“/”</b>. Root contains many folders like <b>“/bin”</b>, <b>“/home”</b>, and <b>“/usr”</b>. The most important one here is “/usr” beneath “/usr” is all of the users on the machine. So if you navigate into your username in “/usr”, there you will find all of your personal files. In your username you will find many things like “/documents”, “/pictures”, alongside many other personal files.
        </p>
        <p>
        <b>Example: </b> /usr/myUser/documents/homework/learnelkernelQUIZ.php</p>
        
        <h2>Going more into hierarchy (RECAP)</h2>
        
        <p>To revisit our analogy, the Root <b>directory</b> (more or less a containing folder) is the king and comes before any other directory. The /usr, /bin, and /home directories are like the lords. They reign before different regions of the file system. The lord “/usr” reigns above the user directories (like the user account you are currently logged into on the computer. The “/bin” contains available to execute files associated with booting (starting up) your computer. Finally “/home” reigns over directories available across all the users. Sometimes the “/usr” directory can be a subdirectory (directory contained in another directory) to the “/home”. Together they make up our file structure society! The peasants are you collections of memes. That is all.</p>
        
        <p>It may seem a little confusing at first, but after navigating the file structure for a while you will get the hang of it! Before we get to the commands, the most useful command for you in the case you get lost in the files is “cd ~”, that will bring you back to your home directory. We will be recapulating some of these terms as well as unit 2 terms in the next unit:</p>
        
        <h2>NEXT UP: Unit 4 - Commands</h2>
        
        

        <!-- *********************QUIZ 3 ********************** -->  
    
        <div class="quiz">
            <button onclick="revealQuiz('quiz3')" class="loadQuiz" type="button">Start Quiz 3!</button>
        </div>
        </div>
 <form action="learn.php" id="quiz3" method="POST" class="myForm" onsubmit="return validateQuiz('quiz3')">
     
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
        <!----------QUESTION 3------------>
        <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans3"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans3"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans3"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans3"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         
                 <!----------QUESTION 4------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans4"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans4"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans4"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans4"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
               <!----------QUESTION 5------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans5"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans5"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans5"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans5"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         <!-- what we'll pass through on quiz completion to update their values in database-->
         <input type="hidden" name="username" value="<?php echo $username; ?>"/>
         <input class="chapName" type="hidden" name="quizchap" value=""/>
           
         <input type="submit" class="button" value="Send"  />
     <span class="errorAnswer">You need to answer each question.</span>
     <span class="wrongAnswer">An answer is incorrect.</span>
 
 </form>

    <!-- END CHAPTER 3 CONTENT DIV-->
    <!-- BEG CHAPTER 4 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter4.png" alt="Learnel Kernel chapter">
    <div class = "content">
    <h2>Unit 4 - Commands: </h2>
        <h2>What are commands?</h2>
        <p><b>Commands</b> are fun and interactive! Want to actually use the terminal/command line we talked about in unit 1? Commands are how you do it. The terminal goes deeply into file structure, so through learning commands, you will also learn how the file structure of Linux works. Thats a double whammy!
        </p>
        
        <p>We are going to show you some very basic and important commands. In this case basic does not mean bad, you will use these commands almost every time you use linux! Some of the commands you will be shown how to use, but others you will have to learn and experiment with yourself (hint: just type them into the terminal and see what comes up!)</p>
        
        <h2>What do some commands do?</h2>
        
        <p>The first command we are going to look at is one of the most useful commands in Linux! The command is <b>“pwd”</b> which means “Print Working Directory”. As you can see below, pwd prints to the command line where you are (in terms of files):</p>
        
        <img src="assets/img/pwd.png" alt="linux command">
        
        <p>This is your default directory/folder. When you launch the terminal you will be here. /home contains all of the users on the computer, and /xdfx is my username. It is very useful for keeping track of where you are because sometimes you can become lost. You can use pwd hand-in-hand with the other command, <b>“cd”</b> as cd changes your current directory to the file name. In this case, typing “cd xdfx” will set the current directory to /home/xdfx like shown in the picture above. All you need to do is type “cd” and then the name of file you want to access after.</p>
        
        <p>The next command we are going to look at is <b>“ls”</b>. It means “list” and it displays all the files in the directory you are in. You can also attach <b>modifiers</b> to commands. Modifiers allow for commands to be more specific or provide additional functionality. In this case, try tagging <b>“ -la”</b> on to the end of “ls”. So go ahead and type in “ls -la”. There are so many different combinations, but for now we are going to stick with this one. You can see “ls -la” gives a much longer and more detailed list of what is in our directory. Do you notice anything that you learned before? If you look on the left side, you will see the permissions of all of the files from unit 2. </p>
        
        <img src="assets/img/ls.png" alt="linux command">
        
        <p>Next we are going to learn how to make a new directory! Believe it or not it is actually very simple with the <b>“mkdir”</b> command. For our example we are going to make a directory called “learnel”. All you need to do is type in “mkdir learnel” and hit enter. After making a directory or file, I like to make sure it worked, so after you type that in, do another “ls -la” to make sure it worked</p>
        
        <img src="assets/img/mkdir.png" alt="linux command">
        
        <p>As you can see, “learnel” has now appeared in our results for “ls -la” and tells us all the information on the directory we just made. Notice how the permissions are all available. That is beings setting permissions come with different commands! We will look into that a little later in this unit with the “chmod” commands.</p>
        
        <p>Now we are going to learn how to navigate into a directory and create a new text file using the <b>“touch”</b> command. All you have to do is type in “cd [directoryname]” (like we discussed earlier) so in our case we are going to type in “cd learnel”. After moving in there we are going to make a text file. To do that all we are going to do is type “touch hello.txt”. This will create our txt file. Congratulations, you done did it friendly learnel kernel learner!</p>
        
        <img src="assets/img/cd_touch.png" alt="linux command">
        
        <p>Now before we access the file, we need to make sure we have the proper permissions to access the file. All we need to do is type in “chmod ### hello.txt ”. The command, <b>“chmod”</b>, changes the permissions, but the numbers (#) can be whatever you want. Look back to the unit 2 and think about what we need the three numbers to be so WE can read, write, and execute it. We only want others and the group to be able to read and execute it. </p>
        
        <p>If you got it right now it is time to write something in the file so all we need to do is type “nano hello.txt”. This will bring us into the <b>nano</b> text editor, it is a little confusing at first, but you get use to it. Once you get into nano, type “Hello world!” and then press Ctrl + O and then hit Enter to save the file. After that press Ctrl + X to exit nano. Now one of the last commands we are going to learn about is “cat”. This displays the contents of a file, so now type “cat hello.txt” and see what happens!</p>
        
        <p>In the case you couldnt get the file permissions right it should be “chmod 755 hello.txt”</p>
        
        <img src="assets/img/chmod_nano_cat.png" alt="linux command">
        
        <p>The nano text editor can access different types of text and code files alike. This means in an online Linux terminal, you can edit code associated with website files without having to upload or download anything! Isnt that a little fun fact for ya?</p>
        
        <p>Those are the basic linux commands that will get you on your feet, there is a lot you can do with what you just learned. I will leave you off with two more commands, <b>“man”</b> and <b>“help”</b>they work together hand in hand. “help” shows you all of the commands you have access too, and “man” tells you specifically about each command. So say you wanted to learn more about “ls”, type in “man ls” and all of the information about “ls” will be displayed!</p>
        
        <h2>RECAP</h2>
        <p>In this chapter we looked at a variety of basic commands to use in a Linux terminal. We also learned a little more about file structure as most of our commands dealt with file structures. We learned how to find our current directory path with “pwd”, how to change our directory using “cd”, and how to view a list of accessible files in our current directory with “ls” and associated modifier “-la”. We then learned how to make a directory using “mkdir” and a text document using “touch” as well as how to edit the text file using “nano”. Finally, we closed with help style tags “help” and “man” to get some more information about our files and available commands.</p>
        
        <h2>NEXT UP: Unit 5 - Bash</h2>
        
        

        <!-- *********************QUIZ 4 ********************** -->  
    
        <div class="quiz">
            <button onclick="revealQuiz('quiz4')" class="loadQuiz" type="button">Start Quiz 4!</button>
        </div>
        </div>
 <form action="learn.php" id="quiz4" method="POST" class="myForm" onsubmit="return validateQuiz('quiz4')">

 
     
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
        <!----------QUESTION 3------------>
        <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans3"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans3"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans3"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans3"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         
                 <!----------QUESTION 4------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans4"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans4"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans4"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans4"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
               <!----------QUESTION 5------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans5"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans5"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans5"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans5"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         <!-- what we'll pass through on quiz completion to update their values in database-->
         <input type="hidden" name="username" value="<?php echo $username; ?>"/>
         <input class="chapName" type="hidden" name="quizchap" value=""/>
           
         <input type="submit" class="button" value="Send"  />
     <span class="errorAnswer">You need to answer each question.</span>
     <span class="wrongAnswer">An answer is incorrect.</span>
 
 </form>

    <!-- END CHAPTER 4 CONTENT DIV-->
    <!-- BEG CHAPTER 5 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter5.png" alt="Learnel Kernel chapter">
    <div class = "content">
    <h2>Unit 5 - Bash</h2>
        <p>A little note before we get started, <b>Bash</b> is a little more complicated than what we have been doing so far (yes… even permissions), we are going to do our best to dip your toes in the water, but it may still be a little complicated. We are going to use some commands that you haven’t seen yet, but we will give you a brief definition of what they do.
        </p>
        
        <p>I’m sure you have heard of <b>coding</b> (typing in different words, symbols, and more assigned to a specific code language) before, and Bash is exactly like coding! Bash lets you take the commands you have been learning and turn them into scripts. While Bash is mostly used for something called “<b>Task Automation</b>” which is programing your computer to do repetitive tasks for you, you can still do some fun stuff with it. Let’s hop into it!</p>
        
        <p>Remember <b>Nano</b>? Well were going to have to start by creating a new file. Be sure to save it as “.sh” instead of something like “.txt”. This is one way in which your computer will know you are making a bash script file. Next, you should change the permissions on it so we can read, write, and execute it. Finally, the bash file you just named with nano (recall unit 4). You need to start every bash script with “<b>#!/bin/bash</b>” this is the last step in telling the file that its a bash file. </p>
        
        <p>We are going to make a script that says “Hello World”, then adds two different numbers, then saves a search to a text file. All that may seem complicated but we will take it one step at a time.</p>
        
        <p>In order to run a bash script all you need to do is type “sh [name of script]”</p>
        
        <p>First we are going to learn about the “echo” command. All you have to type in is “echo “[whatever you want in here]”” or you can do “echo [variable name]” to print out a <b>variable</b>. A variable is a made up piece of code that you can assign anything some type of value to, like a text message (a <b>string</b>) or a number (<b>int</b>). So for this first step we are going to make it print out “Hello World” see if you can figure it out yourself. You will be able to see the code below if you need help.</p>
        
        <img src="assets/img/nano_hello.png" alt="linux command">
        
        <p>Next what we are going to do is make our script, “hello.sh”, add two numbers, store them into a variable and then print out the variable. All you need to do is make your variable do something… or mean something. This is called “<b>defining</b>” the variable. You can name your variable whatever you want except for some <b>keywords</b> reserved in the Bash language. Also, variables cannot share names, so if you ever want to use more than one variable, name it something different from every other variable you are using. You’ll probably be safe with a variable name if you type “turtleMan” in the name at any point. Just a little hint.</p>
        
        <p>Type under the first line “[name of the variable] = 0”. We are using 0 here because we want it to be a number. If you wanted text in a variable, you would have to do this “[var name] = “[Enter text]”.</p>
        
        <p>Okay, now to do some simple addition. Try it yourself before you look at my script. We want to make three variables, and add the first two and make the answer equal to the third variable and print out the third variable.</p>
        
        <p>Ex. (not actual code) variable1 + variable2 = variable3<br>
        Print var3</p>
        
        <p>There are two hints we will give you, the first is that whenever you want to reference a variable, you need to add a <b>$</b> in front of the variable name, and the second is that in order to add two variables and assign it to a new variable, you need to make the new variable equal to this $(( var operator var )).</p>
        
        <p>So.. for example..<br>
            Variable1 =  2<br>
            Variable2 = 3<br>
            Variable3 = $((Variable1 + Variable2))</p>

        <p>Here is more or less the same text as my example above, just written as a script</p>
        
        <img src="assets/img/nano_add.png" alt="linux command">
        
        <P>The final task we are going to accomplish is saving the output of a command to a file. All you simply have to do is “ >> [filename]”. So all that being said, lets perform a “ls -la” and then save the output to a file called “out.txt” (<b>so “ls -la >> out.txt” in the terminal</b>), then modify your script so that it opens out.txt. Remember the “cat” command from the previous chapter? Hint hint, use that :) </P>
        
        <img src="assets/img/nano_cat.png" alt="linux command">
        
        <p>In the end, your output should look like this</p>
        
        <img src="assets/img/nano_fin.png" alt="linux command">
        
        <p>That wraps up our short intro to bash. It is very powerful and can do very complex tasks if used right. There are an infinite number of things you can do with bash. As you learn more commands, you can learn to do more with bash. Due to how complex it is and for beginners sake, we are going to leave it here. If you are interested in doing more, check youtube there are plenty of tutorials that will help you become a Bash Master!</p>
        
        <h2>RECAP</h2>
        
        <p>In this unit we discussed some of the very basic features of the Bash script in Linux. This content gets much more complicated and takes plenty of practice to become talented, so do not worry if you are not understanding this much at first! We’ve all struggled learning some script at one point or another. This stuff is very new and unique to the world and we want to help you get into technology to be ahead of the curve.</p>
        
        <p>We discussed how to create a bash file and how to work with print statements (echo) and variables, mostly integers (numbers) and addition. Finally, we learned how to insert the results of a command (like getting a list for “ls -la”) into a text document (out.txt in our case). This lesson combined components of the last 2 chapters, so if you felt lost in any part regarding commands or the terminal, take a look back at those chapter to strengthen your understanding.</p>
        
        <h2>NEXT UP: Unit 6 - Where do we go from here?</h2>    

        <!-- *********************QUIZ 5 ********************** -->  
    
        <div class="quiz">
            <button onclick="revealQuiz('quiz5')" class="loadQuiz" type="button">Start Quiz 5!</button>
        </div>
        </div>
 <form action="learn.php" id="quiz5" method="POST" class="myForm" onsubmit="return validateQuiz('quiz5')">
     
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
        <!----------QUESTION 3------------>
        <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans3"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans3"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans3"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans3"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         
                 <!----------QUESTION 4------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans4"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans4"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans4"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans4"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
               <!----------QUESTION 5------------>
           <fieldset>
             <legend class="question">Whats the answer?</legend>
             <div class="indent">
                 <label for="a">A: <input type="radio" id="1a" name="ans5"       value="a" /><span class="answer">answer here</span> </label> 
                 <label for="b">B: <input type="radio" id="1b" name="ans5"       value="b" /> <span class="answer">answer here</span>  </label> 
                 <label for="c">C: <input type="radio" id="1c" name="ans5"       value="c" /><span class="answer">answer here</span>   </label> 
                 <label for="d">D: <input type="radio" id="1d" name="ans5"       value="d" /><span class="answer">answer here</span>   </label>                 
             </div>
        </fieldset>
         <!-- what we'll pass through on quiz completion to update their values in database-->
         <input type="hidden" name="username" value="<?php echo $username; ?>"/>
         <input class="chapName" type="hidden" name="quizchap" value=""/>
           
         <input type="submit" class="button" value="Send"  />
     <span class="errorAnswer">You need to answer each question.</span>
     <span class="wrongAnswer">An answer is incorrect.</span>
 
 </form>

    <!-- END CHAPTER 5 CONTENT DIV-->
    <!-- BEG CHAPTER 6 CONTENT DIV-->
    <img class = "toppic" src = "assets/img/chapter6.png" alt="Learnel Kernel chapter">
    <div class = "content">
    <h2>Unit 6 - Where to go from here?</h2>
        <p>We are here at the end of our linux journey. Now you may be asking yourself the question: Where do I go from here? How do I get linux? What can I do with linux? Well we have all of the answers to all of those!</p>
        
        <p>From here you can go over to our terminal page and play around with some of the commands you’ve learned. Not all of them will work, but some definitely will! You can also start to incorporate Linux into your day to day life by making it the main operating system on whichever computer you use. It takes a little bit of learning,  but hopefully we got you off your feet and now have a basic understanding of how Linux works. It definitely has a learning curve if you are use to windows. If you are using an apple machine, however, you have already been using a version of linux so the switch to linux won’t be that big of a leap. </p>
        
        <p>If you aren’t ready to make the jump from Windows to Linux yet, there is also a handy feature in Windows 10 that enables you to download different distributions of linux and install them right on the Windows 10 command line. In fact, that is how we did all of the lesson plans (the pictures!), on Linux running on Windows 10.</p>
        
        <p>Another question you may be asking yourself is which distribution of Linux should I pick? Well the answer is you should go ahead and look a different versions of Linux yourself. We recommend Fedora, Ubuntu, Red Hat, and CentOS. You can check out their websites to see what you like the best or look some up yourself.</p>
        
        <p>After choosing your distribution all you need to do is install it. Be are installing Linux will delete all of the files off of your computer, so if you are not the owner of you computer (like if it is a family computer), we highly recommend double checking with all the other users of the computer. If you get their approval, go ahead and search youtube for how to install the distribution you chose.</p>
        
        <p>And that’s it from us, we hope you learneled something from our kernel, now cya friendo!</p>    

        <!-- *********************QUIZ 6 ********************** -->  
    
        <div class="quiz">
            <button onclick="revealQuiz('quiz6')" class="loadQuiz" type="button">Start Quiz 6!</button>
        </div>
        </div>
 <form action="learn.php" id="quiz6" method="POST" class="myForm" onsubmit="return validateQuiz('quiz6')">
     
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
         <!-- what we'll pass through on quiz completion to update their values in database-->
         <input type="hidden" name="username" value="<?php echo $username; ?>"/>
         <input class="chapName" type="hidden" name="quizchap" value=""/>
           
         <input type="submit" class="button" value="Send"  />
     <span class="errorAnswer">You need to answer each question.</span>
     <span class="wrongAnswer">An answer is incorrect.</span>
 
 </form>

    <!-- END CHAPTER 6 CONTENT DIV-->


</body>
<?php
include 'assets/inc/footer.php';
?>
