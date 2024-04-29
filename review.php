<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("connect-db.php");    // include("connect-db.php");
require("request-db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_POST["userID"];
    $reviews = getReviewbyUserID($userID);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Reviews</title>
</head>
<body>
    <h2>Enter User ID to View Reviews</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="userID">User ID:</label>
        <input type="text" id="userID" name="userID" value="<?php echo $userID; ?>" required>
        <button type="submit">View Reviews</button>
    </form>

    <?php if(isset($reviews) && !empty($reviews)): ?>
        <h3>User Reviews</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?php echo $review['title']; ?></td>
                        <td><?php echo $review['rating']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif(isset($reviews)): ?>
        <p>No reviews found for the specified user.</p>
    <?php endif; ?>
</body>
</html>