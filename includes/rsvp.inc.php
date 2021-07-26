<?php
//the buttons are not in the form so will not be included in the post


if (isset($_POST["submit"])) {
  $name = $_POST["name"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputLogin($name) !== false) {
     header("location: ../rsvp.php?error=emptyinput");
     exit();
  }

  loginUser($dbh, $name);
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
