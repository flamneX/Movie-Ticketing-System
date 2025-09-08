<?php
// Include database connection
include("../include/db.php");

session_start();
$userID = $_SESSION['userID']; // Assuming the user is logged in and their ID is stored in session

$sql = "SELECT m.movieID, m.title, m.year, m.price FROM wishlist w 
        JOIN movies m ON w.movieID = m.movieID 
        WHERE w.userID = $userID";

$result = $conn->query($sql);
$wishlist = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $wishlist[] = $row; // Add each movie to the wishlist array
    }
}

echo json_encode($wishlist); // Return wishlist as JSON
?>
