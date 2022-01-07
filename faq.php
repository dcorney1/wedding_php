<?php
  include_once 'header.php'
?>
<section class="sub-header" id="faq">
  <?php
    include_once 'nav.php'
  ?>
  <div class="text-box">
      <h1>FAQ</h1>
    </div>
      <script src="java/countdown.js"></script>
      <script src="java/menu.js"></script>
    </section>
  <section class="travel">
  <button class="open-button" onclick="openForm()">Question? Click here to email us!</button>
  <?php
    if (isset($_GET["message"])) {
      if ($_GET["message"] == "messagesent") {
        echo "<p>Thank you! We will take a look A.S.A.P.</p>";
      }
    }
  ?>
    <div class="container">
      <div class="accordion">
        <div class="accordion-item" id="question1">
          <a class="accordion-link">
            How often do you go to the beach?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
            <p>this is a basic answer2</p>
          </div>
        </div>

        <div class="accordion-item" id="question2">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
            <p>this is a basic answer2</p>
          </div>
        </div>

        <div class="accordion-item" id="question3">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question4">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question5">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question6">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question7">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question8">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question9">
          <a class="accordion-link">
            How often do you go to the beach2?
            <i class="fa fa-plus" aria-hidden="true"></i>
            <i class="fa fa-minus" aria-hidden="true"></i>
          </a>
          <div class="answer">
              <p>this is a basic answer2</p>
          </div>
        </div>
        <div class="accordion-item" id="question10">
          <a class="accordion-link">
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
  <div class="form-popup" id="myForm">
    <form class="form-container" action="includes/contactform.inc.php" method="post">
      <h3>Send us an E-mail</h3>
      <input type="text" name="name" placeholder="Full name">
      <input type="text" name="email" placeholder="Your e-mail">
      <input type="text" name="subject" placeholder="Subject">
      <textarea name="message" placeholder="Message"></textarea>
      <button type="submit" name="submit" class="btn">SEND MAIL</buttton>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
  </div>

  </section>
<!-- Travel Content -->
<!-- Footer -->

<?php
  include_once 'footer.php'
?>
