<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
        <link rel="stylesheet" href="../styles.css"/>
    </head>
    <body>
        <div class="headContainer">
            <?php
                include("../include/header.php");
                include("../include/navigation.php");
            ?>
        </div>

        <main>
            <h1>My Wishlist</h1>
            <div id="myWishlistContainer"></div>
        </main>
        <script src="script.js"></script>
          <script>
            window.onload = () => {
                displayWishlist();
            }
        </script>
        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>