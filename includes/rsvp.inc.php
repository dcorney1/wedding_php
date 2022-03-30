<?php
//the buttons are not in the form so will not be included in the post


if (isset($_POST["submit"])) {
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  if (array_key_exists("family", $_POST)){
    $family = $_POST["family"];
    loginFamily($dbh, $family);
    exit();
  }
  
  if (array_key_exists("name", $_POST)){
    
    $name = $_POST["name"];
    if (emptyInputLogin($name) !== false) {
      header("location: ../rsvp.php?error=emptyinput");
      exit();
   }
   
   loginUser($dbh, $name);
  }

}
else if (isset($_POST["rsvpForm"])) {
  $updates = $_POST;
  unset($updates["rsvpForm"]);
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  updateRSVP($dbh, $updates);
}
else {
  header("location: ../rsvp.php");
  exit();
}
