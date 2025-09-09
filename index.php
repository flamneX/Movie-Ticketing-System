<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <div class="headContainer">
            <?php
                include("include/header.php");
                include("include/navigation.php");
            ?>
        </div>

        <main>
            <div class="banner-container" id="banner"></div>
            <div class="banner-indicators" id="indicators"></div>
            <script src="index.js"></script>
             <h1>Movie Showtimes</h1>
        </main>

        <?php
            include("include/footer.php");
        ?>
    </body>
</html>