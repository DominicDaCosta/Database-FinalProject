<?php
require("connect-db.php"); 
require("request-db.php"); 

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $movieID = $_GET['id'];

    $movie = getMovieDetailsByID($movieID);

    $reviews = getReviewbyMovieID($movieID);
} else {
    header("Location: search.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Reviews</title>
</head>
<body>
    <h1>Reviews for <?php echo $movie['title']; ?></h1>

    <p>Release Year: <?php echo $movie['releaseYear']; ?></p>
    <p>Runtime: <?php echo $movie['runtime']; ?> min</p>
    <p>Average Rating: <?php echo $movie['avgRating']; ?></p>

    <hr>

    <h2>User Reviews:</h2>
    <?php if (!empty($reviews)): ?>
        <ul>
            <?php foreach ($reviews as $review): ?>
                <li>
                    <strong>User Rating:</strong> <?php echo $review['rating']; ?><br>
                    <strong>Review:</strong> <?php echo $review['content']; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No reviews available for this movie.</p>
    <?php endif; ?>

</body>
</html>
