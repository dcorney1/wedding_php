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
    <ul>
    <?php
      $directory = './carousel';
      $images = glob($directory . "/*.jpg");
      // print_r($images);

      foreach($images as $image)
      {
        echo '<li><img src="' . $image . '" alt="" loading="lazy"></li>';
      }
    ?>
    </ul>
</section>


<?php
  include_once 'footer.php'
?>
