<?php
  function uidExists($conn, $name) {
    $sql = "SELECT * FROM guests WHERE CONCAT(firstName,' ', lastName) = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../rsvp.php?error=stmtfailed");
      exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }

    mysqli_stmt_close($stmt);
  }

  function emptyInputLogin($name) {
    $result;
    if (empty($name)) {
      $result = true;
    }
    else {
      $result = false;
    }
    return $result;
  }
// Checks if firstname_lastname exists in DB
  function loginUser($conn, $name) {
    $uidExists = uidExists($conn, $name);
    if ($uidExists == false) {
      header("location: ../rsvp.php?error=wronglogin");
      exit();
    }

    session_start();
    $_SESSION["person_id"] = $uidExists["person_id"];
    $_SESSION["firstName"] = $uidExists["firstName"];
    $_SESSION["lastName"] = $uidExists["lastName"];
    //email: $_SESSION["firstName"] = $uidExists["firstName"]
    header("location: ../rsvp.php?hello=this is " . trim($_SESSION["firstName"]) . " my test");
    exit();
  }
