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
            ?>
        </div>
            <main>
                <h1> New Account</h1>
                <form id="signinForm">
                    <label for="userName">User Name:</label>
                    <input id="userName" name="userName" type="text"><br>
                    <p id="userNameError"></p>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password"><br>
                    <p id="passwordError"></p>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email"><br>
                    <p id="emailError"></p>
                    <label for="phoenNo">Phone No.:</label>
                    <input id="phoneNo" name="phoneNo" type="text"><br>
                    <p id="phoneNo"></p>
                    <input type="submit" value="submit">
                </form>
            </main>
        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js">
            window.onload = fetchUserUpdate();
        </script>
    </body>
</html>