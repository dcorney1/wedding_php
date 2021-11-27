<?php
  include_once 'header.php'
?>
<section class="sub-header" id="faq">
  <?php
    include_once 'nav.php'
  ?>
  <div class="text-box">
      <h1>Coming Soon</h1>
    </div>
      <script src="java/countdown.js"></script>
      <script src="java/menu.js"></script>
    </section>
  <section class="faq">
    <div class="container">
      <div class="accordion">
        <div class="accordion-item" id="question1">
          <a class="accordion-link" href="#question1">
            How often do you go to the beach?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
            <p>this is a basic answer2</p>
          </div>
        </div>

        <div class="accordion-item" id="question2">
          <a class="accordion-link" href="#question2">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
            <p>this is a basic answer2</p>
          </div>
        </div>

        <div class="accordion-item" id="question3">
          <a class="accordion-link" href="#question3">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>

      </div>
  </div>
<div class="email">
  <p>SEND E-MAIL</p>
  <form class="contract-form" action="contactform.php" method="post">
    <input type="text" name="name" placeholder=""="Full name">
    <input type="text" name="mail" placeholder=""="Your e-mail">
    <input type="text" name="subject" placeholder=""="Full name">
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit" name="submit">SEND MAIL</button>
  </form>

</div>

  </section>
<!-- Travel Content -->
<!-- Footer -->

<?php
  include_once 'footer.php'
?>
