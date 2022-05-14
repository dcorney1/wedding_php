<?php
  include_once 'header.php'
?>
<section class="sub-header" id="registry">
  <?php
    include_once 'nav.php'
  ?>
  <div class="text-box">
    <h1>Registry</h1>
</div>
</section>
  <section class="travel">
  <div class = "travel-container">
  <div class="date-header">
  <h3>Dear friends and family:</h3>
  <p>Our registry is small because we have big things planned! We intend to move to Europe for an extended honeymoon, and wanted to make sure we can pack light. Although your presence is enough, if you would like to suggest an idea for our travels and/or make a monetary contribution, it would go a long way to make our trip amazing.</p>
</div>
</div>

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
