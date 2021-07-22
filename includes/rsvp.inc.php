<?php

if (isset($_POST["submit"])) {
  $name = $_POST["name"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($name) !== false) {
     header("location: ../rsvp.php?error=emptyinput");
     exit();
  }

  loginUser($conn, $name);
}
else {
  header("location: ../rsvp.php");
  exit();
}
