<?php

function getMovieDetailsByID($movieID)
{
    global $db;
    $query = "SELECT title, releaseYear, runtime, avgRating FROM movie natural join imdb_info where movieID=:movieID";
    
    $statement = $db->prepare($query);

    $statement->bindValue('movieID', $movieID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getMoviebyTitle($searchTerm)
{
    global $db;
    $query = "SELECT movieID, title, releaseYear, runtime, avgRating FROM movie natural join imdb_info where title like concat ('%', :searchTerm, '%')";
    
    $statement = $db->prepare($query);

    $statement->bindValue(':searchTerm', $searchTerm);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function filterMovieByRating($avgRating) 
{
    global $db;
    $query = "select movieID, title, releaseYear, runtime, avgRating from movie natural join imdb_info where avgRating >= :avgRating";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':avgRating', $avgRating);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $result;
}

function getMoviesBySearchAndRating($searchTerm, $avgRating)
{
    global $db;
    $query = "select movieID, title, releaseYear, runtime, avgRating from movie natural join imdb_info where title like concat ('%', :searchTerm, '%') and avgRating >= :avgRating";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':searchTerm', $searchTerm);
    $statement->bindValue(':avgRating', $avgRating);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $result;
}

function getCrewbyMovieID($movieID) {
    global $db;
    $query = "select crewID, cname from crew natural join works_for where movieID=:movieID";

    $statement = $db->prepare($query);

    $statement->bindValue('movieID', $movieID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getJobsbyCrewID($crewID, $movieID) {
    global $db;
    $query = "select jobTitle from crew_job natural join works_for where crewID=:crewID and movieID=:movieID";

    $statement = $db->prepare($query);

    $statement->bindValue('crewID', $crewID);
    $statement->bindValue('movieID', $movieID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getReviewbyUserID($userID)
{
    global $db;
    $query = "select title, rating, content from review natural join movie where userID=:userID";

    $statement = $db->prepare($query);

    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getReviewbyMovieID($movieID)
{
    global $db;
    $query = "select title, rating, content from review natural join movie where movieID=:movieID";

    $statement = $db->prepare($query);

    $statement->bindValue(':movieID', $movieID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getWatchlistbyUserID($userID)
{
    global $db;
    $query = "select ltitle, list_desc from watchlist where userID=:userID";

    $statement = $db->prepare($query);

    $statement->bindValue(':userID', $userID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getMoviesbyListID($listID)
{
    global $db;
    $query = 'select title, releaseYear, avgRating from is_added natural join movie natural join imdb_info where listID=:listID';

    $statement = $db->prepare($query);

    $statement->bindValue(':listID', $listID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

// CHECK ON THIS ONE
function addReview($userID, $movieID, $rating, $content)
{
    global $db;
    $query = "insert into review (userID, movieID, rating, content) VALUES (:userID, :movieID, :rating, :content)";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':movieID', $movieID);
        $statement->bindValue(':rating', $rating);
        $statement->bindValue(':content', $content);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e)
    {
        $e->getMessage();
    }
}

function addWatchlist($ltitle, $userID)
{
    global $db;
    $query = "INSERT INTO watchlist (ltitle, list_desc, userID) VALUES (:ltitle, :list_desc, :userID)";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':ltitle', $ltitle);
        $statement->bindValue(':list_desc', $list_desc);
        $statement->bindValue(':userID', $userID);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e)
    {
        $e->getMessage();
    }
}

function addMovie($movieID, $listID, $has_watched)
{
    global $db;
    $query = "INSERT INTO is_added (movieID, listID, has_watched) VALUES (:movieID, :listID, :has_watched)";

    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':movieID', $movieID);
        $statement->bindValue(':listID', $movieID);
        $statement->bindValue(':has_watched', $has_watched);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e)
    {
        $e->getMessage();
    }
}

// CHECK ON THIS ONE
function updateReview($userID, $movieID, $rating, $content)
{
    global $db;
    $query = "update review set rating=:rating, content=:content where userID=:userID and movieID=:movieID";

    $statement = $db->prepare($query);

    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':movieID', $movieID);
    $statement->bindValue(':rating', $rating);
    $statement->bindValue(':content', $content);

    $statement->execute();
    $statement->closeCursor();
}

function updateStatus($movieID, $listID, $has_watched)
{
    global $db;
    $query = "update is_added set has_watched=:has_watched where movieID=:movieID and listID=:listID";

    $statement = $db->prepare($query);

    $statement->bindValue(':movieID', $movieID);
    $statement->bindValue(':listID', $movieID);
    $statement->bindValue(':has_watched', $has_watched);

    $statement->execute();
    $statement->closeCursor();
}

function deleteWatchlist($listID)
{
    global $db;
    $query = "delete from watchlist where listID=:listID";

    $statement = $db->prepare($query);    
    $statement->bindValue(':listID', $listID);
    $statement->execute();
    $statement->closeCursor();
}

// UNTESTED
function deleteReview($userID, $movieID)
{
    global $db;
    $query = "delete from review where userID=:userID and movieID=:movieID";

    $statement = $db->prepare($query);    
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':movieID', $movieID);
    $statement->execute();
    $statement->closeCursor();
}

function deleteMovie($movieID, $listID)
{
    global $db;
    $query = "delete from is_added where movieID=:movieID and listID=:listID";

    $statement = $db->prepare($query);    
    $statement->bindValue(':movieID', $movieID);
    $statement->bindValue(':listID', $movieID);
    $statement->execute();
    $statement->closeCursor();
}

function filterMovieByGenre($gname)
{
    global $db;
    $query = "select title, releaseYear from movie natural join movie_genre where gname=:gname";
    
    $statement = $db->prepare($query);
    $statement->bindValue(':gname', $gname);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
}

?>