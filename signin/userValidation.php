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
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $userName = htmlspecialchars($_POST["userName"] ?? '');
        $password = htmlspecialchars($_POST['password'] ?? '');
        validateUser($conn, $userName, $password);
    }

    function validateUser($conn, $userName , $password) {
        $sql = 'SELECT userID, userName, password FROM user';
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['userName'] == $userName && $password == $row['password']) {
                    echo json_encode($row['userID']);
                    return true;
                }
            }
        } 
        echo json_encode(null);
        return false;
    }
?>