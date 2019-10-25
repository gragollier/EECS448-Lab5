<?php
$username = $_POST["username"];
$text = $_POST["text"];

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
if ($text == '') {
    echo "Posts cannot be blank";
    exit();
}

// This is literally asking for SQL injection... I'm sorry
$result = $mysqli->query("INSERT INTO Posts (author_id, content) VALUES ('" . $username . "', '" . $text ."');");

if ($result) {
    echo "Successfully created post";
} else {
    echo "Error adding post. Make sure the user you entered exists and is valid";
}

$result->free();
$mysqli->close();

?>