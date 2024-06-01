<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shreya";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$fname = $_POST['fname'] ?? '';
$lname = $_POST['lname'] ?? '';
$email = $_POST['email'] ?? '';
$selectedBookId = $_POST['bookSelect'] ?? null;
$dod = $_POST['dod'] ?? '';
$tod = $_POST['tod'] ?? '';


$userResult = $conn->query("SELECT id FROM loginnn WHERE email = '$email'");
$userRow = $userResult->fetch_assoc();
$user_id = $userRow['id'] ?? null;



$insertSql = "INSERT INTO user_table (fname, lname, email, book_id, dod, tod, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);



if ($insertStmt) {
    $insertStmt->bind_param("ssssssi", $fname, $lname, $email, $selectedBookId, $dod, $tod, $user_id);
    $insertStmt->execute();
    $insertStmt->close();

    header('Location: bca.html');
} else {
    $response = ['message' => 'Error inserting user data: ' . $conn->error];
}






$conn->close();

header('Content-Type: application/json');
echo json_encode($response);
?>
