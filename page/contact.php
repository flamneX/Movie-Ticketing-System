<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us - Absolute Cinema</title>
        <link rel="stylesheet" href="../style/styles.css"/>
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
                <form action="process_contact.php" method="POST">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Send Message</button>
                </form>
            </section>

            <!-- Social Media Links Section -->
            <section class="social-media">
                <h2>Follow Us</h2>
                <p>Stay connected with us through our social media:</p>
                <ul>
                    <li><a href="https://facebook.com/AbsoluteCinema" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com/AbsoluteCinema" target="_blank">Twitter</a></li>
                    <li><a href="https://instagram.com/AbsoluteCinema" target="_blank">Instagram</a></li>
                </ul>
            </section>
        </main>

        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>
