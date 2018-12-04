<?php
$page = "Terminal";
include 'assets/inc/header.php';
session_start();
?>
<body>
    <img class = "toppic" src = "assets/img/terminal.png" alt="Learnel Kernel command">
    <div class = "content">
      <div id="terminal"></div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">$</span>
        </div>
        <input id="command" type="text" class="form-control" placeholder="Enter command..." aria-label="Command" aria-describedby="basic-addon1">
      </div>

    </div>
</body>

<?php
include 'assets/inc/footer.php';
?>
