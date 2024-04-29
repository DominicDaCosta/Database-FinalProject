<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require("connect-db.php");    // include("connect-db.php");
require("request-db.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <title>Movie Watchlist</title>
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
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-1.jpg');">
                <img class="featured-title" src="img/movie1.jpg" alt="">
                <p class="featured-desc">Place Holder.</p>
                <button class="featured-button">Rate</button>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">Popular Movies</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie2.jpg" alt="">
                            <span class="movie-list-item-title">Jumanji</span>`
                            <p class="movie-list-item-desc">Four teenagers are sucked into a magical video game, and the only way they can escape is to work together to finish the game.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie3.jpg" alt="">
                            <span class="movie-list-item-title">Grumpier Old Men</span>
                            <p class="movie-list-item-desc">Elderly, angling and contentious friends Max (Walter Matthau) and John (Jack Lemmon) back-burner their bickering when their kids (Kevin Pollak, Daryl Hannah) get engaged, but fishing season opens a can of romantic worms as newcomer Maria (Sophia Loren) plans to turn their beloved bait shop into a restaurant.
                                .</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie4.jpg" alt="">
                            <span class="movie-list-item-title">Waiting to Exhale</span>
                            <p class="movie-list-item-desc">Four women living in the Phoenix metropolitan area and their relationships with men and one another. All of them are "holding their breath" until the day they can feel comfortable in a committed relationship with themselves.
                                .</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie5.jpg" alt="">
                            <span class="movie-list-item-title">Father of the Bride</span>
                            <p class="movie-list-item-desc">George Banks (Steve Martin) and his wife, Nina (Diane Keaton), are the proud parents of Annie (Kimberly Williams), but when she returns from studying abroad and announces that she's engaged, their whole world turns upside down, especially that of overprotective George.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie6.jpg" alt="">
                            <span class="movie-list-item-title">Heat</span>
                            <p class="movie-list-item-desc">A group of high-end professional thieves start to feel the heat from the LAPD when they unknowingly leave a verbal clue at their latest heist.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie7.jpg" alt="">
                            <span class="movie-list-item-title">Sabrina</span>
                            <p class="movie-list-item-desc">The daughter of a chauffeur (Sabrina, played by Hepburn) has been madly in love with the youngest playboy son (David, played by Holden) of a Long Island society family. Although he was never serious about the young woman, she dreams he will one day fall madly in love with her.
                                .</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie8.jpg" alt="">
                            <span class="movie-list-item-title">Tom & Huck</span>
                            <p class="movie-list-item-desc">Mischievous young Tom Sawyer witnesses a murder by a vicious half-Native American criminal known as "Injun Joe". Tom befriends Huck Finn, a boy with no future and no family, and is forced to choose between honoring a friendship or honoring an oath, when the town drunk is accused of the murder.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">New Releases</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie9.jpg" alt="">
                            <span class="movie-list-item-title">Sudden Death</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie10.jpg" alt="">
                            <span class="movie-list-item-title">Golden Eye</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie11.jpg" alt="">
                            <span class="movie-list-item-title">The American President</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie12.jpg" alt="">
                            <span class="movie-list-item-title">Dracula: Dead & Loving It</span>
                            <p class="movie-list-item-desc">The film pits a lone fire marshal against extortionists who hold unsuspecting NHL players and fans for ransom during game seven of the Stanley Cup Finals, and set payment milestones to coincide with the game's progress.
                                .</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie13.jpg" alt="">
                            <span class="movie-list-item-title">Balto</span>
                            <p class="movie-list-item-desc">Based on a true story, BALTO centers on a brave dog who saved the lives of Alaskan children with diphtheria when he brought medicine to them through the snow. Half wolf, half domesticated dog, Balto (voiced by Kevin Bacon) has a hard time fitting in with either species.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie14.jpg" alt="">
                            <span class="movie-list-item-title">Nixon</span>
                            <p class="movie-list-item-desc"> Biographical examination of former U.S. President Richard Nixon (Anthony Hopkins). The non-chronological narrative explores Nixon's personal and professional life, touching on his youth, college years, and political triumphs and failures.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie15.jpg" alt="">
                            <span class="movie-list-item-title">Cutthroat Island</span>
                            <p class="movie-list-item-desc">A female pirate and her companion race against their rivals to find a hidden island that contains a fabulous treasure. A female pirate and her companion race against their rivals to find a hidden island that contains a fabulous treasure.</p>
                            <button class="movie-list-item-button">Rate</button>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-2.jpg');">
                <img class="featured-title" src="img/movie16.jpg" alt="">
                <p class="featured-desc">Casino.</p>
                <button class="featured-button">Rate</button>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">Highly Rated</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie17.jpg" alt="">
                            <span class="movie-list-item-title">Sense & Sensibility</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie18.jpg" alt="">
                            <span class="movie-list-item-title">Four Rooms</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie19.jpg" alt="">
                            <span class="movie-list-item-title">Ace Ventura: When Nature Calls</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie20.jpg" alt="">
                            <span class="movie-list-item-title">Money Train</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie21.jpg" alt="">
                            <span class="movie-list-item-title">Get Shorty</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie22.jpg" alt="">
                            <span class="movie-list-item-title">Copycat</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/movie23.jpg" alt="">
                            <span class="movie-list-item-title">Assassins</span>
                            <p class="movie-list-item-desc">Place Holder.</p>
                            <button class="movie-list-item-button">Watch</button>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
        </div>
    </div>
    
    <script src="js/app.js"></script>
</body>

</html>