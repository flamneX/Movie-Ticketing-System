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
            <div style="flex-direction: row; justify-content: center;">
                <a style="margin:0"href="updateAccount.php"><button> UPDATE ACCOUNT</button></a>
                <button onclick="logout()"> LOG OUT</button>
            </div>
        </main>

        <?php
            include("../include/footer.php");
        ?>
        <script>
            fetch('databaseFunction.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    type: "fetchByID",
                    userID: localStorage.getItem("loggedUserID"),
                }),
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('userName').textContent = data.userName ?? "undefined";
                document.getElementById("userEmail").textContent = data.userEmail ?? "undefined";
                document.getElementById("userPhoneNo").textContent = data.userPhoneNo ?? "undefined";
            })
            .catch(error => {
                console.error('Error during action 1:', error);
            });

            function logout() {
                localStorage.removeItem("loggedUserID");
                window.location.href = "../";
            }
        </script>
    </body>
</html>