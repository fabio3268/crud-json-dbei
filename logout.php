<?php
  session_start();
  session_destroy();
  setcookie("logado",1,time()-10);
  header("Location:index.php");