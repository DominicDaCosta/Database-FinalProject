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
    <div class="container">
        <div class="content-container">
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/app.js"></script>
</body>
</html>
