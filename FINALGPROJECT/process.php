<?php
	$page = 'Learnel Kernel - Thank You';
    $pageFile = 'process.php';
	include 'assets/inc/header.php';
    require '../../../dbConnect.inc'; // links database

    // tests and strips html insert
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // tests each input from form and sets to variable
    $name = test_input($_POST['name']);
    $date = test_input($_POST['notdate']);
    $quiz = test_input($_POST['quiz']);
    $learn = test_input($_POST['learn']);
    $webpage = test_input($_POST['webpage']);
    $rating = test_input($_POST['rating']);
    
    // sets and send an email
    $destination_email = "bjr7317@rit.edu"; //RITISTprofessor@gmail.com 
    $email_subject = "Marshfield, MA - name";
    $email_body = "Visitor name $name\n";
    $email_body .= "Date Visited $date\n";
    $email_body .= "Questions attempted $quiz\n";
    $email_body .= "Did they learn anything $learn\n";
    $email_body .= "Pages Visited $webpage\n";
    $email_body .= "Overall Rating: $rating\n";
    mail($destination_email, $email_subject, $email_body);
    echo "Data Sent";
    
    // inserts inputs into database. Date is set by timestamp in MySQL 
    if ($mysqli) {
	  if (isset($name) && isset($date) && isset($quiz) && isset($learn) && isset($webpage) && isset($rating)) {
	  if( $name!='' && $date!='' && $quiz!='' && $learn!='' && $webpage!='' && $rating!='' ){
		/*
			we are using client entered data - therefore we HAVE TO USE a prepared statement
            
            https://www.w3schools.com/php/php_mysql_prepared_statements.asp
            
			1)prepare my query
			2)bind
			3)execute
			4)close
		*/
		$stmt=$mysqli->prepare("INSERT INTO learnel_feedback (name, date, quiz, learn, webpage, rating) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param("ssissi", $name, $date, $quiz, $learn, $webpage, $rating);
		$stmt->execute();
		$stmt->close();
	  }//end of if to make sure data is sent using $_GET
      }//end of isset
    } // end of if
	
    
?>


    <img class = "toppic" src = "assets/img/review.png" alt="Learnel Kernel review">
    
    <h1 class="content">Email Sent! Thank you for your contribution.</h1>
   
<?php
include 'assets/inc/footer.php';
?>
