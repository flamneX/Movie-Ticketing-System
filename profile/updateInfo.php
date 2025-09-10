<!DOCTYPE html>
<html>
    <head>
        <title>Update Info</title>
        <link rel="stylesheet" href="../styles.css"/>
    </head>
    <body onload="fetchUser(); setUpdateForm()">
        <!--Header-->
        <?php
            include("../include/header.php");
        ?>

        <main>
            <div class="container">
                <div class="profileContainer">
                    <h1> Update Account</h1>
                    <form id="updateForm">
                        <input name="operationType" value="updateInfo" hidden>
                        <input id="userID" name="userID" hidden>
                        <div class="inputField">
                            <input id="userName" name="userName" type="text" placeholder="UserName" maxlength="50" required>
                            <label for="userName">UserName : </label>
                        </div>
                        <div class="inputField">
                            <input id="userEmail" name="userEmail" type="email" placeholder="E-mail" maxlength="50" required>
                            <label for="userEmail">E-mail :</label>
                        </div>
                        <div class="inputField">
                            <input id="userPhoneNo" name="userPhoneNo" type="text" placeholder="Phone No. (e.g. 012-3456789)" maxlength="50" pattern="01[0-9]{1}-[0-9]{7,8}" required>
                            <label for="userPhoneNo">Phone No. :</label>
                        </div>
                        <div class="errorField">
                            <errorText id="errorText"></errorText>
                        </div>
                        <div id="buttonRow">
                            <a><button>Confirm</button></a>
                            <a><button type="button" id="logout" onclick="back()">CANCEL</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php
            include("../include/footer.php");
        ?>
        <script src="script.js"></script>
    </body>
</html>