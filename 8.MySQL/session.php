<?php

    session_start();

    if($_SESSION['username']) {
        
        echo "You are logged in!";
        
    } else {
        
        header("Location: index.php");
    }

?>