<?php
error_reporting(0);
session_start();
// do logout from page
   
   unset($_SESSION['user']);
   header("location:user_login.php");
                               
 ?>