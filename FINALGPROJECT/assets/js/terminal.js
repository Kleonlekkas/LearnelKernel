document.addEventListener("DOMContentLoaded", function(event) {
   // the DOM is ready

   let cmdBox = document.getElementById("command");
   let terminal = document.getElementById("terminal");

   // history of commands
   let history = [];
   let historyPos = 0;

		// custom command map, command ==> output
    let cmdMap = {

       clear: function(params) {
         // clear terminal
         terminal.innerHTML = "";
       },

    }

   cmdBox.addEventListener("keyup", function(e) {
       e.preventDefault();
       if (e.keyCode === 13) {
           // enter pressed, parse command
           let cmd = cmdBox.value;

           // evaluate command
           evalCommand(cmd);

           // track command history
           history.push(cmd);
           historyPos++;

           // clear input
           cmdBox.value = "";
       } else if (e.keyCode === 38) {
         // up arrow, get previous command
         if (history.length > 0) {
           cmdBox.value = history[historyPos];
           cmdBox.scrollLeft = cmdBox.scrollWidth;
           if (historyPos > 0) {
             historyPos = historyPos - 1;
           }
         }
       } else if (e.keyCode === 40) {
         // down arrow, get next command
         if (history.length > 0) {
           if (historyPos < (history.length - 1)) {
             historyPos = historyPos + 1;
           }
           cmdBox.value = history[historyPos];
           cmdBox.scrollLeft = cmdBox.scrollWidth;
         }
       }
   });

   cmdBox.addEventListener("focus", function(e) {
     // reset history position
     historyPos = history.length - 1;
   })

   function evalCommand(cmd) {
		 // split command by spaces ignoring empty
     let args = cmd.split(" ").filter(function(el) {return el.length != 0});

     // command is first argument, parameters are the rest
     let command = args[0];
     params = args.slice(1);

     console.log("Cmd: " + command + " Params: " + params);

     // add command to terminal window
     printTerminal("$ " + cmd);

		 // evaluate command
     if (command in cmdMap) {
       // call command in map with given parameters
       cmdMap[command](params);
     } else if (command) {
       // command is not null, use php...
			 var xmlhttp = new XMLHttpRequest();
			 xmlhttp.onreadystatechange = function() {
				 if (this.readyState == 4 && this.status == 200) {
					 // parse shell line breaks
					 console.log(this.responseText);
					 var resp = this.responseText.replace(/(?:\r\n|\r|\n)/g, '<br>');
					 printTerminal(resp);
				 }
			 };
			 console.log("POST shell.php cmd: " + cmd);
			 xmlhttp.open('POST', 'shell.php', true);
			 xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			 xmlhttp.send('cmd=' + encodeURI(cmd));
     }

     // scroll down terminal
     terminal.scrollTop = terminal.scrollHeight;
   }

   function initTerminal() {
     // welcome message
     printTerminal("Welcome to the interactive terminal");
     printTerminal("Type <b>help</b> for a list of available commands, type <b>clear</b> to clear the screen.");
   }

   function printTerminal(text, textOnly = false) {
     let div = document.createElement("div");
		 if (textOnly) {
				let txtNode = document.createTextNode(text);
				div.appendChild(txtNode);
		 } else {
     	  div.innerHTML = text;
		 }
		 terminal.appendChild(div);
   }

   // initialize
   initTerminal();

});

