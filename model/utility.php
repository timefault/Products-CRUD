<?php
    function stickyFeature($postElement) {
        /*
        !!!!!!! Need sanitization here !!!!!!!!
        */
        global $product;
        if( isset($_POST[$postElement])) {
            echo htmlspecialchars_decode($_POST[$postElement]);
        }
        elseif(isset($product)) {
            echo htmlspecialchars_decode($product[$postElement]);
        }
    }
    function stickySelect($row, $formType=NULL, $product=NULL) {
    // check if postback
    // if postback, set selected option to post_value
        if(isset($_POST['vend_id'])) {
            // echo $_POST['vend_id'];
            if($row['vend_id'] == $_POST['vend_id']) {
                echo ' selected';
            }
        }
    // check if update 
    // if update, set selected option to db_value
        elseif( $product != NULL) {
            if( $formType == "Update") {
                if($row['vend_id'] == $product['vend_id']) {
                    echo ' selected';
                }
            }
        }
    }

    function greet_user() {
            // check if between 6am to 12pm, 12pm to 6pm, 6pm to 6am
            // global $_SESSION;
            $current_hour = intval(date("G"));
            echo "<b>";
            switch(true) {
                case ($current_hour < 6):
                        echo "Good evening, ";
                        break;
                    case ($current_hour < 12):
                        echo "Good morning, ";
                        break;
                    case ($current_hour < 18):
                        echo "Good afternoon, ";
                        break;
                    case ($current_hour < 24):
                        echo "Good evening, ";
                        break;
                    default:
                        echo "Hello, ";
                }
                echo  ucwords($_SESSION["username"])."</b>";   // grab username and use here
}
?>