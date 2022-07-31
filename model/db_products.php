<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Product Table functions
 * Notes:
 **/
    $tableName = "products";
// connect to database
// require "db_connect.php";
// fetch all records
    function fetch_records() {
        global $pdo;
        global $tableName;
        global $resultSet;
        try {
            $query = "select * from " . $tableName;
            $statement = $pdo->prepare($query);
            $statement->execute();

            $resultSet = $statement->fetchall();
            $statement->closecursor();
            // return $resultSet;
        }
        catch (pdoexception $e){
            $error_message = "error displaying results: ";
            include "view/db_error.php";
            exit();
        }
    }
// fetch a record
    function fetch_a_record($productID) {
        global $pdo;
        global $tableName;
        global $resultSet;
        try {
            $query = "
                SELECT * FROM $tableName
                WHERE prod_id = :prod_id;
            ";
            $statement = $pdo->prepare($query);
            $statement->bindValue(":prod_id", $productID);
            $statement->execute();

            $resultSet = $statement->fetch();
            $statement->closecursor();
            return $resultSet;
        }
        catch (pdoexception $e){
            $error_message = "error fetching results: ";
            include "view/db_error.php";
            exit();
        }
    }
// insert records
    function insert_record($productID, $vendorID, $productName, $productPrice, $productDescription) {
        global $pdo;
        global $tableName;
        try {
            $query = "INSERT INTO $tableName
                        (prod_id, vend_id, prod_name, prod_price, prod_desc)
                        VALUES
                            (:prod_id, :vend_id, :prod_name, :prod_price, :prod_desc);";
            $statement = $pdo->prepare($query);
            $statement->bindValue(":prod_id", $productID);
            $statement->bindValue(":vend_id", $vendorID);
            $statement->bindValue(":prod_name", $productName);
            $statement->bindValue(":prod_price", $productPrice);
            $statement->bindValue(":prod_desc", $productDescription);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e){
            $error_message = "Error adding submitted department: ";
            include "view/db_error.php";
            exit();
        }
    }
// update records
    function update_record($productID, $vendorID, $productName, $productPrice, $productDescription) {
        global $pdo;
        global $tableName;
        // $productID= filter_input(INPUT_POST, "prod_id");

        try {
            $query = "
                UPDATE $tableName
                SET prod_id = :prod_id, vend_id = :vend_id, prod_name = :prod_name, prod_price = :prod_price, prod_desc = :prod_desc
                WHERE prod_id = :prod_id;
            ";
            $statement = $pdo->prepare($query);
            $statement->bindValue(":prod_id", $productID);
            $statement->bindValue(":vend_id", $vendorID);
            $statement->bindValue(":prod_name", $productName);
            $statement->bindValue(":prod_price", $productPrice);
            $statement->bindValue(":prod_desc", $productDescription);

            $statement->execute();
            $statement->closeCursor();

        }
        catch (PDOException $e){
            $error_message = "Error updating department: ";
            include "view/db_error.php";
            exit();
        }

    }
// delete records
    function delete_record($productID) {
        require_once "db_connect.php";
        global $pdo;
        global $tableName;
        // print_r($_POST);
        $productID= filter_input(INPUT_POST, "prod_id", FILTER_SANITIZE_STRING);
        try {
            $query = "
                        DELETE FROM $tableName
                        WHERE prod_id = :prod_id;
                    ";
            $statement = $pdo->prepare($query);
            $statement->bindValue(":prod_id", $productID);
            $statement->execute();
            $statement->closeCursor();
        }
        catch (PDOException $e){
            $error_message = "Error deleting department: ";
            include "view/db_error.php";
            exit();
        }
    }

// get vendor keys
    function get_vendor_ids() {
        global $pdo;
        $tableName = "vendors";
        try {
            $query = "select * from " . $tableName;
            $statement = $pdo->prepare($query);
            $statement->execute();

            $resultSet = $statement->fetchall();
            $statement->closecursor();
            return $resultSet;
        }
        catch (pdoexception $e){
            $error_message = "error displaying results: ";
            include "view/db_error.php";
            exit();
        }
    }
?>