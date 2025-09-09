<?php    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "movie_ticketing";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $operationType = $_POST["operationType"];

        if ($operationType === "signin") {
            $userName = htmlspecialchars($_POST["userName"] ?? '');
            $userPassword = htmlspecialchars($_POST['userPassword'] ?? '');
            validateUser($conn, $userName, $userPassword);
        }
        else if ($operationType === 'signup') {
            $userName = htmlspecialchars($_POST['userName'] ??'');
            $userPassword = htmlspecialchars($_POST['userPassword'] ??'');
            $userEmail = htmlspecialchars($_POST['userEmail'] ??'');
            $userPhoneNo = htmlspecialchars($_POST['userPhoneNo'] ??'');
            registerUser($conn, $userName, $userPassword, $userEmail, $userPhoneNo);
        }
    }

    function validateUser($conn, $userName , $userPassword) {
        $sql = 'SELECT userID, userName, userPassword FROM user';
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['userName'] == $userName && $userPassword == $row['userPassword']) {
                    echo json_encode($row['userID']);
                    return;
                }
            }
        } 
        echo json_encode(null);
    }

    function registerUser($conn, $userName , $userPassword, $userEmail, $userPhoneNo) {
        $stmt = mysqli_prepare($conn, "INSERT INTO user (userName, userPassword, userEmail, userPhoneNo) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssss", $userName, $userPassword, $userEmail, $userPhoneNo);
        mysqli_stmt_execute($stmt);
        
        // Retrieve User ID
        $last_id = mysqli_insert_id($conn);
        echo json_encode($last_id);

        mysqli_stmt_close($stmt);
    }
?>