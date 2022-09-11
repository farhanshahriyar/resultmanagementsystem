<?php
   include('../init.php');
   session_start();
   $db = mysqli_select_db($conn,'results');
   $user_check = $_SESSION['login_user'];
   
   $sqlConnect = "SELECT username FROM admin WHERE username='$user_check'";
   $ses_sql = mysqli_query($conn,$sqlConnect);
   $row = mysqli_fetch_array($ses_sql);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['login_user'])){
      header("Location: ../login");
   }
?>