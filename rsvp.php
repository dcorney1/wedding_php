<?php
  include_once 'header.php'
?>
<section class="sub-header">
  <?php
    include_once 'nav.php'
  ?>
  <h2>RSVP</h2>
</section>
<section>
  <div class="">

    <?php
     if (isset($_GET['rsvp'])) {
       if ($_GET['rsvp'] == "complete") {
         foreach ($_SESSION["rsvp_status"] as $event){
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
         header("location: rsvp.php?");
       }
     }
     else {
        if (isset($_SESSION["person_id"])) {
          echo "<p>Welcome ". trim($_SESSION["firstName"]). "!</p>
          <form action=\"includes/logout.inc.php\" method=\"post\">
          <button type=\"submit\" name=\"submit\">Not ". trim($_SESSION["firstName"]). "!</button>
          </form>";
        }
        else {
          echo "
          <form action=\"includes/rsvp.inc.php\" method=\"post\">
          <input type=\"text\" name=\"name\" placeholder=\"Full name...\">
          <!-- <input type=\"text\" name=\"zip\" placeholder=\"Zip Code...\">
          <input type=\"text\" name=\"email\" placeholder=\"Email...\"> -->
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
    // }


    ?>
    <!-- <input type="text" name="name" placeholder="Full name..."> -->
    <!-- <input type="text" name="zip" placeholder="Zip Code...">
    <input type="text" name="email" placeholder="Email..."> -->
    <!-- <button type="submit" name="submit">RSVP</button> -->


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
</div>
</section>

<?php
  include_once 'footer.php'
?>
