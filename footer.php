<section class="footer">
  <!-- <h4>About Us</h4>
  <p>This is about us</p>
  <div class="icons">
    <i class="fa fa-facebook"></i>
    <i class="fa fa-instagram"></i>
  </div> -->
  <!--  -->
  <p>Made with <i class="fa fa-heart-o"></i> by M&D  </p>
  </section>
  <script src="java/menu.js"></script>
  <!--JavaScript to give countdown until August 27 2022-->
  <script src="java/countdown.js"></script>
  <!--Script for RSVP forms only -->
  <script src="java/form.js"></script>
  <script src="java/carousel.js"></script>
  <script src="java/accordion.js"></script>
  <script src="java/email-pop.js"></script>
  <script>var mybutton = document.getElementById("topBtn");

// When the user scrolls down 20px from the top of the document, show the button

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  console.log('hello');
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;

  
  
  
  window.scrollTo({ top: 0, behavior: 'smooth' })}</script>



</body>
  </html>