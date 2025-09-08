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
            <h1>Movie Details</h1>
            <div id="title"></div>
            <div style="display: flex;">
                <div style="flex: 1; padding-right: 3%">
                    <div id="movieInfo"></div>
                    <div style="display: flex; justify-content: center">
                        <button id="buyButton"></button>
                    </div>
                </div>
                <div id="moviePlot" style="flex: 3;">
                    <h3><i class="fa-solid fa-video" style="padding-right: 1%;"></i>Preview</h3>
                    <div id="vid" class="foreground" style="background-color: none; display: flex; justify-content: center;"></div>
                    <h3><i class="fa-solid fa-circle-info" style="padding-right: 1%;"></i>Synopsis</h3>
                    <div id="syn" class="foreground"></div>
                    <h3><i class="fa-solid fa-star" style="padding-right: 1%"></i>Cast</h3>
                    <div id="cas" class="foreground"></div>
                    <h3><i class="fa-solid fa-film" style="padding-right: 1%;"></i>Directors</h3>
                    <div id="dir" class="foreground"></div>
                    <h3><i class="fa-solid fa-pen-fancy" style="padding-right: 1%;"></i>Writers</h3>
                    <div id="wri" class="foreground"></div>
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

                const buyButton = document.getElementById("buyButton");

                if (loggedUser == null) {
                    buyButton.innerHTML =  `
                        <a href="/Movie-Ticketing-System/signin/index.php?id=${imdbId}" style="color: white; text-decoration: none;">LOG IN TO BUY</a>
                    `;
                } else {
                    buyButton.innerHTML =  `
                        <a href="/Movie-Ticketing-System/purchase/?id=${imdbId}" style="color: white; text-decoration: none;">BUY TICKET</a>
                    `;
                }
            }
        </script>
    </body>
</html>