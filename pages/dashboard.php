<?php 

// 1. Check if the user is logged in.
// Redirect to the login page if not logged in.
checkIfUserIsNotLoggedIn();

require "parts/header.php"; 
?>
<div class="container mx-auto my-5" style="max-width: 800px;">
    <h1 class="h1 mb-4 text-center">Dashboard</h1>
    
    <!-- Success message -->
    <?php require "parts/success_message.php"; ?>
    
    <div class="row">
        <!-- Manage Posts Section (Visible to all logged-in users) -->
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <div class="mb-1">
                            <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                        </div>
                        Manage Posts
                    </h5>
                    <div class="text-center mt-3">
                        <a href="/manage-posts" class="btn btn-primary btn-sm">Access</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Manage Users Section (Only visible to admin users) -->
        <?php if ( isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin' ) : ?>
        <div class="col">
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title text-center">
                        <div class="mb-1">
                            <i class="bi bi-people" style="font-size: 3rem;"></i>
                        </div>
                        Manage Users
                    </h5>
                    <div class="text-center mt-3">
                        <a href="/manage-users" class="btn btn-primary btn-sm">Access</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Back button -->
    <div class="mt-4 text-center">
        <a href="/" class="btn btn-link btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
    </div>
</div>

<?php require 'parts/footer.php'; ?>
