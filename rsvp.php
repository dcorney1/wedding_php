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
        foreach ($_SESSION["rsvp_status"] as $event){
          $event_name = $event[1]["event_name"];
          echo "<p>" . $event_name . "</p>";
          echo "<form action=\"includes/rsvp.inc.php\" method=\"post\">";
          foreach ($event as $participant){
            echo
            "<legend>Welcome ". trim($participant[1]). " " .trim($participant[2]) ."!</legend>
              <input type=\"radio\" name=\"rsvp\" value=\"yes\">yes
              <input type=\"radio\" name=\"rsvp\" value=\"no\">no";
            }
          echo  "</form>";

        }

      }


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
