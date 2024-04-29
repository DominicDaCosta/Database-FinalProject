<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("connect-db.php");    // include("connect-db.php");
require("request-db.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $movieID = $_GET['id'];
    
    $movieDetails = getMovieDetailsByID($movieID);
    
    if (!empty($movieDetails)) {
        $movie = $movieDetails[0];
        
        echo "<h1>" . $movie['title'] . "</h1>";
        echo "<p>Release Year: " . $movie['releaseYear'] . "</p>";
        echo "<p>Runtime: " . $movie['runtime'] . "</p>";
        echo "<p>Average Rating: " . $movie['avgRating'] . "</p>";
        
        $crewMembers = getCrewbyMovieID($movieID);
        if (!empty($crewMembers)) {
            echo "<h2>Crew Members:</h2>";
            echo "<ul>";
            foreach ($crewMembers as $crew) {
                echo "<li>" . $crew['cname'] . " - ";
                $jobs = getJobsbyCrewID($crew['crewID'], $movieID);
                echo implode(", ", array_column($jobs, 'jobTitle'));
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No crew members found for this movie.</p>";
        }

        echo "<a href='search.php'>Back to Search</a>";
    } else {
        echo "<p>Movie not found.</p>";
    }
} else {
    echo "<p>Movie ID not provided.</p>";
}
?>