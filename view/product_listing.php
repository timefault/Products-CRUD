<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Home Page
 * Notes:
 **/
 ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title>Nichols8 Home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="styles/default.css" />
	</head>
    <body>
        <nav class="navbar navbar-expand-lg fixed-top">
            <span class="navbar-text">
                <?php
                    greet_user();
                ?>
            </span>
             <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="?action=search" class="btn" >Search</a></li>
                <li class="nav-item"><a href="?action=logout" class="btn btn-secondary" >Logout</a></li>
            </ul>
        </nav>
           <header class="mg-top-50">
               <h2>Crash Course Database</h2>
           </header> 
        <div class="container">
<!--////////////// S H O W   R E C O R D S /////////////////-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Vendor ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php fetch_records(); ?>
            <?php foreach ($resultSet as $result) : ?>
                <tr>
                    <td><?php echo $result["prod_id"]; ?></td>
                    <td><?php echo $result["vend_id"]; ?></td>
                    <td><?php echo $result["prod_name"]; ?></td>
                    <td><?php echo $result["prod_price"]; ?></td>
                    <td><?php echo $result["prod_desc"]; ?></td>
                    <td>
                        <form action="?action=show_form" method="post">
                            <input type="hidden" name="prod_id"
                                value="<?php echo $result["prod_id"]; ?>" />
                            <input type="<?php if(is_session_admin()) echo 'submit'; else echo 'hidden';?>" value="Update" name="btn_update_record" class="btn-update"/>
                        </form>    
                    </td>
                    <td>
                        <form action="?action=show_confirm_delete" method="post">
                            <input type="hidden" name="prod_id"
                                value="<?php echo $result["prod_id"]; ?>" />
                            <input type="hidden" name="prod_name"
                                value="<?php echo $result["prod_name"]; ?>" />
                            <input type="<?php if(is_session_admin()) echo 'submit'; else echo 'hidden';?>" value="Delete" name="btn_delete_record" class="btn-delete"/>
                        </form>    
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
            <a href="?action=show_form" method="get" class="btn btn-submit">Insert</a>
        </div>
                    
    </body>