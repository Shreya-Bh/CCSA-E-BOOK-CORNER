<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Content-Type: application/json; charset=utf-8");

$mysqli = new mysqli('localhost', 'root', '', 'shreya');

if ($mysqli->connect_error) {
    die('Error(' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
}

$fname = isset($_POST['fname']) ? $mysqli->real_escape_string($_POST['fname']) : '';
$lname = isset($_POST['lname']) ? $mysqli->real_escape_string($_POST['lname']) : '';
$email = isset($_POST['email']) ? $mysqli->real_escape_string($_POST['email']) : '';
$number = isset($_POST['number']) ? $mysqli->real_escape_string($_POST['number']) : '';
$dob = isset($_POST['dob']) ? $mysqli->real_escape_string($_POST['dob']) : '';

if (!empty($email)) {
    $check_query = "SELECT id FROM loginnn WHERE email = '$email'";
    $check_result = $mysqli->query($check_query);

    if ($check_result->num_rows > 0) {
        $update_query = "UPDATE loginnn SET fname = '$fname', lname = '$lname', number = '$number', dob = '$dob' WHERE email = '$email'";
        
        if ($mysqli->query($update_query) === TRUE) {
            header('Location: explore.html');
            exit;
        } else {
            echo "Error updating record: " . $update_query . "<br>" . $mysqli->error;
        }
    } else {
        $insert_query = "INSERT INTO loginnn(email, fname, lname, number, dob) VALUES ('$email', '$fname', '$lname', '$number', '$dob')";
        
        if ($mysqli->query($insert_query) === TRUE) {
            header('Location: explore.html');
            exit;
        } else {
            echo "Error inserting record: " . $insert_query . "<br>" . $mysqli->error;
        }
    }
} else {
    echo "Email is required.";
}

$mysqli->close();
?>
