<?php

    session_start();
    $_SESSION=array();
    session_destroy();
    header("location:counsellor_login.php");

?>