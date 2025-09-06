<!DOCTYPE html>
<html>
  <head>
    <title>Contact Us - Absolute Cinema</title>
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
      <p>We would love to hear from you! Please use the following details to get in touch with us.</p>

      <!-- Contact Details Section -->
      <section class="contact-details">
        <h2>Our Contact Information</h2>
        <p><strong>Email:</strong> contact@absolutecinema.com</p>
        <p><strong>Phone Number:</strong> +1 (234) 567-8901</p>
        <p><strong>Address:</strong> 123 Cinema Street, Movie City, ABC 456</p>
      </section>

      <!-- Google Map Section -->
      <section class="map">
        <h2>Find Us</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.052646331108!2d-73.9851302845987!3d40.74881727932746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259ae35f601b7%3A0x4b6c82b522021dff!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1641895571619!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </section>

      <!-- Contact Form Section -->
      <section class="contact-form">
  <h2>Send Us a Message</h2>

  <!-- ADDED: id for JS to hook + error spans -->
  <form id="contactForm" action="process_contact.php" method="POST" novalidate>
    <table>
      <tr>
        <td><label for="name">Your Name:</label></td>
        <td>
          <input type="text" id="name" name="name" required>
          <span id="nameError" class="error"></span>
        </td>
      </tr>

      <tr>
        <td><label for="email">Your Email:</label></td>
        <td>
          <input type="email" id="email" name="email" required>
          <span id="emailError" class="error"></span>
        </td>
      </tr>

      <tr>
        <td><label for="message">Your Message:</label></td>
        <td>
          <textarea id="message" name="message" rows="4" required></textarea>
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
</section>

      <!-- Social Media Links Section -->
      <section class="social-media">
        <h2>Follow Us</h2>
        <p>Stay connected with us through our social media:</p>
        <ul>
          <li><a href="https://facebook.com" target="_blank">Facebook</a></li>
          <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
          <li><a href="https://instagram.com" target="_blank">Instagram</a></li>
        </ul>
      </section>
    </main>

    <?php include("../include/footer.php"); ?>

    <!-- JavaScript validation (aligned with your example’s spirit) -->
    <script>
      (function () {
        const form = document.getElementById('contactForm');
        const nameEl = document.getElementById('name');
        const emailEl = document.getElementById('email');
        const messageEl = document.getElementById('message');

        const nameErr = document.getElementById('nameError');
        const emailErr = document.getElementById('emailError');
        const messageErr = document.getElementById('messageError');

        const emailPattern =
          /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i; // simple + robust enough for UI

        function setError(el, errEl, msg) {
          errEl.textContent = msg || '';
          if (msg) {
            el.classList.add('is-invalid');
          } else {
            el.classList.remove('is-invalid');
          }
        }

        function validateName() {
          const v = nameEl.value.trim();
          if (!v) return setError(nameEl, nameErr, 'Name is required'), false;
          if (v.length < 2) return setError(nameEl, nameErr, 'Name must be at least 2 characters'), false;
          return setError(nameEl, nameErr, ''), true;
        }

        function validateEmail() {
          const v = emailEl.value.trim();
          if (!v) return setError(emailEl, emailErr, 'A valid email is required'), false;
          if (!emailPattern.test(v)) return setError(emailEl, emailErr, 'Please enter a valid email address'), false;
          return setError(emailEl, emailErr, ''), true;
        }

        function validateMessage() {
          const v = messageEl.value.trim();
          if (!v) return setError(messageEl, messageErr, 'Subject/Message is required'), false;
          if (v.length < 10) return setError(messageEl, messageErr, 'Please provide at least 10 characters'), false;
          return setError(messageEl, messageErr, ''), true;
        }

        // Live validation
        nameEl.addEventListener('input', validateName);
        emailEl.addEventListener('input', validateEmail);
        messageEl.addEventListener('input', validateMessage);

        form.addEventListener('submit', function (e) {
          const ok =
            validateName() &
            validateEmail() &
            validateMessage(); // bitwise to run all; result coerces to 0/1
          if (!ok) e.preventDefault();
        });
      })();
    </script>
  </body>
</html>
