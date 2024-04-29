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
    <title>Movie Search</title>
</head>
<body>
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
        } else {
            echo "<p>No movies found.</p>";
        }
    } else {
        $warningMessage = "Please enter a search term.";
    }
}
?>

<?php if (!empty($warningMessage)): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $warningMessage; ?>
    </div>
<?php endif; ?>
