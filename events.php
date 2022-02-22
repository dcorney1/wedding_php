<?php
include_once 'header.php';
?>
<section class="sub-header" id="events">
  <?php
include_once 'nav.php';
?>
  <div class="text-box">
      <h1>Events</h1>
  </div>
</section>
<!-- Travel Content -->
<section class="travel">
<?php
if (isset($_SESSION["person_id"])) {
          echo "  <div class=\"travel-container\">
          <div class=\"date-header\">
              <h1>Thursday, August 25th</h1>
              <h2>Brewery Night</h2>
              <div class=\"details\">
              <p class=\"event_location\">Burlington Beer Company</p>
              <p>180 Flynn Ave,</p><p> Burlington, VT 05401</p>
              <p class=\"event_time\">6-8 PM</p>
                </div>
        </div>";
        }
        ?>

  <div class="date-header">
    <h1>Friday, August 26th</h1>
    <div class="row">
      <!-- Commenting out Golf Outing for Now -->
    <!-- <div class="travel-col">
        <h2>Golf Outing</h2>
      <div class="details">
        <p class="event_location">The Links at Lang Farm</p>
        <p>39 Essex Way,</p><p> Essex Junction, VT 05452</p>
        <p class="event_time">Morning</p>
      </div>
    </div>
      <div class="divider">
        </div> -->
        <div class="travel-col">
        <h2>Welcome Dinner</h2>
        <div class="details">
          <p class="event_location">Backyard at The Essex</p>
          <p>70 Essex Way,</p><p> Essex Junction, VT 05452</p>
          <p class="event_time">6 to 9 PM</p>
        </div>
      </div>

  </div>
  <div class="date-header">
    <h1>Saturday, August 27th</h1>
    <div class="row">
      <div class="travel-col">
        <h2>Ceremony</h2>
        <div class="details">
          <p class="event_location">St. Pius X Catholic Church</p>
          <p>20 Jericho Road,</p><p> Essex Junction, VT 05452</p>
          <p class="event_time">2:30 PM</p>
          </div>
      </div>
      <div class="divider">
      </div>
      <div class="travel-col">
        <h2>Reception</h2>
        <div class="details">
        <p class="event_location">The Ponds at Bolton Valley</p>
        <p>3233 Bolton Valley Access Rd,</p><p> Bolton, VT 05676</p>
        <p class="event_time">Following Ceremony</p>
          </div>
      </div>
  </div>
  </div>
  <div class="date-header">
        <h1>Sunday, August 28th</h1>
        <h2>Farewell Brunch</h2>
        <div class="details">
        <p class="event_location">Backyard at the Essex</p>
        <p>70 Essex Way,</p><p> Essex Junction, VT 05452</p>
        <p class="event_time">9 to 11 AM</p>
          </div>
  </div>
    </div>
</section>
<!-- Footer -->
<?php
include_once 'footer.php';
?>
