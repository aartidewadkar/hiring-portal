<?php
 session_cache_limiter(FALSE);
   session_start();
   unset($_SESSION["recruiter_id"]);
   
//Destroy entire session
session_destroy();
   header('location: ../tagteam.php');
?>