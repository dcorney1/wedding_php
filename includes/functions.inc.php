<?php
  function uidExists($dbh, $name) {
    $sql = "SELECT * FROM guests WHERE last_name = ?;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->bindValue(1, $name);
    $stmt->execute();

    $row = $stmt->fetchall(PDO::FETCH_ASSOC);

    if ($row) {
      return $row;
      
    }
    else {
      $result = false;
      return $result;
    }

    $stmt->close();
  }

  function getFamilyID($dbh, $name) {
    $sql = "SELECT * FROM family WHERE family_name = ?;";
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

  function familyExists($dbh, $family) {
    $sql = "select a.*, b.family_name from guests a left join family b on a.family_id = b.id  WHERE b.id = ?;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
/*
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../rsvp.php?error=stmtfailed");
      exit();
    }
*/
    $stmt->bindValue(1, $family);
    // $stmt->bindValue(2, $id);
    $stmt->execute();

    $familymembers = array();
    while ($row = $stmt->fetch())
    {
      $family_id = $row["family_id"];
      $familymembers[] = $row["first_name"] . ' ' . $row["last_name"];
      $familyname = $row["family_name"];
    }
    return array(
    "family_id" => $family_id,
    "members" => $familymembers,
    "name" => $familyname
    );
    $stmt->close();
  }

  function getevents($dbh, $familyid) {
    $sql = "select a.id, a.event_id, b.event_name,c.guests_id, first_name, last_name,
    rsvp_flag from in_event a
    left join event b on a.event_id = b.id
    left join participate c on a.participate_id = c.id
    left join guests d on c.guests_id = d.id
    where d.family_id = ? order by event_id, d.id;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
/*
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../rsvp.php?error=stmtfailed");
      exit();
    }
*/
//can we change these ids to ints not strs
    $stmt->bindValue(1, $familyid);
    $stmt->execute();
    // $row = $stmt->fetch();
    //preinitializes the event (each event is a page, each user is a row, each field is a column)
    // $event_id = $row["event_id"];
    // $rsvps = array("event" => $event_id,"event_name" => $row["event_name"],$row["id"],$row["first_name"],$row["last_name"],$row["rsvp_flag"]);


    $rsvps = array();
    $event_id = 0;
    while ($row = $stmt->fetch()) {
      if ($event_id !== $row["event_id"]){
        $event_id = $row["event_id"];
        //$rsvps[] = array("event_id" => $event_id, array());
      }
      $rsvps[$event_id][] = array("id" => $row["id"], "event_name" => $row["event_name"],"guests_id" => $row["guests_id"],"guest_first_name" => $row["first_name"],"guest_last_name" => $row["last_name"],"rsvp_flag" => $row["rsvp_flag"]);
    //$rsvps[$event_id][] = array($row["id"],"event_name" => $row["event_name"],($row["first_name"],$row["last_name"],$row["rsvp_flag"]);)
    }
    return $rsvps;
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
    if (count($guestExists) > 1) {
      foreach ($guestExists as $guest) {
        $families[] = $guest["family_id"];
      }
      $families = array_unique($families);
      foreach ($families as $family) {
        $array[] = familyExists($dbh, $family);
      }
      
      session_start();
      $_SESSION["families"] = $array;
      header("location: ../rsvp.php?page=multifamily");
      exit();
    }

    
    session_start();
    
    $guestExists = $guestExists[0];
    $_SESSION["person_id"] = $guestExists["id"];
    $_SESSION["firstName"] = $guestExists["first_name"];
    $_SESSION["lastName"] = $guestExists["last_name"];
    $_SESSION["family_id"] = $guestExists["family_id"];

    $familyExists = familyExists($dbh, $_SESSION["family_id"], $_SESSION["person_id"]);
    $_SESSION["family_name"] = $familyExists["name"];
    $_SESSION["family_id"] = $familyExists["family_id"];
    $rsvp_status = getevents($dbh, $_SESSION["family_id"]);
    $_SESSION["rsvp_status"] = $rsvp_status;
    
    if (count($familyExists["members"]) > 1) {
      header("location: ../rsvp.php?family="  .trim($_SESSION["family_name"]));
      
      exit();
    }
    header("location: ../rsvp.php?family="  .trim($_SESSION["family_name"]));
    exit();

  }

  function loginFamily($dbh, $name) {
    $family = getFamilyID($dbh, $name);
    
    session_start();
    $_SESSION["family_id"] = $family["id"];
    $familyExists = familyExists($dbh, $_SESSION["family_id"]);
    $_SESSION["family_name"] = $familyExists["name"];
    $_SESSION["family_id"] = $familyExists["family_id"];
    $rsvp_status = getevents($dbh, $_SESSION["family_id"]);
    $_SESSION["rsvp_status"] = $rsvp_status;
  
    header("location: ../rsvp.php?family="  .trim($_SESSION["family_name"]));
    exit();
  }


  function updateRSVP($dbh, $idArray) {
    $sql = "update in_event set rsvp_flag = ? where id = ?;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    foreach ($idArray as $key => $value) {
        $stmt->execute([$value, $key]);
    }
    session_start();
    $rsvp_status = getevents($dbh, $_SESSION["family_id"]);
    $_SESSION["rsvp_status"] = $rsvp_status;

    header("location: ../rsvp.php?rsvp=complete");
    exit();

}
