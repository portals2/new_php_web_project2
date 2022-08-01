<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  
  echo("
       <script>
          location.href = '/web_p2/php/home_t.php';
         </script>
       ");
?>