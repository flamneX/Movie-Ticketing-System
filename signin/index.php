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
            <form id="signinForm">
                <label for="userName">User Name:</label>
                <input id="userName" name="userName" type="text"><br>
                <p id="userNameError"></p>
                <label for="password">Password:</label>
                <input id="password" name="password" type="password"><br>
                <p id="passwordError"></p>
                <input type="submit" value="submit">
            </form>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="validate.js"></script>
    </body>
</html>