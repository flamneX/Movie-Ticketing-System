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
            <img id="userImage" src="">
            <p id="userName">a</p>
            <p id="userEmail">a</p>
            <p id="userPhoneNo">a</p>
            <button onclick="logout()"> LOG OUT</button>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
    </body>
</html>