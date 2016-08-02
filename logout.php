<?php

   session_start();
   unset($_SESSION['user']);
   echo 'Logging Out...';
   header('Refresh: 2; URL = login.php');
?>
