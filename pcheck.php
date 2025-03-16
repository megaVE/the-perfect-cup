<?php
session_start();

$email = $_POST("email");
$password = $_POST("password");

$mysqli = new mysqli('localhost', 'perfectcup_user', 'senha_segura', 'perfectcup');

if($mysqli->connect_error) {
    die('Error: (' . $mysqli->connection_errno . ') ' . $mysqli->connection_error);
}

$query = "SELECT * FROM members WHERE email='$email'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row >= 1) {
    if (password_verify($password, $row['password'])) {
        $_SESSION['login'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        echo 'true';
    } else {
        echo 'false';
    }
} else {
    echo 'false';
}



?>