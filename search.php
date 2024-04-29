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
    <!-- Ensure the path to the CSS file is correct -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Watchlist</title>
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">review</h1>
            </div>

                <a href="watchlist.php">
                    <button class="search-button"><i class="fas fa-search"></i></button>
                </a>

            <div class="menu-container">
                <ul class="menu-list">
                    <li class="menu-list-item active">Home</li>
                    <li class="menu-list-item">Rate</li>

                </ul>
            </div>
            <div class="profile-container">
                <img class="profile-picture" src="img/profile.jpg" alt="">
                <div class="profile-text-container">
                    <span class="profile-text">Profile</span>
                    <i class="fas fa-caret-down"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <a href="index.php" class="left-menu-icon">
            <i class="fas fa-home"></i>
        </a>
        <a href="profile.php" class="profile-link">
            <i class="left-menu-icon fas fa-users"></i>
        </a>
        <a href="watchlist.php" class="left-menu-icon fas fa-bookmark"></a>
    </div>
    
    <script src="js/app.js"></script>

    <div class="search-result-container">
        <h1>Movie Search</h1>
        <form action="search.php" method="GET">
        <label for="searchTerm">Search by Title:</label>
        <input type="text" id="searchTerm" name="searchTerm" placeholder="Enter movie title" value="<?php echo isset($_GET['searchTerm']) ? htmlspecialchars($_GET['searchTerm']) : ''; ?>">
        
        <label for="ratingFilter">Filter by Rating:</label>
        <select id="ratingFilter" name="ratingFilter">
            <option value="">Select Rating</option>
            <?php
            $ratings = array(1, 2, 3, 4, 5);
            foreach ($ratings as $rating) {
                $selected = isset($_GET['ratingFilter']) && $_GET['ratingFilter'] == $rating ? 'selected' : '';
                echo "<option value='$rating' $selected>$rating</option>";
            }
            ?>
        </select>
        
        <button type="submit">Search</button>
    </form>
    </div>
</body>
</html>

<?php

$warningMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
        $searchTerm = $_GET['searchTerm'];
        
        if (isset($_GET['ratingFilter']) && !empty($_GET['ratingFilter'])) {
            $ratingFilter = $_GET['ratingFilter'];
            
            $movies = getMoviesBySearchAndRating($searchTerm, $ratingFilter);
        } else {
            $movies = getMoviebyTitle($searchTerm);
        }

        if (!empty($movies)) {
            echo "<div class='search-result-container'>";
            echo "<h2>Search Results:</h2>";
            echo "<div class='table-responsive'>";
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Title</th><th>Release Year</th><th>Runtime</th><th>Average Rating</th></tr></thead>";
            echo "<tbody>";
            foreach ($movies as $movie) {
                echo "<tr>";
                echo "<td>" . $movie['title'] . "</td>";
                echo "<td>" . $movie['releaseYear'] . "</td>";
                echo "<td>" . $movie['runtime'] . " min</td>";
                echo "<td>" . $movie['avgRating'] . "</td>";
                echo "<td><a href='movie.php?id=" . $movie['movieID'] . "' class='btn btn-primary'>View Details</a></td>";
                echo "</tr>";            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>No movies found.</p>";
        }
    } else {
        $warningMessage = "Please enter a search term.";
    }
}
?>

<?php if (!empty($warningMessage)): ?>
<div class='search-result-container'>
    <div class="alert alert-warning" role="alert">
        <?php echo $warningMessage; ?>
    </div>
</div>
<?php endif; ?>
