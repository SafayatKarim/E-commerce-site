<?php
error_reporting(0);
session_start();
   
   unset($_SESSION['adminuser']);
   header("location:../user_login.php");
                               
 ?>