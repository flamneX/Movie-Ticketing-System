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
                <h1> Update Account</h1>
                <form id="signinForm" method="PUT">
                    <label for="userName">User Name:</label>
                    <input id="userName" name="userName" type="text" required><br>
                    <p id="userNameError"></p>
                    <label for="userEmail">Email:</label>
                    <input id="userEmail" name="userEmail" type="email" required><br>
                    <p id="userEmailError"></p>
                    <label for="userPhoenNo">Phone No.:</label>
                    <input id="userPhoneNo" name="userPhoneNo" type="text" required><br>
                    <p id="userPhoneNo"></p>
                    <input type="submit" value="Update Details">
                </form>
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

            function updateDetails() {
                
            }
        </script>
    </body>
</html>