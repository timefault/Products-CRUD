<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Validation 
 **/
///////////////////// P R O D U C T   I D //////////////////////
    $productID = filter_input(INPUT_POST, "prod_id", FILTER_SANITIZE_STRING);
    if ($productID == false) {
        $productIDErrorMessage = "* Required, Alphanumeric, Length 10 or less";
    }
    elseif (strlen($productID) > 10) {
        $productIDErrorMessage = "* Required, Alphanumeric, Length 10 or less";
    }
    else {
        $productID = strtoupper($productID);
        $productIDErrorMessage = false;
    }

// delete needs only productID (well, vendorID, too)
    if( !isset($_POST["btnDelete"]) ) {

///////////////////// V E N D O R   I D ////////////////////////
        $vendorID= filter_input(INPUT_POST, "vend_id", FILTER_SANITIZE_STRING);

///////////////////// P R O D U C T   N A M E //////////////////
        $productName= filter_input(INPUT_POST, "prod_name", FILTER_SANITIZE_STRING);
        if ($productName == false) {    // if name is 0, value is coerced to false; edge case
            $productNameErrorMessage = "* Required, Alphanumeric, Length 255 or less";
        }
        elseif (strlen($productName) > 255) {
            $productNameErrorMessage = "* Required, Alphanumeric, Length 255 or less";
        }
        elseif ( strlen(trim($productName)) == 0 ) { // disallow white-space only input
            $productNameErrorMessage = "* Required, Alphanumeric, Length 255 or less";
        }

        else {
            $productNameErrorMessage = false;
            $productName= trim($productName);
        }
///////////////////// P R O D U C T   P R I C E ////////////////
// if filter_input fails, text box will be populated as <EMPTY> 
        $options = array("options"=>array("min_range"=>0.01, "max_range"=>999999.99));
        $productPrice = filter_input(INPUT_POST, "prod_price", FILTER_VALIDATE_FLOAT, $options);
        if ($productPrice == false) {
            $productPriceErrorMessage = "* Required, Numeric input, Value range is 0.01 to 999999.99";
        }
        else {
            $productPriceErrorMessage = false;
        }
///////////////////// P R O D U C T   D E S C R I P T I O N ////
        $productDescription = filter_input(INPUT_POST, "prod_desc", FILTER_SANITIZE_STRING);
        if ($productDescription == false) {
            $productDescriptionErrorMessage = "* Required, Alphanumeric, Length 65536 or less";
        }
        elseif ( strlen($productDescription) > 65536) {
            $productDescriptionErrorMessage = "* Required, Alphanumeric, Length 65536 or less";
        }
        elseif ( strlen(trim($productDescription)) == 0 ) { // disallow white-space only input
            $productDescriptionErrorMessage = "* Required, Alphanumeric, Length 65536 or less";
        }
        else {
            $productDescriptionErrorMessage = false;
            $productDescription = trim($productDescription);
        }
}
?>