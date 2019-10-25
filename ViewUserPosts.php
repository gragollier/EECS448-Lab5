<?php

$author_id = $_POST['user_id'];

$mysqli = new mysqli("mysql.eecs.ku.edu", "ggollier", "uo7xaaxi", "ggollier");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// This is literally asking for SQL injection... I'm sorry
$result = $mysqli->query("SELECT * FROM Posts WHERE author_id = '" . $author_id . "'");

printf("<h1>User Posts</h1>");
printf("<hr />");


if ($result) {
    printf("<ul>");
    while ($row = $result->fetch_assoc()) {
        printf ("<li>%s </li>\n", $row["content"]);
    }
    printf("</ul>");
} else {
    echo "Error getting user's posts";
}

$result->free();
$mysqli->close();

?>