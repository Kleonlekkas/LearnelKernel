document.addEventListener("DOMContentLoaded", function(event) {
   // the DOM is ready

   let cmdBox = document.getElementById("command");
   let terminal = document.getElementById("terminal");

   // history of commands
   let history = [];
   let historyPos = 0;

    // map command ==> output
    let cmdMap = {

       help: function(params) {
         printTerminal("Available commands:");
         printTerminal("<strong>help</strong> - List available commands.");
         printTerminal("<strong>clear</strong> - Clear the screen.");
         printTerminal("<strong>ls</strong> - List files and directories.");
         printTerminal("<strong>params</strong> - Test parsing of parameters, outputs list of parameters arg1,arg2,etc.");
       },

       clear: function(params) {
         // clear terminal
         terminal.innerHTML = "";
       },

       ls: function(params) {
         printTerminal("Apples<br>Bananas<br>Cats");
       },

       params: function(params) {
         printTerminal("Params: " + params);
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
       // command is not null
       printTerminal(command + ": command not found");
     }

     // scroll down terminal
     terminal.scrollTop = terminal.scrollHeight;
   }

   function initTerminal() {
     // welcome message
     printTerminal("Welcome to the interactive terminal");
     printTerminal("Type <b>help</b> for a list of available commands.");
   }

   function printTerminal(text) {
     let div = document.createElement("div");
     div.innerHTML = text;
     terminal.appendChild(div);
   }

   // initialize
   initTerminal();

});

