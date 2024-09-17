<?php

// 1. connect to the database
$database = connectToDB();

// 2. get all the data from the form using $_POST
$title = $_POST['title'];
$content = $_POST['content'];
$id = $_POST['id']; 

// 3. do error checking - make sure all the fields are not empty
if (empty($title) || empty($content)) {
    setError("Please fill in all fields.", '/manage-posts-edit?id=' . $id);
    exit; 
}

// 4. update the post data

// 4.1 - Prepare the SQL query to update the post
$sql = "UPDATE posts SET title = :title, content = :content WHERE id = :id";

// 4.2 - Prepare the query using the database connection
$query = $database->prepare($sql);

// 4.3 - Execute the query, passing the form values as parameters
$query->execute([
    'title' => $title,
    'content' => $content,
    'id' => $id
]);

// 5. Redirect back to /manage-posts page
header("Location: /manage-posts");
exit;
