<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$feedback = $_POST['feedback'] ?? '';
$suggestions = $_POST['suggestions'] ?? '';


$userResult = $conn->query("SELECT id FROM loginnn WHERE email = '$email'");
$userRow = $userResult->fetch_assoc();
$user_id = $userRow['id'] ?? null;



$insertSql = "INSERT INTO user_table (fname, lname, email, book_id, dod, tod, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);



if ($insertStmt) {
    $insertStmt->bind_param("ssssssi", $name, $email, $phone, $feedback, $suggestions, $user_id);
    $insertStmt->execute();
    $insertStmt->close();

    header('Location: explore.html');
} else {
    $response = ['message' => 'Error inserting user data: ' . $conn->error];
}






$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
