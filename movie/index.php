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
            <h1>Movies</h1>
            <div id="movieContainer"></div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
        <script>
            window.onload = displayMovie("movieContainer");
        </script>
    </body>
</html>