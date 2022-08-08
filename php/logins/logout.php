<?php
  session_start();
  unset($_SESSION["userid"]);
  unset($_SESSION["username"]);
  
  echo("
       <script>
          location.href = '/p2/js/web_p2/php/home_t.php';
         </script>
       ");
?>