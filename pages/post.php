<?php 

// 1. get the id from the URL
$id = $_GET["id"];
// 2. connect to Database
$database = connectToDB();
// 3. load the Post data
$sql = "SELECT posts.id, posts.title, posts.content, posts.user_id, users.name 
        FROM posts 
        JOIN users 
        ON posts.user_id = users.id 
        where posts.id = :id";  
$query = $database->prepare($sql);
$query->execute([
  'id' => $id
]);
$post = $query->fetch();


require "parts/header.php"; ?>
<div class="container mx-auto my-5" style="max-width: 500px;">
  <!-- 4. echo the post data -->
  <h1 class="h1 mb-2 text-center"><?= $post['title']; ?></h1>
  <h4 class="mb-4 text-center">By <?= $post['name']; ?></h4>

  <?= $post['id']; ?>

  <p><?= nl2br( $post['content'] ); ?></p>

  <div class="text-center mt-3">
    <a href="/" class="btn btn-link btn-sm"
      ><i class="bi bi-arrow-left"></i> Back</a
    >
  </div>
</div>
<?php require 'parts/footer.php';