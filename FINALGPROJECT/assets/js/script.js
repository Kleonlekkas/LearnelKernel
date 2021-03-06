//
// Begin JS for Nav Bar
//
function menuHider() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
          x.className = x.className + " responsive";
      } else {
          x.className = "topnav";
    }
  }
  
  // changes image
  function change(el, img) {
      el.src = img;
  }
//
// Begin JS for Nav Bar
//
  
/*
BEGIN EXERCISE JS
*/
  
//arr to hold our quizzes
var quizObjects = [ [],[],[],[],[],[] ];
var quizEnum = {
    "quiz1": 0,
    "quiz2": 1,
    "quiz3": 2,
    "quiz4": 3,
    "quiz5": 4,
    "quiz6": 5
};


/*Check if the quiz theyre submitting is completed*/
function validateQuiz(quizUnit) {
    //our return value
    var ret = true;

   var quiz = document.getElementById(quizUnit);
   var questionFields = quiz.getElementsByTagName("fieldset");
    
    //test to see if a button is selected
    //need to cycle through radio buttons
    //for each question (fieldset)
    var allAnswersChecked = true;
    
    for (var x = 0; x < questionFields.length; x++) {
        var options = questionFields[x].getElementsByTagName("input")
        
        var len = options.length;
        var optionChecked = false;
    
        for (var i = 0; i < len; i++) {
            if (options[i].checked) {
                optionChecked = true;
            }
        }//END ANSWERS LOOP
        
        if (!optionChecked) {
            allAnswersChecked = false;
        }
    }//END QUESTIONS LOOP

    if (!allAnswersChecked) {
            //they have not picked an answer for each question
            quiz.getElementsByClassName("errorAnswer")[0].style.display="inline";
            ret = false;
    } else {
            //they have picked an answer for each question
             quiz.getElementsByClassName("errorAnswer")[0].style.display="none";
    }
    

    
    //If we're returning true, then we should check their score
    if (ret) {
        //will return true if all answers correct, otherwise return false
        ret = checkAnswers(quizUnit);
    }
    
    console.log("RETURN = " + ret);

    return ret;

}
//QUIZ FUNCTIONS
/*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/


//Check answers for a given form
function checkAnswers(ourQuizUnit) {
    //Index of our answer key in quiz objects
    answerKeyInd = quizEnum[ourQuizUnit];
    //Number of total questions in this quiz 
    var numQuestions = quizObjects[answerKeyInd].length;
    var numCorrect = 0;
    
    var quiz = document.getElementById(ourQuizUnit);
    var questionFields = quiz.getElementsByTagName("fieldset");
    
    //For each question, check the answers
    for (var i = 0; i < numQuestions; i++) {
        
        //answers are in a span. indexes should be the same but we'll have to access them separately
        var options = questionFields[i].getElementsByTagName("input");
        var answerInputs = questionFields[i].getElementsByClassName("answer");

        
        //For each answer, check to see if checked
        for ( var n = 0; n < options.length; n++) {
            
            if (options[n].checked) {
                //The answer they  checked
                var answerChecked = answerInputs[n].innerHTML;
                
                //Now compare it to our object to see if the answer is correct
                var answerKeyObj = quizObjects[answerKeyInd][i].answers;
                
                for (var x = 0; x < answerInputs.length; x++) {
                    //check if text is the same as submitted answer
                    if (answerKeyObj[x].text == answerChecked) {
                        //check if its the right answer      
                        if (answerKeyObj[x].correct == true){
                            //if so, add a point
                            numCorrect++;
                        }
                    }
                    
                }//END ANSWER CHECK LOOP
                
            }//end options if
            
        }//END ANSWER LOOP       
    }//END QUESTION LOOP
    
    
    /*
    
    UPDATE `learnel_login` SET `ch3` = '1' WHERE `learnel_login`.`uname` = 'PrettyPatty'
    
    UPDATE `learnel_login` SET `ch1` = '0' WHERE `learnel_login`.`uname` = 'PrettyPatty';
    */
    
    //they got all of them correct
    if ((numCorrect/numQuestions) == 1) {
        var chapElem = quiz.getElementsByClassName("chapName");
        var chapText = "chapterText";
        
        if (ourQuizUnit == "quiz1") {
            chapText = "ch1";
        }
        if (ourQuizUnit == "quiz2") {
            chapText = "ch2";
        }
        if (ourQuizUnit == "quiz3") {
            chapText = "ch3";
        }
        if (ourQuizUnit == "quiz4") {
            chapText = "ch4";
        }
        if (ourQuizUnit == "quiz5") {
            chapText = "ch5";
        }
        if (ourQuizUnit == "quiz6") {
            chapText = "ch6";
        }
        
        chapElem[0].value = chapText;
        
        quiz.getElementsByClassName("wrongAnswer")[0].style.display="none";
        
        //they got all of them correct
        return true;
        
    } else {
        
        //Let em know an answer is incorrect
        quiz.getElementsByClassName("wrongAnswer")[0].style.display="inline";
        return false;
    }
   console.log("Answers right: " + numCorrect);
    
}//END CHECK ANSER FUNC


//Unit, Quiz, Answers 1 - 4
function makeQuizObjects(u, q, pa1, pa2, pa3, pa4) {
    var questionObj = {
        question: q,
        answers: [{text: pa1, correct: true},
                  {text: pa2, correct: false},
                  {text: pa3, correct: false},
                  {text: pa4, correct: false}]
    }
    //Pushes each question into a master array full of question objects
    //unit - 1, because arrays start at 0 c:
    quizObjects[u - 1].push(questionObj);
}//END MAKE QUIZ OBJECTS FUNC

//Function to make quizzes
//Populates all forms with all quizzes
function makeQuizzes() {
    //FORMS = QUIZZES
    //GUIDE TO UTILIZE QUIZ OBJECTS:
    //quizObjects[*QUIZ NUM*][QUESTION NUM] -->Access to Object
    //Object.question -->Shows question
    //Object.answers[*0 - 3*] --> .text OR .correct
    var forms = document.getElementsByClassName("myForm");
    
    //FOR EACH QUIZ TO BE MADE
    for (var i = 0; i < forms.length; i++) {
        
        var questionFields = forms[i].getElementsByTagName("fieldset");
        
        //FOR EACH QUESTION ON THE QUIZ
        for (var n = 0; n < questionFields.length; n++) {
                var legend = questionFields[n].getElementsByTagName("legend")[0];
                var legendText = quizObjects[i][n].question;
                legend.innerHTML = legendText;
        
            var answerInputs = questionFields[n].getElementsByClassName("answer");
            
            var numOrder = genNumOrder();
            
            //FOR EACH ANSWER IN QUESTION
            for (var x = 0; x < answerInputs.length; x++) {
                var answerText = quizObjects[i][n].answers[numOrder[x]].text;
                answerInputs[x].innerHTML = answerText;
                
            }//END ANSWERS LOOP         
        }//END QUESTIONS LOOP     
    }//END FORMS LOOP  
}//END MAKE QUIZZES FUNC


//Reveal quiz

function revealQuiz(name) {
    var quizElement = document.getElementById(name);
    quizElement.style.display="block";
}


//HELPER FUNCTIONS
/*_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-*/

function genNumOrder() {
            
    var numOrder = [0,1,2,3];
    //generate a random number order
    for (var o = 0; o < numOrder.length; o++) {
        //pull a switcharoo
         var tempNum = numOrder[o];
        //index to switch
         var ind = Math.floor(Math.random() * numOrder.length);
        numOrder[o] = numOrder[ind];
        numOrder[ind] = tempNum;
    }
    
    return numOrder;
}


/*
END EXERCISE JS
*/

/*
JS VALID
*/

 // validates the form (does not send the form if required entries are missing or invalid)
    // javascript validator so "required" element is not needed in HTML code
    function validateForm() {
        
        var isvalid = true;
        
        // makes entry box for name appear pink with a red border if the name box is left empty
        if(document.getElementById("name").value == '') {
            document.getElementById("name").style.borderColor = 'red';
            document.getElementById("name").style.backgroundColor = 'pink';
            isvalid = false;
        }
    
        else
        
        {
            document.getElementById("name").style = null;
        }
        
        
        // makes entry box for date " " if left empty
        if(document.getElementById("notdate").value == '') {
            document.getElementById("notdate").style.borderColor = 'red';
            document.getElementById("notdate").style.backgroundColor = 'pink';
            isvalid = false;
        } 
    
        else
        
        {
            document.getElementById("notdate").style = null;
        }
        
       
        
        
        // javascript to find and format the current date
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        } 

        if(mm<10) {
            mm = '0'+mm
        } 
        
        // today = current date
        today = yyyy + '-' + mm + '-' + dd; // this is how the html input method for date formats the date, as tested by the console.log statement below
        // console.log(document.getElementById("notdate").value);
        
        
        // returns invalid if the date visited is the current date // similar to if date is not entered at all
        if(document.getElementById("notdate").value == today) {
            document.getElementById("notdate").style.borderColor = 'red';
            document.getElementById("notdate").style.backgroundColor = 'pink';
            
            isvalid = false;
        }
            
        if(document.getElementById("quiz").value <= 0) {
            document.getElementById("quiz").style.borderColor = 'red';
            document.getElementById("quiz").style.backgroundColor = 'pink';
            
            isvalid = false;
        }
        
        if(valueCheck < 1) {
            document.getElementById("indent")
            isvalid = false;
            valueCheck = 0;
        }
        
        
        if(document.getElementsByName("learn").value = null) 
        {
            document.getElementById("fieldset1").style.borderColor = 'red';
            document.getElementById("fieldset1").style.backgroundColor = 'pink';
            isvalid = false;
        }
        
        if(document.getElementsByName("webpage").value = null) 
        {
            document.getElementsByName("webpage").value = "None";
        }
        
            
        return isvalid;
    }