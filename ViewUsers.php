<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "ggollier", "uo7xaaxi", "ggollier");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// This is literally asking for SQL injection... I'm sorry
$result = $mysqli->query("SELECT user_id FROM Users");

if ($result) {
    printf("<ul>");
    while ($row = $result->fetch_assoc()) {
        printf ("<li>%s </li>\n", $row["user_id"]);
    }
    printf("</ul>");
} else {
    echo "Error getting users";
}

$result->free();
$mysqli->close();

?>