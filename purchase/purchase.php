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
        $userID = htmlspecialchars($_POST["userID"]);
        $totalPrice = htmlspecialchars($_POST["ticketAmount"] * 16.5);
        $movieID = htmlspecialchars($_POST["movieID"]);

        makeTransaction($conn, $userID, $totalPrice, $movieID);
    }

    function makeTransaction($conn, $userID , $totalPrice, $movieID) {
        $stmt = mysqli_prepare($conn, 'INSERT INTO transactions (userID, movieID, totalPrice) VALUES (?, ?, ?)');
        mysqli_stmt_bind_param($stmt, 'isd', $userID, $movieID, $totalPrice);
        
        if (mysqli_stmt_execute($stmt)) {
            $transactionID = mysqli_insert_id($conn);

            $ticketAmount = $_POST["ticketAmount"];

            $ticketStmt = mysqli_prepare($conn, 'INSERT INTO ticket (userID, transactionID) VALUES (?, ?)');
            for ($i = 0; $i < $ticketAmount; $i++) {
                mysqli_stmt_bind_param($ticketStmt, 'ii', $userID, $transactionID);
                mysqli_stmt_execute($ticketStmt);
            }
            mysqli_stmt_close($ticketStmt);

            header("Location: gateway.php");
            exit;
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
?>