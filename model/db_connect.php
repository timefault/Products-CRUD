<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Database Connection
 **/

    $host = "www.codewoodroe.com";
    $dbName = "codewood_CrashCourse";
    $dsn = ("mysql:host=$host;dbname=$dbName");
    $db_username = "codewood_user";
    $password = "12345";
    $tableName = "products";

    try {
        $pdo = new PDO($dsn, $db_username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');
    }
    catch (PDOException $e) {
        $error_message = "Error connecting to database. This error instance is most likely due to the password being set to '&ltEMPTY&gt' instead of 'root' or vice versa: ";
        include "view/db_error.php";
        exit();
    }
?>