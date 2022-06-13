<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
  <!-- <meta name="viewport" content="width=device-width" initial-scale=1.0> -->
  <title>Maddie and Dan's Wedding Website</title>
  <link rel="icon" type="image/png" href="images/logo.png"/>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- <link href=<google font link> rel="stylesheet"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width", initial-scale=1, minimum-scale=1, maximum-scale=1">
</head>
<?php
    require_once 'includes/dbh.inc.php';
    $sql = " select first_name,last_name,family_name,event_name,option,rsvp_flag from in_event a
    inner join participate b
    on a.participate_id=b.id
    inner join guests c
    on b.guests_id = c.id
    inner join event d
    on a.event_id=d.id
    left join food e
    on a.food_id = e.id
    inner join family f
    on c.family_id = f.id;";
    $stmt = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $stmt->execute();

    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    echo "<h1>COMING</h1>";
    foreach ($row as $arr) {
        if ($arr["rsvp_flag"]==="1" && $arr["event_name"] === "Reception") {
            echo "<p>".$arr["first_name"].",".$arr["last_name"].",".$arr["option"]."</p>";
        }
    }
    echo "<h1>NOT COMING</h1>";
    foreach ($row as $arr) {
        if ($arr["rsvp_flag"]==="0" && $arr["event_name"] === "Reception") {
            echo "<p>".$arr["first_name"].",".$arr["last_name"].",".$arr["option"]."</p>";
        }
    }
    echo "<h1>NO RESPONSE</h1>";
    foreach ($row as $arr) {
        if ($arr["rsvp_flag"]!=="1" && $arr["rsvp_flag"]!=="0"  && $arr["event_name"] === "Reception") {
            echo "<p>".$arr["first_name"].",".$arr["last_name"].",".$arr["option"]."</p>";
        }
    }

?>
</html>