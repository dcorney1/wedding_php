<?php
    
     if (isset($_GET['rsvp'])) {
       if ($_GET['rsvp'] == "complete") {
         foreach ($_SESSION["rsvp_status"] as $event){
           foreach ($event as $participant){
             if ($participant["guest_first_name"] == "GUEST") {
              echo "<p>Would you like to update your guest's details?</p>";
             }
           }
           $event_name = $event[0]["event_name"];
           echo "<div>" . $event_name . ":";
           foreach ($event as $participant){
            
             if ($participant["rsvp_flag"] == "0") {
               echo "<p>" . trim($participant["guest_first_name"]). " " . trim($participant["guest_last_name"]). " is not coming</p>";
             }
             else if ($participant["rsvp_flag"] == "1") {
               echo "<p>" . trim($participant["guest_first_name"]). " " . trim($participant["guest_last_name"]). " is coming</p>";
             }
             else {
               echo "<p>" . trim($participant["guest_first_name"]). " " . trim($participant["guest_last_name"]). " hasn't responded</p>";
             }
           }
           echo "</div>";
         }
       }
       else {
         header("location: rsvp.php");
       }
     }
     elseif (isset($_SESSION["families"])) {
       if(isset($_SESSION["test"])) {
         echo "<div>hi</div>";
       }
      echo "<form action=\"includes/logout.inc.php\" method=\"post\">
      <button type=\"submit\" name=\"submit\">Not Any of These?</button>
      </form>";
      echo "
      <form action=\"includes/rsvp.inc.php\" method=\"post\">
      <select name=\"family\" id=\"familyID\" >";
       foreach ($_SESSION["families"] as $family) {
        echo "<option>" . trim($family["name"]) . "</option>";
       }
       echo "</select>
       <button type=\"submit\" name=\"submit\">Submit</button>
       </form>";
      
     }
     else {
        if (isset($_SESSION["family_name"])) {
          echo "<p>Welcome ". trim($_SESSION["family_name"]). "!</p>
          <form action=\"includes/logout.inc.php\" method=\"post\">
          <button type=\"submit\" name=\"submit\">Not ". trim($_SESSION["family_name"]). "!</button>
          </form>";
        }
        else {
          echo "
          <form action=\"includes/rsvp.inc.php\" method=\"post\">
          <input type=\"text\" name=\"name\" placeholder=\"Last Name...\">
          <button type=\"submit\" name=\"submit\">RSVP</button>
          </form>";
        }
        if (isset($_SESSION["rsvp_status"])){
          // id=\"rsvpForm\"
          echo "<form id=\"rsvpForm\" name=\"rsvpForm\" action=\"includes/rsvp.inc.php\" method=\"post\">
          <input type=\"hidden\" name=\"rsvpForm\" value=\"\"/>";
          foreach ($_SESSION["rsvp_status"] as $event){
            $event_name = $event[0]["event_name"];
            echo "<div class=\"tab radio\">" . $event_name . ":";
            foreach ($event as $participant){
              if ($participant["rsvp_flag"] == "0") {
                $yes = "";
                $no = "checked";
              }
              elseif ($participant["rsvp_flag"] == "1") {
                $yes = "checked";
                $no = "";
              }
              else {
                $yes = "";
                $no = "";
              }
              echo
              "<legend>". trim($participant["guest_first_name"]). " " .trim($participant["guest_last_name"]) .":</legend>
                <input label=\"Yes\" type=\"radio\" name=" . $participant["id"] . " " . $yes . " value=\"1\" oninput=\"this.className = ''\">
                <input label=\"No\" type=\"radio\" name=" . $participant["id"] . " " .  $no ." value=\"0\" oninput=\"this.className = ''\">";
              }
            echo  "</div>";
          }
          echo
          "<div style=\"overflow:auto;\">
            <div style=\"float:right;\">
              <button type=\"button\" id=\"prevBtn\" onclick=\"nextPrev(-1)\">Previous</button>
              <button type=\"button\" id=\"nextBtn\" onclick=\"nextPrev(1)\">Next</button>
            </div>
          </div>
          <div style=\"text-align:center;margin-top:40px;\">";
          foreach ($_SESSION["rsvp_status"] as $event){
            echo "<span class=\"step\"></span>";
          }
          echo "</div>";

        echo "</form>";
        }
      }
         


    ?>
  <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Please include the name on your invite</p>";
      }
      else if  ($_GET["error"] == "wronglogin") {
            echo "<p>Your name is not in our records, please contact hosts</p>";
          }
      else if  ($_GET["error"] == "stmtfailed") {
            echo "<p>An unknown error occurred, please try again</p>";
          }
    }
   ?> 