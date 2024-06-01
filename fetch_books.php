<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shreya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admin_table";
$result = $conn->query($sql);

$books = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $books[] = [
            'book_id' => $row['book_id'],
            'bookname' => $row['bookname'],
        ];
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($books);
?>
