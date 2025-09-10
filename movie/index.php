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
            <div style="display: flex">
                <div style="flex: 1">
                    <h1>Movies</h1>
                </div>
                <div style="flex: 1; text-align: right; padding-top: 4%;">
                    <button class="selectButton" style="width: 20%; font-size: medium" onclick="handleButtonClick(displayCurrentMovie)">Current</button>
                    <button class="selectButton" style="width: 20%; font-size: medium" onclick="handleButtonClick(displayUpcomingMovie)">Upcoming</button>
                </div>
            </div>
            <div id="movieContainer"></div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        
        <script src="script.js"></script>
        <script>
            window.onload = handleButtonClick(displayCurrentMovie);
        </script>
    </body>
</html>