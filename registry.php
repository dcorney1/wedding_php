<?php
  include_once 'header.php'
?>
<section class="sub-header">
  <?php
    include_once 'nav.php'
  ?>
  <div class="text-box">
    <h1>Registry</h1>
</div>
</section>
  <section>
<script id='script_myregistry_giftlist_iframe' type='text/javascript' src='//www.myregistry.com//Visitors/GiftList/iFrames/EmbedRegistry.ashx?r=Ar0sdoRhz8K1iha6yRpXNg2&v=2'></script>
<!-- <script id='script_myregistry_giftlist_iframe' type='text/javascript' src='java/registry.js'></script> -->
<script type="text/javascript">
    window.onload = function() {
      console.log('What is happening here');
      var iframe = document.getElementById("myregsitry_embeded_iframe");
      // while (obj === null) {
      //   console.log(obj)
      // } 
      // obj = document.getElementById("pnlRegistryWelcome");
      console.log(iframe.document)
      $('#myregsitry_embeded_iframe').contents().find("head").append($("<style type='text/css'>"+
       "#pnlRegistryWelcome {"+
         "display: none;"+
       "} "+
       "#tawkchat-status-icon {display:none} </style>")
   );
    }
    
</script>   
</section>

<!-- Travel Content -->
<!-- Footer -->
<?php
  include_once 'footer.php'
?>
