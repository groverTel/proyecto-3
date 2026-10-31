<?php
   session_start();
   if(isset($_SESSION['nivel']))
   {
     session_unset();
     session_destroy();
   }
   header ("Location: index.php");
?>
