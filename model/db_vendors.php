<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Vendors MySQL Query
 * Notes:   Gets list of vendors
 **/

    // require "db_connect.php";
    function get_vendors() {
        global $pdo;
        $query= "SELECT vend_id, vend_name FROM Vendors;";
        $statement = $pdo->prepare($query);
        $statement->execute();

        $vendors = $statement->fetchAll();
        $statement->closecursor();
        return $vendors;
    }
?>