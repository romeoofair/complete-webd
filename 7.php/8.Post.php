<?php

    if($_POST) { 

        $people = array("bharath","gautam","shan");
        
        $isKnown = false;

        foreach($people as $value) {
            
            if($value == $_POST['name']){
                
                $isKnown = true;
                
            } 
        }
        
        if($isKnown) {
            
            echo "Hi there ".$_POST['name']."!";
            
        } else {
            
            echo "I dont know you";
        }
    }
?>

<p>Please enter the user name!</p>

<form method="post">

    <input name="name" type="text">
    
    <input type="submit" value="Go!">

</form>