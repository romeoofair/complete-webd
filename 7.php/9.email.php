<?php

    $emailTo = "aeronautonline@gmail.com";
    
    $subject = "I hope this works";

    $body = "I think you're great";

    $headers = "From: bharathaero225@gmail.com";

    if (mail($emailTo, $subject, $body, $headers)) {
        
        echo "The mail was sent successfully";
        
    } else {
        
        echo "The email could not be sent";
    }

?>