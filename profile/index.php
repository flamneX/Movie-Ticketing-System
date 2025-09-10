<!DOCTYPE html>
<html>
    <head>
        <title>User Profile</title>
        <link rel="stylesheet" href="../styles.css"/>
    </head>
    <body onload="fetchUser()">
        <?php
            include("../include/header.php");
        ?>
        <main>
            <div class="container">
                <div class="profileContainer">
                    <h1>User Profile</h1>
                    <input id="userID" hidden>
                    <div class="inputField">
                        <input id="userName" disabled>
                        <label for="userName">UserName : </label>
                    </div>
                    <div class="inputField">
                        <input id="userEmail" disabled>
                        <label for="userEmail">E-mail : </label>
                    </div>
                    <div class="inputField">
                        <input id="userPhoneNo" disabled>
                        <label for="userPhoneNo">Phone No. : </label>
                    </div>
                    <div class="errorField">
                        <errorText id="errorText"></errorText>
                    </div>
                    <div id="buttonRow">
                        <a href="updateInfo.php"><button>UPDATE INFO</button></a>
                        <a href="updatePassword.php"><button>UPDATE PASSWORD</button></a>
                        <a onclick="logout()"><button id="logout">LOG OUT</button></a>
                    </div>
                </div>
            </div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
    </body>
</html>