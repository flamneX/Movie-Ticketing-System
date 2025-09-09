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
        $data = json_decode(file_get_contents('php://input'), true);

        switch ($data['type']) {
            case 'fetchByID':
                $userID = $data["userID"] ?? 0;
                getUserByID($conn, $userID);
                break;
            case 'addUser':
                break;
        }
    }

    function getUserByID($conn, $userID) {
        $sql = "SELECT * FROM user WHERE userID = '". $userID ."'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            echo json_encode(mysqli_fetch_assoc($result));
        } 
        else {
            echo json_encode("YES");
        }
    }

    function updateUser($conn, $userID, $data) {
    }
?>