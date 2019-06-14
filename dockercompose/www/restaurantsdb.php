<?php

require_once 'connection.php';

/*  
*   The function getRestaurants() has 2 part: 
*       1.-With query filed with something to fetch
*
*   $data starts like an empty array to be filled with the array of the $result assigned with MYSQLI_ASSOC
*   $unmatch variable counts the number of unmatches values and is compared with the function count($array)
*   All the matches values are compared ignoring uppercase or lowercase
*   The sorts option of the form are inserted in the SQL sentence at the end of the query 
*   The results of the comparison and matches will be inserted in the $match array. $data.match -> $match
*   
*       2.-With empty query still can be sorted
*   
*   The first time the web is loaded, the sort option is empty, so we specify to return the $data array
*   Depending of the value of the sort option selected, the $data
*/
function getRestaurants($query,$order) {

    global $connection;

    # SORT options from 'index.php' form
    if (isset($_POST['order'])) {
        if ($_POST['order']=="descending") {
            $order='DESC';
        } else {
            $order='ASC';
        }
    }
    
    $query = mysqli_real_escape_string($connection,$query);

    $sql = "SELECT `name`,`Restaurant`.`id`,`route`,`locality`,`streetNumber`,`postalCode`,`phoneNumber`,`Image`.`filePath`
        FROM `Restaurant` INNER JOIN `Image` WHERE `Restaurant`.`id` = `Image`.`id` AND `name` 
        LIKE '%$query%' ORDER BY `name` $order";

    $result = mysqli_query($connection,$sql);

    $data = [];
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($connection);

    # 1.-Something in the query form to perform a search
    if (!empty($query)) {

        $match = [];
        $unmatch = 0;

        foreach ($data as $rest) {
            if (strpos(strtoupper($rest['name']),strtoupper($query))!==FALSE) {
                $match [] = $rest;
            } else {
                $unmatch++;
            }
        }

        if ($unmatch==count($data)) {
            echo "No matching values :_(";
        }

        return $match;
    
    # 2.-Perform a search with input="text" empty
    } else {

        if (!isset($_POST['order'])) {
            return $data;
        }

        if ($_POST['order'] == "ascending") {
            sort ($data);
            return $data;
        } elseif ($_POST['order'] == "descending") {
            rsort ($data);
            return ($data);
        }
    }
}

/*  
*   Same performance like getRestaurants() function from above
*   We use alias for every column of the 'Restaurant' tables to be shown after
*   Retrieve a row of result as an associative array inside the $data array
*/
function getRestaurant($idrestaurant) {
    
    global $connection;

    $sql = "SELECT `Restaurant`.`name` AS `Name`,`Restaurant`.`description` AS `Description`,`Image`.`filePath`,
    `Restaurant`.`openingHours` AS `Opening hours`,`Restaurant`.`priceCategory` AS `Price category`,
    `Restaurant`.`locality` AS `Locality`,`Restaurant`.`route` AS `Route`,`Restaurant`.`streetNumber` AS `Street number`,
    `Restaurant`.`postalCode` AS `Postal code`,`Restaurant`.`latitude` AS `Latitude`,`Restaurant`.`longitude` AS `Longitude`,
    `Restaurant`.`phoneNumber` AS `Phone number`,`Restaurant`.`website` AS `Website`,`Restaurant`.`email`,
    `Restaurant`.`rating` AS `Rating`,`Restaurant`.`isTrending` AS `Is trending`
    FROM `Restaurant`,`Image` WHERE `Restaurant`.`id`AND `Image`.`id`=$idrestaurant";

    $result = mysqli_query($connection,$sql);

    $data = NULL;
    $data = mysqli_fetch_assoc($result);
    
    mysqli_free_result($result);
    #mysqli_close($connection);
    
    return $data;
}

?>