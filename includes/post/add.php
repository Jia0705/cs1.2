<?php

// 1. Connect to the Database
$database = connectToDB();

// 2. Get the form data using $_POST
$title = $_POST['title'];
$content = $_POST['content'];
$user_id = $_SESSION['user_id']; 

// 3. Error Checking
if (empty($title) || empty($content)) {
    setError("Title and content are required.", '/manage-posts-add');
} else {
    // 4. Insert the new post into the "posts" table
    $sql = "INSERT INTO posts (title, content, user_id, status) VALUES (:title, :content, :user_id, 'pending')";
    
    $query = $database->prepare($sql);
    $query->execute([
        'title' => $title,
        'content' => $content,
        'user_id' => $user_id
    ]);

    // 5. Redirect back to the Manage Posts page with a success message
    header("Location: /manage-posts");
    exit;
}
