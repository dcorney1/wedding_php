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
<section class="travel" id="page_photos">
    <?php
      $directory = './carousel';
      $images = glob($directory . "/*.png");
      // print_r($images);

      foreach($images as $image)
      {
        echo '<img src="' . $image . '" alt="">';
      }
    ?>
</section>


<?php
  include_once 'footer.php'
?>
