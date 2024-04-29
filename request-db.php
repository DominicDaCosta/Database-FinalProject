<?php

function getMovieInfo()
{
    global $db;
    $query = "SELECT title, releaseYear FROM movie";
    
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function getMoviebyTitle()
{
    global $db;
    $query = "SELECT title, releaseYear FROM movie where title like :searchTerm";
    $searchTerm = '%' . $searchTerm . '%';
    
    $statement = $db->prepare($query);

    $statement->bindValue(':searchTerm', $searchTerm);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

function addReview($userID, $movieID, $rating, $content)
{
    global db;
    $query = "insert into review (userID, movieID, rating, content) VALUES (:userID, :movieID, :rating, :content)";

    try {
        $statement = $db->prepare($query)
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

function addWatchlist($ltitle)
{
    global $db;
    $query = "INSERT INTO watchlist (ltitle) VALUES (:ltitle)";

    try {
        $statement = $db->prepare($query)
        $statement->bindValue(':ltitle', $ltitle);

        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e)
    {
        $e->getMessage();
    }
}

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

function getMovieByGenre($gname)
{
    global db;
    $query = "select title, releaseYear from movie natural join movie_genre where gname=:gname";
    
    $statement = $db->prepare($query)
    $statement->bindValue(':gname', $gname);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
}

function getMovieByRating($avgRating) 
{
    global db;
    $query = "select title, releaseYear from movie where avgRating > :avgRating";
    
    $statement = $db->prepare($query)
    $statement->bindValue(':avgRating', $avgRating);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();

    return $result;
}

?>