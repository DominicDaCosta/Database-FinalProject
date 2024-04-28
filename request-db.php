<?php

function getMovieInfo()
{
    global $db;
    $query = "SELECT title, releaseYear FROM movie;";
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

// function createWatchlist($ltitle)
// {
//     global $db;
//     try {
//         $query = "INSERT INTO watchlist (ltitle) VALUES (:ltitle)";

//         $statement = $db->prepare($query)
//         $statement->bindValue(':ltitle', $ltitle);

//         $statement->execute();
//         $statement->closeCursor();
//     } catch (PDOException $e)
//     {
//         $e->getMessage();
//     }
// }


?>
