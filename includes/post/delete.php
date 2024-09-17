<?php

// 1. connect to Database
$database = connectToDB();

// 2. get the post_id from the form or query parameters
$post_id = $_POST["id"];

// 3. delete the post
// 3.1 - Prepare SQL query to delete the post based on its ID
$sql = "DELETE FROM posts WHERE id = :id";

// 3.2 - Prepare the SQL query using the database connection
$query = $database->prepare($sql);

// 3.3 - Execute the query, passing the post ID as a parameter
$query->execute([
    'id' => $post_id
]);

// 4. Redirect to the manage posts page
header("Location: /manage-posts");
exit;

