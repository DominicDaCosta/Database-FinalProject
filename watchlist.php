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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/watchlist.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Movie Watchlist</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">review</h1>
            </div>

            <div class="search-container">
                <input type="text" placeholder="Search movies..." class="search-input">
                <button class="search-button"><i class="fas fa-search"></i></button>
            </div>

            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active"></li>
                    <li class="menu-list-item"></li>
                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="img/profile.jpg" alt="">
                <div class="profile-text-container">
                    <span class="profile-text"></span>
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <a href="index.php" class="left-menu-icon fas fa-home"></a>
        <a href="profile.php" class="left-menu-icon fas fa-users"></a>
        <a href="watchlist.php" class="left-menu-icon fas fa-bookmark"></a>
    </div>
    <div class="content-container">
        <h1>My Watchlist</h1>
        <!-- Example watchlist item -->
        <div class="watchlist-item">
            <img src="img/movie_placeholder.png" alt="Movie Poster" class="movie-poster">
            <div class="movie-info">
                <h3>Movie 1</h3>
                <p>Place Holder.</p>
                <button class="remove-btn">Remove</button>
            </div>
        </div>
        <div class="watchlist-item">
            <img src="img/movie_placeholder.png" alt="Movie Poster" class="movie-poster">
            <div class="movie-info">
                <h3>Movie 2</h3>
                <p>Place Holder.</p>
                <button class="remove-btn">Remove</button>
            </div>
        </div>
        <!-- Repeat for other items as needed -->
    </div>
    <script src="app.js"></script>
</body>
</html>