<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Delete Confirmation 
 * Notes:
 **/

 $productID = filter_input(INPUT_POST, "prod_id");
 $productName = filter_input(INPUT_POST, "prod_name");
?>
<!Doctype html>
<html>
    <head>
 		<meta charset="UTF-8">
		<title>Nichols8 Delete Confirmation</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/default.css" />       
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Delete product?</h2>
                    <hr/>
                    <h5 class="card-text"><?php echo $productID; ?></h5>
                    <p class="card-text"><?php echo $productName; ?></p>
                    <form method="post" action=".">
                        <input type="hidden" name="prod_id" value="<?php echo $productID; ?>" />
                        <input type="submit" name="btnDeleteConfirm" value="Yes" class="btn btn-success"/>
                        <input type="submit" name="btnDeleteConfirm" value="No" class="btn btn-danger"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>