<?php 
$mysqli = new mysqli("mysql.eecs.ku.edu", "ggollier", "uo7xaaxi", "ggollier");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

printf("<ul>");
foreach($_POST['delete'] as $post) {
    $result = $mysqli->query("DELETE FROM Posts WHERE post_id = ". $post . ";");
    if ($result) {
        printf("<li>Successfully deleted post: %s</li>", $post);
    } else {
        printf("<li>Failed to delete: %s</li>", $post);
    }
}
printf("</ul>");

$mysqli->close();
?>