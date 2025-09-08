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
            <button onclick="logout()"> LOG OUT</button>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script>
            function logout() {
                localStorage.removeItem("loggedUserID");
                window.location.href = "../";
            }
        </script>
    </body>
</html>