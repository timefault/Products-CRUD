<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - User database functions
 * Notes:
 **/

 require "model/db_connect_users.php";
// add user to database
function add_user(){}

function is_valid_user($username, $password){
    global $pdo_users, $tableName;
    try {
        $query = "
            SELECT password FROM $tableName 
            WHERE name = :username;
        ";
        $statement = $pdo_users->prepare($query);
        $statement->bindValue(":username", $username);
        // $statement->bindValue(":tableName", $tableName);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closecursor();
        $hash = $row["password"];
        return password_verify($password, $hash);
    }
    catch (pdoexception $e){
        $error_message = "Error.";
        include "view/db_error.php";
        exit();
    }
}

function get_account_type($username){
    global $pdo_users, $tableName;
    try {
        $query = "
            SELECT account_type FROM users
            WHERE name= :username;
        ";
        $statement = $pdo_users->prepare($query);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closecursor();
        return $row["account_type"];
    }
    catch (pdoexception $e){
        $error_message = "Error.";
        include "view/db_error.php";
        exit();
    }
}
?>