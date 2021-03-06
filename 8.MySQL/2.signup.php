<?php

    session_start();

    $success = "";
    $error = "";

    $conn = mysqli_connect("shareddb1a.hosting.stackcp.net","cl18-users-f73","ilthtfwa9;00","cl18-users-f73" );

    if(mysqli_connect_error()){
        
        die("The connection was not successful");
        
    } 

    if(isset($_POST['submit'])){
        
        if(array_key_exists('email', $_POST) OR array_key_exists('password', $_POST) ) {

                if($_POST['email'] == '') {

                    $error = "Email adress is required.";

                } else if($_POST['password'] == '') {

                    $error = "Password is required.";

                } else {

                    $query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($conn, $_POST['email'])."'";

                    $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) >0) {

                        $error = "That email address is already been taken";

                    } else {

                        $query = "INSERT INTO `users` (`email`, `password`) VALUES('".mysqli_real_escape_string($conn, $_POST['email'])."','".mysqli_real_escape_string($conn, $_POST['password'])."')";

                        if(mysqli_query($conn,$query)) {

                            $_SESSION['email'] = $_POST['email'];
                            
                            header("Location: session.php");
                            
                        //    $success = "You have been signed up!";

                        } else {

                            $error =  "There was a problem signing you up!";    

                        }
                    }
                 }

        }
        
    }   

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
      
    <script src="https://use.fontawesome.com/1e59ac095b.js"></script>  
      
    <style>
        
        html{
              background: url(photo.jpg) no-repeat center center fixed; 
              -webkit-background-size: cover;
              -moz-background-size: cover;
              -o-background-size: cover;
              background-size: cover;
        }
        
        body {
            background: none;
        }
        
        .container{            
            width: 400px;
            margin-top: 200px;
            text-align: center;
            color: white;
        }
        
    </style>  
      
        
  </head>
    
  <body>
      
      <div id="error">
            <?php 
              
              if ($success) {
                  
                  echo '<div class="alert alert-success" role="alert">'.$success.'<a class="close" data-dismiss="alert">&times;</a></div>';
                  
              } else if ($error) {
                  
                  echo '<div class="alert alert-danger" role="alert">'.$error.'<a class="close" data-dismiss="alert">&times;</a></div>';
                  
              }
              
              ?>
      
      </div>
      
      <div class="container">
      
          
      <form method="post">
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          </div>
 
          <button type="submit" class="btn btn-primary" name="submit">Sign up!</button>
        </form>

      </div>
      
      
      
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js">
    </script>
      
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
      
  </body>
</html>