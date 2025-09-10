<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
        <link rel="stylesheet" href="styles.css"/>
    </head>
    <body>
        <!--Header-->
        <?php
            include("include/header.php");
        ?>

        <!--Body-->
        <main>
            <h1>Movie Showtimes</h1>
            <div class="Mmovie-Rrow-wrapper">
                <button class="arrow left" onclick="scrollMovies(-1)">&#10094;</button>
                <div class="Mmovie-Rrow" id="movieContainer"></div>
                 <!-- JS will populate movie cards here -->
                <button class="arrow right" onclick="scrollMovies(1)">&#10095;</button>
            </div>
            <div id="vid"></div>
        </main>

        <?php
            include("include/footer.php");
        ?>
        <script src="script.js"></script>
        <script>
            window.onload = displayMovie("movieContainer");
        </script>
        <script>
            window.onload = () => {
                const params = new URLSearchParams(window.location.search);
                const imdbId = params.get("id");
            }
        </script>
    </body>
</html>