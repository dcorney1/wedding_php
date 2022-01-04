<?php
  include_once 'header.php'
?>
<section class="sub-header" id="photos">
  <?php
    include_once 'nav.php'
  ?>
<div class="text-box">
    <h1>Photos</h1>
</div>
</section>
<section class="travel">
<div class="carousel-container">
  <i class="fa fa-arrow-left"  id="prevBtn" aria-hidden="true"></i>
  <i class="fa fa-arrow-right" id="nextBtn" aria-hidden="true"></i>
  <div class="carousel-slide">
    <?php
      $directory = './carousel';
      $images = glob($directory . "/*.png");
      // print_r($images);
      echo '<div id="lastClone">
        <img src="' . end($images) . '" alt=""></div>';
      foreach($images as $image)
      {
        {
         echo '<div>
           <img src="' . $image . '" alt=""></div>';
       }
      }
      echo '<div id="firstClone">
        <img src="' . $images[0] . '" alt=""></div>';
    ?>
  </div>
</div>
</section>


<?php
  include_once 'footer.php'
?>
