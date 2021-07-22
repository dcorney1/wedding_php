<?php
  function uidExists($dbh, $name) {
    $sql = "SELECT * FROM guests WHERE first_name || ' ' || last_name = ?;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->bindValue(1, $name);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }

    $stmt->close();
  }

  function familyExists($dbh, $family, $id) {
    $sql = "select a.*, b.family_name from guests a left join family b on a.family_id = b.id  WHERE b.id = ? and a.id != ?;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
/*
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../rsvp.php?error=stmtfailed");
      exit();
    }
*/
    $stmt->bindValue(1, $family);
    $stmt->bindValue(2, $id);
    $stmt->execute();

    $familymembers = array();
    while ($row = $stmt->fetch())
    {
      $familymembers[] = $row["first_name"] . ' ' . $row["last_name"];
      $familyname = $row["family_name"];
    }
    return array(
    "members" => $familymembers,
    "name" => $familyname
    );
    $stmt->close();
  }
/*
    $var_str = var_export($row, true);
    $var = "<?php\n\n\$text = $var_str;\n\n?>";
    file_put_contents('filename.php', $var);
    if ($row) {
      return $row;
    }
    else {
      $result = false;
      return $result;
    }

    $stmt->close();
  */


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
  function loginUser($dbh, $name) {
    $guestExists = uidExists($dbh, $name);
    if ($guestExists == false) {
      header("location: ../rsvp.php?error=wronglogin");
      exit();
    }

    session_start();
    $_SESSION["person_id"] = $guestExists["id"];
    $_SESSION["firstName"] = $guestExists["first_name"];
    $_SESSION["lastName"] = $guestExists["last_name"];
    $_SESSION["family_id"] = $guestExists["family_id"];
    //email: $_SESSION["firstName"] = $guestExists["firstName"]

    $familyExists = familyExists($dbh, $_SESSION["family_id"], $_SESSION["person_id"]);
    if ($familyExists == false) {
      header("location: ../rsvp.php?guest=".trim($_SESSION["firstName"]) . " " .trim($_SESSION["lastName"]));
      exit();
    }
    $var_str = var_export($familyExists, true);
    $var = "<?php\n\n\$text = $var_str;\n\n?>";
    file_put_contents('filename.php', $var);
    $_SESSION["family_name"] = $familyExists["name"];
    header("location: ../rsvp.php?guest=".trim($_SESSION["firstName"]) . " " .trim($_SESSION["firstName"]) . "&family="  .trim($_SESSION["family_name"]));
    exit();

  }
