<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- Assuming you have a common style.css -->
    <link rel="stylesheet" href="../css/navbar.css"> <!-- Additional styles for navbar -->
    <link rel="stylesheet" href="../css/sidebar.css"> <!-- Additional styles for sidebar -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Watchlists</title>
    <style>
        /* Add your additional styles here or in external CSS files */
        body {
            font-family: 'Roboto', sans-serif;
        }
        h1, h2 {
            color: #333;
            text-align: center;
        }
        .content-container {
            margin: 0 auto;
            width: 90%;
            max-width: 800px;
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 8px 15px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            font-weight: 500;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        form {
            display: inline;
        }
        .btn {
            padding: 5px 10px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #e74c3c;
            color: white;
        }
        .btn-primary {
            background-color: #3498db;
            color: white;
        }
        .btn:hover {
            opacity: 0.9;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Include padding in the element's total width and height */
        }
        input[type="submit"] {
            width: auto;
            background-color: #5cb85c;
            color: white;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <!-- Including the navbar from your index page -->
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
    
    <!-- Including the sidebar from your index page -->
    <div class="sidebar">
        <a href="index.php" class="left-menu-icon">
            <i class="fas fa-home"></i>
        </a>
        <a href="profile.php" class="profile-link">
            <i class="left-menu-icon fas fa-users"></i>
        </a>
        <a href="watchlist.php" class="left-menu-icon fas fa-bookmark"></a>
    </div>
    
    <!-- Page Content -->
    <div class="content-container">
        <h1>Watchlists</h1>
    </div>
    
    <script src="js/app.js"></script>
</body>
</html>
