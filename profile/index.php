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
            <div class="container">
                <div class="profileContainer">
                    <h1>User Profile</h1>
                    <label for="userName">User Name: </label>
                    <input id="userName" disabled><br>
                    <label for="userEmail">E-mail   : </label>
                    <input id="userEmail" disabled><br>
                    <label for="userPhoneNo">Phone No.: </label>
                    <input id="userPhoneNo" disabled>   
                </div>
                <div id="buttonRow">
                    <a href="updateAccount.php"><button>UPDATE INFO</button></a>
                    <a href="updateAccount.php"><button>UPDATE PASSWORD</button></a>
                    <a onclick="logout()"><button>LOG OUT</button></a>
                </div>
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
                document.getElementById('userName').value = data.userName ?? "undefined";
                document.getElementById("userEmail").value = data.userEmail ?? "undefined";
                document.getElementById("userPhoneNo").value = data.userPhoneNo ?? "undefined";
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