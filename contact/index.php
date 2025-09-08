<!DOCTYPE html>
<html>
  <head>
    <title>Absolute Cinema</title>
    <link rel="stylesheet" href="../styles.css"/>
    <style>
      .error { color: red; font-size: 0.9rem; }
      .is-invalid { border-color: #e11d48; outline: none; }
    </style>
  </head>
  <body>
    <div class="headContainer">
      <?php
        include("../include/header.php");
        include("../include/navigation.php");
      ?>
    </div>

<main>
      <h1>Contact Us</h1>
      <h2>We would love to hear from you! Please use the following details to get in touch with us.</h2>

      <!-- Contact Container with Flexbox -->
      <div class="contact-container">
        <!-- Contact Form Section on Left -->
        <div class="contact-form">
          <h2>Send Us a Message</h2>
          <form id="contactForm" action="process_contact.php" method="POST" novalidate>
            <table>
              <tr>
                <td><label for="name">Your Name:</label></td>
                <td>
                  <input type="text" id="name" name="name" class="form-input" required>
                  <span id="nameError" class="error"></span>
                </td>
              </tr>

              <tr>
                <td><label for="email">Your Email:</label></td>
                <td>
                  <input type="email" id="email" name="email" class="form-input" required>
                  <span id="emailError" class="error"></span>
                </td>
              </tr>

              <tr>
                <td><label for="message">Your Message:</label></td>
                <td>
                  <textarea id="message" name="message" class="form-textarea" required></textarea>
                  <span id="messageError" class="error"></span>
                </td>
              </tr>

              <tr>
                <td colspan="2">
                  <button type="submit">Send Message</button>
                </td>
              </tr>
            </table>
          </form>
        </div>

        <!-- Contact Information Section on Right -->
        <div class="contact-info">
          <h2>Our Contact Information</h2>
          <p><strong>Email:</strong> <a href="mailto:khaijeck@1utar.my">khaijeck@1utar.my</a></p>
          <p><strong>Phone Number:</strong> +60 16-9014290</p>
          <p><strong>Address:</strong> Jalan Sungai Long, Bandar Sungai Long, 43000 Kajang, Selangor</p>

          <!-- Google Map Section -->
          <section class="map">
            <h2>Find Us</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1184.5111851283773!2d101.79446399820554!3d3.039682324827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc34a5f21a8235%3A0x78796ffc32ce3fcd!2sUniversiti%20Tunku%20Abdul%20Rahman%20(UTAR)!5e0!3m2!1sen!2smy!4v1757351181106!5m2!1sen!2smy"></iframe>
          </section>

          <!-- Social Media Links Section -->
          <section class="social-media">
            <h2>Follow Us</h2>
            <p>Stay connected with us through our social media:</p>
            <div class="social-icons">
              <a href="https://facebook.com" target="_blank"><img src="../images/Circle-Facebook-Logo-Download-PNG-Image.png" alt="Facebook"></a>
              <a href="https://twitter.com" target="_blank"><img src="../images/X-Logo.png" alt="Twitter"></a>
              <a href="https://instagram.com" target="_blank"><img src="../images/Instagram-Emblem.png" alt="Instagram"></a>
            </div>
          </section>
        </div>
      </div>
    </main>

    <?php include("../include/footer.php"); ?>

    <!-- JavaScript validation (aligned with your example’s spirit) -->
    <script src = "script.js"></script>
  </body>
</html>
