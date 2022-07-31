<?php
    function is_session_admin() {  // userid should be used
        if($_SESSION["account_type"] == "admin") return true;
        else return false;
    }
?>