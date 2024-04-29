<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("connect-db.php");    // include("connect-db.php");
require("request-db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Sidebar content like navigation goes here -->
        </aside>

        <!-- Main content -->
        <div class="main-content">
            <!-- Top bar with website name and log out -->
            <header class="top-bar">
                <h1>Welcome to your profile!</h1>
                <button class="log-out">Log Out</button>
            </header>
            
            <!-- Profile details section -->
            <section class="profile-details">
                <!-- User image -->
                <div class="user-profile-pic">
                    <img src="path-to-your-profile-pic.jpg" alt="Profile Picture">
                </div>
                
                <!-- Stats like movies watched and reviews written -->
                <div class="user-stats">
                    <div class="stats-movies-watched">
                        <p>123 Movies Watched</p>
                    </div>
                    <div class="stats-reviews-written">
                        <p>45 Reviews Written</p>
                    </div>
                </div>

                <!-- Reviews Section -->
                <div class="reviews-section">
                    <h3>Your Reviews</h3>
                    <!-- Replace with dynamic content -->
                    <div class="review">
                        <p>Review 1 - Lorem ipsum dolor sit amet...</p>
                    </div>
                    <div class="review">
                        <p>Review 2 - Lorem ipsum dolor sit amet...</p>
                    </div>
                    <!-- More reviews -->
                </div>
            </section>
        </div>
    </div>

    <script src="profile.js"></script>
</body>
</html>