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
            <div id="vid"></div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="../movie/script.js"></script>
        <script>
            window.onload = () => {
                const params = new URLSearchParams(window.location.search);
                const imdbId = params.get("id");
                displayPreview(imdbId);
            }
        </script>
    </body>
</html>