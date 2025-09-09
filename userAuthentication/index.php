<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles.css"/>
        <title>Login Form</title>
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
                <div class="loginContainer" id="loginContainer">
                    <div class="form-loginContainer sign-up">
                        <form id="signupForm">
                            <h1>Register</h1>
                            <span>Fill Out The Following Info For Registeration</span>
                            <input name="operationType" value="signup" hidden>
                            <input name="userName" type="text" placeholder="User Name" required>
                            <input name="userPassword" type="password" placeholder="Password" required>
                            <input name="userEmail" type="email" placeholder="E-mail" required>
                            <input name="userPhoneNo" type="text" placeholder="Phone No." required>
                            <error id="signupErrorText"></error>
                            <button>SIGN UP</button>
                        </form>
                    </div>
                    <div class="form-loginContainer sign-in">
                        <form id="signinForm">
                            <h1>Login</h1>
                            <span>Login With Your User Name & Password</span>
                            <input name="operationType" value="signin" hidden>
                            <input name="userName" type="text" placeholder="User Name" required>
                            <input name="userPassword" type="password" placeholder="Password" required>
                            <error id="signinErrorText"></error>
                            <button>SIGN IN</button>
                        </form>
                    </div>
                    <div class="toggle-loginContainer">
                        <div class="toggle">
                            <div class="toggle-panel toggle-left">
                                <h1>Welcome Back!</h1>
                                <p>Log in to use all features</p>
                                <button class="hidden" id="login">Sign In</button>
                            </div>
                            <div class="toggle-panel toggle-right">
                                <h1>Hello!</h1>
                                <p>New User? <br> Register to use all features</p>
                                <button class="hidden" id="register">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="script.js"></script>
        <?php
            include("../include/footer.php");
        ?>
    </body>
</html>