<!Doctype html>
<html>
    <head>
 		<meta charset="UTF-8">
		<title>Nichols8 Search</title>
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
                <li class="nav-item"><a href="." class="btn">Home</a></li>
                <li class="nav-item"><a href="?action=logout" class="btn btn-secondary" >Logout</a></li>
            </ul>
        </nav>
    <header class="mg-top-50">
        <h2>Search</h2>
    </header>
    <div class="container">
        <form method="" action="">
            <div>
                <label for="">Product Name</label>
                <input type="text" id="" name="" value=""/>
            </div>
            <div>
                <label for="">Product Price</label>
                <input type="text"  id="" name="" value="" />
            </div>

            <div>
                <?php $vendors = get_vendor_ids();?> 
                <label for="VendorID">Vendor Name</label>
                <select id="VendorID" name="vend_id" class="custom-select">
                        <?php foreach($vendors as $row) : ?>
                            <option value="<?php echo $row['vend_id']; ?>"<?php stickySelect($row); ?>><?php echo $row['vend_name']; ?></option>
                        <?php endforeach; ?>
                </select> 
            </div>

            <input type="radio" name="rad_product_price" id="" value="product_price_gt" checked />
            <label for="">greater than</label>
            <input type="radio" name="rad_product_price" id="" value="product_price_lt" />
            <label for="">less than</label>
        </form>
    </div>
    </body>
</html>
