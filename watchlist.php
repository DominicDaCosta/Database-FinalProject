<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("connect-db.php"); 
require("request-db.php"); 

$watchlists = array(); 
$userID = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['userID'])) {
        $userID = $_POST['userID'];
        $watchlists = getWatchlistbyUserID($userID);
    } else {
        echo "Please enter your userID.";
    }
    if (!empty($_POST['deleteBtn'])) {
        deleteWatchlist($_POST['listID']);
        $watchlists = getWatchlistbyUserID($userID);
    }
    if (!empty($_POST['updateBtn'])) {
        $listID = $_POST['listID'];
        $ltitle = $_POST['ltitle'];
        $list_desc = $_POST['list_desc'];

        updateWatchlist($listID, $ltitle, $list_desc);
        $watchlists = getWatchlistbyUserID($userID);
    }
    if (isset($_POST['addBtn'])) {
        if (!empty($_POST['ltitle']) && !empty($_POST['list_desc']) && !empty($_POST['userID'])) {
            $ltitle = $_POST['ltitle'];
            $list_desc = $_POST['list_desc'];
            $userID = $_POST['userID'];
            addWatchlist($ltitle, $userID, $list_desc);
            $watchlists = getWatchlistbyUserID($userID);
        } else {
            echo "Please fill out all fields.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlists</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Watchlists</h1>
    <form action="watchlist.php" method="post">
        <label for="userID">Enter your userID:</label>
        <input type="text" id="userID" name="userID" value="<?php echo isset($userID) ? htmlspecialchars($userID) : ''; ?>">
        <button type="submit">Submit</button>
    </form>

    <?php if (!empty($watchlists)): ?>
        <h2>Your Watchlists:</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th><b>Delete?</b></th>
                    <th><b>Edit</b></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($watchlists as $watchlist): ?>
                    <tr>
                        <td><?php echo $watchlist['ltitle']; ?></td>
                        <td><?php echo $watchlist['list_desc']; ?></td>
                        <td>
                            <form action="watchlist.php" method="post"> 
                                <input type="submit" value="Delete" name="deleteBtn" 
                                    class="btn btn-danger" /> 
                                <input type="hidden" name="listID" 
                                    value="<?php echo $watchlist['listID']; ?>" /> 
                            </form>
                        </td>
                        <td>
                            <form action="watchlist.php" method="post"> 
                                <input type="text" name="ltitle" 
                                    value="<?php echo $watchlist['ltitle']; ?>" />
                                <input type="text" name="list_desc" 
                                    value="<?php echo $watchlist['list_desc']; ?>" />
                                <input type="hidden" name="listID" 
                                    value="<?php echo $watchlist['listID']; ?>" />
                                <input type="submit" value="Update" name="updateBtn" 
                                    class="btn btn-primary" /> 
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No watchlists found for this user.</p>
    <?php endif; ?>

    <h2>Add a New Watchlist:</h2>
    <form action="watchlist.php" method="post">
        <label for="userID">Your UserID:</label>
        <input type="text" id="userID" name="userID">
        <label for="ltitle">Title:</label>
        <input type="text" id="ltitle" name="ltitle">
        <label for="list_desc">Description:</label>
        <input type="text" id="list_desc" name="list_desc">
        <button type="submit" name="addBtn">Add Watchlist</button>
    </form>
</body>
</html>