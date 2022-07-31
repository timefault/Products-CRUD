<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Database Error
 **/
?>
 <!Doctype html>
 <html>
    <head>
 		<meta charset="UTF-8">
		<title>Nichols8 Database Error Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/default.css" />       
    </head>
    <body>
        <a href="index.php" class="btn">Home</a>
        <h2>Database Error</h2>
        <p class="db-error-msg">
          <?php
            $lineHead = date('Y-m-d G:i:s - ') . "[TABLE: ". strtolower($tableName). "] - ";
            echo $lineHead . $error_message . $e->getMessage();
          ?>
        </p>
    </body>
 </html>