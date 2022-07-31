<?php
/*
 * Name:    Woody Nichols
 * Date:    March 31, 2021
 * Title:   Nichols8 - Controller
 * Notes:   Project maybe is only 20% complete.
 *          No add user functionality.
 *          No greeting.
 *          No non-admin functionality.
 *          No query filtering.
 *          Extra credit may be done with postback and sticky form and replacing password values using only php.
 *          Had I studied the requisite chapters sooner, completing this project would not have taken as long.
 **/

    // echo password_hash("admin", PASSWORD_DEFAULT);



    // delegate functionality using action attribute 
    // == import functions ==
    require_once "model/db_products.php";
    require_once "model/db_users.php";
    require_once "model/user_functions.php";
    require_once "model/utility.php";
    // == connect to database ==
    // ->   handle errors 
    // include database and admin functions
    require_once "model/db_connect_users.php";



    // Start session management
    $lifetime = 60 * 5;
    session_set_cookie_params($lifetime);
    session_start();


    // functionality
    // check post array and get array for action attribute
    $action = filter_input(INPUT_POST, "action");
    if ($action == NULL) { $action = filter_input(INPUT_GET, "action");}
    if ($action == NULL) {
        if( isset($_POST["btnDeleteConfirm"])) {    // this seems tacky
            switch ($_POST["btnDeleteConfirm"]) {
                case "Yes":
                $action = "delete_confirm_yes";
                break;
                case "No":
                $action = "delete_confirm_no";
                break;
            }
        }
        else {$action = "list_records";}
    }

    // check for logged in user
    if (!isset($_SESSION["is_valid_user"])) {
        if ( isset($_POST["username"]) && isset($_POST["password"])) {$action = "login";}       // <============================
        else {$action = "present_login_form";}
    // tempory fix until action labels are reworked
    // if (!isset($_SESSION['is_valid_user'])) {
    //     switch ($action) {
    //         case "login":
    //             break;
    //         case "show_add_user_form":
    //             break;
    //         case "add_user":
    //             break;
    //         default:
    //         $action = "present_login_form";
    //     }
    }
    else {
        require "model/db_connect.php";
    }


    switch ($action) {
    // == login screen ==
        case "present_login_form":
    // ->   present login form
            include "view/form_login.php";
            exit;
            break;  // unnecessary, no fallthrough if exit executes, right?
        case "login":
            $username = filter_input(INPUT_POST, "username");
            $password = filter_input(INPUT_POST, "password");
                if(is_valid_user($username, $password)){
                    $account_type = get_account_type($username);
                    // echo "[!] Now logged in ...";
                    $_SESSION["is_valid_user"] = true;
                    $_SESSION["username"] = $username;  // will this always be accurate?
                    $_SESSION["account_type"] = $account_type;
                    header("Location:.");
                }
                else {  // not logged in > proceed to login page
                    header("Location: .");
                }
    // ->   present account creation
    // ->   present logged-on account log-off
            break;
    // == logout ==
        case "logout":
            $_SESSION = array();
            session_destroy();
            // include "view/form_login.php";
            header("Location:.");
            break;
    // == new user creation ==
        case "show_add_user_form":
// ->   present new user creation form
            include "view/form_add_user.php";
            exit;
//          get input username
            // $username = filter_input(INPUT_POST, "username", FILTER_SANTIZE_STRING);
            // check if username matches existing record
            // connect to user database
            // fetch user records
            // $results = fetch_records()
            
//          password
//              check if username exists > if does, deny > if not create
            break;

        case "add_user":
            echo "add user";
            break;
// == list records ==
// ->   fetch records
//          handle errors 
        case "list_records": 
            // require "model/db_connect.php";
            fetch_records();
// ->   populate table
            include "view/product_listing.php";
            exit;
            break;
// == present form ==
        case "show_form":
            include "view/form_insert_update.php";
            exit;
            break;
// == insert record ==
        case "insert_record":

// ->   validate input
            // require "model/db_connect.php";
            include "model/validation.php";
            // if bad data > show form
            // if good data > insert record
            if( // candidate for function
                !empty($productIDErrorMessage) ||
                !empty($vendorIDErrorMessage) ||
                !empty($productNameErrorMessage) ||
                !empty($productPriceErrorMessage) ||
                !empty($productDescriptionErrorMessage)
            ) {
            include "view/form_insert_update.php";
            exit;
            }
// ->   insert record
            else {
                insert_record($productID, $vendorID, $productName, $productPrice, $productDescription);
    // ->   list records
                header("Location: .");
                }
                break;
    // == update record ==
            case "update_record":

            // require "model/db_connect.php";
    // ->   validate input
                include "model/validation.php";
                // if bad data > show form
                // if good data > insert record
                if(
                    !empty($productIDErrorMessage) ||
                    !empty($vendorIDErrorMessage) ||
                    !empty($productNameErrorMessage) ||
                    !empty($productPriceErrorMessage) ||
                    !empty($productDescriptionErrorMessage)
                ) {
                include "view/form_insert_update.php";
                exit;
                }
    // ->   update record
                else {
                    update_record($productID, $vendorID, $productName, $productPrice, $productDescription);
    // ->   list records
                    header("Location: .");
                }
                break;
    // == delete record ==
    // ->   confirm deletion
            case "show_confirm_delete":
                include "view/deleteConfirmation.php";
                exit;
                break;
    // ->   delete record
            case "delete_confirm_yes":
    // ->   present form
                include "model/validation.php";
                delete_record($productID);
    // ->   list records
                header("Location: .");
                break;
    // ->   deny record delete
            case "delete_confirm_no":
    // ->   list records
                header("Location: .");
    // == search filter =
            case "search":
    // ->   present form
                include "view/form_filter.php";
            break;
    // ->   validate form
    // ->   build query
    // ->   perform query
    // == default ==
            default:
                echo "Action is not set";
    }
?>