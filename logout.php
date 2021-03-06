<?php
session_start();
session_destroy();
 
  header("location:index.html?logout=you are logged out")


?>