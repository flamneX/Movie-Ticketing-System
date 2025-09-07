<!DOCTYPE html>
<html>
    <head>
        <title>Absolute Cinema</title>
        <link rel="stylesheet" href="../styles.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <div class="headContainer">
            <?php
                include("../include/header.php");
                include("../include/navigation.php");
            ?>
        </div>

        <main>
            <h1>Details</h1>
            <div id="title"></div>
            <div style="display: flex;">
                <div style="flex: 1; padding-right: 3%">
                    <div id="movieInfo"></div>
                    <div style="display: flex; justify-content: center">
                        <button id="purchase"><a>BUY NOW<a></button>
                    </div>
                </div>
                <div id="moviePlot" style="flex: 1;">
                    <h3><i class="fa-solid fa-video" style="padding-right: 1%;"></i>Preview</h3>
                    <div id="vid"></div>
                    <h3><i class="fa-solid fa-circle-info" style="padding-right: 1%;"></i>Synopsis</h3>
                    <div id="syn"></div>
                    <h3><i class="fa-solid fa-star" style="padding-right: 1%"></i>Cast</h3>
                    <div id="cas"></div>
                    <h3><i class="fa-solid fa-film" style="padding-right: 1%;"></i>Directors</h3>
                    <div id="dir"></div>
                    <h3><i class="fa-solid fa-pen-fancy" style="padding-right: 1%;"></i>Writers</h3>
                    <div id="wri"></div>
                </div>
            </div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
        <script>
            window.onload = () => {
                const params = new URLSearchParams(window.location.search);
                const imdbId = params.get("id");
                displayPreview(imdbId);
                displayDetails(imdbId);
            }
        </script>
    </body>
</html>