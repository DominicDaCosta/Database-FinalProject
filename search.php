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
        // Populate rating filter options
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if the search term is set and not empty
    if (isset($_GET['searchTerm']) && !empty($_GET['searchTerm'])) {
        // Get the search term from the GET parameter
        $searchTerm = $_GET['searchTerm'];
        
        // Check if the rating filter is set and not empty
        if (isset($_GET['ratingFilter']) && !empty($_GET['ratingFilter'])) {
            // Get the rating filter value from the GET parameter
            $ratingFilter = $_GET['ratingFilter'];
            
            // Call the function to fetch movie data based on both search term and rating filter
            $movies = getMoviesBySearchAndRating($searchTerm, $ratingFilter);
        } else {
            // Call the function to fetch movie data based on search term only
            $movies = getMoviebyTitle($searchTerm);
        }

        // Display the search results
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
                echo "<td>" . $movie['runtime'] . "</td>";
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
        // Set the warning message if the search term is empty
        $warningMessage = "Please enter a search term.";
    }
}
?>

<!-- Display the warning message -->
<?php if (!empty($warningMessage)): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $warningMessage; ?>
    </div>
<?php endif; ?>
