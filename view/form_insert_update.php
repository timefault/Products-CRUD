<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Insert/Update Form 
 **/

// determine form type (Update or Insert)
// tacking on solutions as problems arise
// rework this logic <---------------------------------------------------------
    if( isset($_POST["btn_update_record"])) {
        $productID = filter_input(INPUT_POST, "prod_id");
        $formType = "Update";
        $formAction= "update_record";
        $product = fetch_a_record($productID);
    }
    elseif ( isset($_POST["form_submit"] )) {
        if ( $_POST["form_submit"] == "Update") {
            $productID = filter_input(INPUT_POST, "prod_id");
            $formType = "Update";
            $formAction= "update_record";
            $product = fetch_a_record($productID);
        }
        else {
            $formType = "Insert";
            $formAction = "insert_record";
        }
    }
    else {
        $formType = "Insert";
        $formAction = "insert_record";
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <title><?php echo "Nichols8 ". $formType ." Form" ?></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
		<link rel="stylesheet" href="styles/default.css" />
	</head>
	<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <?php greet_user();?>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="." class="btn">Home</a></li>
            <li class="nav-item"><a href="?action=logout" class="btn btn-secondary">Logout</a></li>
    </nav>
        <header class="mg-top-50"><h2>
            <?php echo "Product " . $formType . " Form"; ?>
        </h2></header>
    <div class="container">
        <form method="post" action="?action=<?php echo $formAction;?>" >
<!--/////////////// P R O D U C T   I D ///////////////////////-->
            <label for="ProductID">Product ID</label>
            <input type="text" id="ProductID" name="prod_id"
                <?php if( $formType == "Update" ) {echo "readonly";} ?>
                value="<?php stickyFeature("prod_id"); ?>"
            />
            <div class="error-message">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!empty($productIDErrorMessage)) {
                                echo $productIDErrorMessage;
                        } 
                    }
                ?>
            </div>

<!--/////////////// P R O D U C T   N A M E ///////////////////-->
            <label for="ProductName">Name</label>
            <input type="text" id="ProductName" name="prod_name"
                value="<?php stickyFeature("prod_name"); ?>"
            />
            <div class="error-message">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!empty($productNameErrorMessage)) {
                                echo $productNameErrorMessage;
                        } 
                    }
                ?>
            </div>
<!--/////////////// P R O D U C T   P R I C E /////////////////-->
            <label for="ProductPrice">Price</label>
            <input type="text" id="ProductPrice" name="prod_price"
                value="<?php stickyFeature("prod_price"); ?>"
            />
            <div class="error-message">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!empty($productPriceErrorMessage)) {
                                echo $productPriceErrorMessage;
                        } 
                    }
                ?>

            </div>
<!--/////////////// P R O D U C T   D E S C R I P T I O N /////-->
            <label for="ProductDescription">Description</label>
            <textarea id="ProductDescription" name="prod_desc" rows="2" cols="80" ><?php stickyFeature("prod_desc") ?></textarea>
            <div class="error-message">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!empty($productDescriptionErrorMessage)) {
                                echo $productDescriptionErrorMessage;
                        } 
                    }
                ?>
            </div>
<!--/////////////// V E N D O R   I D /////////////////////////-->
            <?php $vendors = get_vendor_ids(); 
                // print_r($vendors);
            ?>
            <label for="VendorID">Vendor ID</label>
            <select id="VendorID" name="vend_id" class="custom-select">
                    <?php foreach($vendors as $row) : ?>
                        <option value="<?php echo $row['vend_id']; ?>"<?php stickySelect($row, $formType, $product); ?>><?php echo $row['vend_name']; ?></option>
                    <?php endforeach; ?>
            </select> 
            <div class="error-message">
                <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (!empty($vendorIDErrorMessage)) {
                                echo $vendorIDErrorMessage;
                        } 
                    }
                ?>
            </div>
            <input type="submit" name="form_submit" value="<?php echo $formType; ?>" class="btn btn-submit"/>
        </form>
        </div>
    </body>
</html>