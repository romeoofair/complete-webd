<?php

    $conn = mysqli_connect("shareddb1a.hosting.stackcp.net","cl18-users-f73","ilthtfwa9;00","cl18-users-f73" );

    if(mysqli_connect_error()){
        
        die("The connection was not successful");
        
    } 

    // $query = "INSERT INTO `users` (`email`, `password`) VALUES('bro@gmial.com', 'abc323')";

    // $query = "UPDATE `users` SET email = 'dragon@gmail.com' WHERE id= 2 LIMIT 1";
        

    //$query = "SELECT * FROM users WHERE id=2"; 
    
    //$query = "SELECT * FROM users WHERE id>=2"; 

    //$query = "SELECT `email` FROM users WHERE id>=2";

    //$query = "SELECT * FROM users WHERE email LIKE '%gmail.com'";

    $name = "dragon'dude";
    
     $query = "SELECT * FROM users WHERE name='".mysqli_real_escape_string($conn,$name)."'";

    if($result = mysqli_query($conn,$query)) {

        while($row = mysqli_fetch_array($result)) {
            
            print_r($row);
             
        }
        
        
     //   echo "Your email is " . $row['email'] . " and your password is ".$row[password]; 

             
    }

?>