<?php
$username = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "ggollier", "uo7xaaxi", "ggollier");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if ($username == '') {
    echo "Usernames cannot be blank";
    exit();
}

// This is literally asking for SQL injection... I'm sorry
$result = $mysqli->query("INSERT INTO Users (user_id) VALUES ('" . $username . "');");

if ($result) {
    echo "Successfully added user: " . $username;
} else {
    echo "Error adding user: " . $username . ". Make sure your username is unique!";
    echo "<br /> " . $result;
}

$result->free();
$mysqli->close();

?>