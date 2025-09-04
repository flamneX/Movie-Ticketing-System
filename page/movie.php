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
            This is the Movies Page
            <div id="movies"></div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
        <script>
            displayMovie("movies", "tt2250912")
        </script>
    </body>
</html>