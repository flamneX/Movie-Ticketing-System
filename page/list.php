<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
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
    <section class="item-listing">
      <!-- Movie 1 -->
      <div class="item-card">
        <img src="path/to/your/image1.jpg" alt="Puella Magi Madoka Magica">
        <h3>Puella Magi Madoka Magica</h3>
        <p><strong>Year:</strong> 2011</p>
        <p><strong>Actors:</strong> Aoi Yūki, Chiwa Saitō</p>
        <a href="item-details.html" class="btn">View Details</a>
      </div>

      <!-- Movie 2 -->
      <div class="item-card">
        <img src="path/to/your/image2.jpg" alt="Violet Evergarden">
        <h3>Violet Evergarden</h3>
        <p><strong>Year:</strong> 2018</p>
        <p><strong>Actors:</strong> Yui Ishikawa, Erika Harlacher</p>
        <a href="item-details.html" class="btn">View Details</a>
      </div>
    </section>
  </main>
        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>