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
    <title>Watchlists</title>
    <!-- <style>
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
    </style> -->
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

    <h1>Watchlists</h1>
    <form action="watchlist.php" method="post">
        <label for="userID">Enter your userID:</label>
        <input type="text" id="userID" name="userID" value="<?php echo isset($userID) ? htmlspecialchars($userID) : ''; ?>">
        <button type="submit">Submit</button>
    </form>

    <div class="sidebar">
        <a href="index.php" class="left-menu-icon">
            <i class="fas fa-home"></i>
        </a>
        <a href="profile.php" class="profile-link">
            <i class="left-menu-icon fas fa-users"></i>
        </a>
        <a href="watchlist.php" class="left-menu-icon fas fa-bookmark"></a>
    </div>

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
    
    <script src="js/app.js"></script>
</body>
</html>
