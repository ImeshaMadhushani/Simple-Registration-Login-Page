<?php
    require_once('config.php');
    $Name = $Username = $Email = $Age = $Password = "";
    $NameErr = $UsernameErr = $EmailErr = $AgeErr = $PasswordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Name = $_POST['Name'];
        $Username = $_POST['Username'];
        $Email = $_POST['Email'];
        $Age = $_POST['Age'];
        $Password = $_POST['Password'];
        
        if(empty($Name)){
            $NameErr =  "Name is required";
        }
        else{
        $Name = input_verify($Name);
        if(!preg_match("/^[a-zA-Z]*$/",$Name)){
             $NameErr = "Invalid name";
            }
        }

        if(empty($Username)){
        $UsernameErr = "Enter username";
        }
        else{
        $Username = input_verify($Username);
        if(!preg_match('/^[a-zA-Z0-9]*$/',$Username)){
             $UsernameErr = "Invalid username";
            }
        }

        if(empty($Password)){
        $PasswordErr = "Enter password";
        }
        else{
        $Password = input_verify($Password);
        if(strlen($Password) < 8 || strlen($Password) > 20){
        $PasswordErr = "Password Length 8-20";
        }
        elseif(!preg_match('/[0-9]/',$Password)){
        $PasswordErr = "Password must contain at least one number";
        }
        elseif(!preg_match('/[a-z]/',$Password)){
        $PasswordErr = "Password must contain at least one lowercase letter";
        }
        elseif(!preg_match('/[A-Z]/',$Password)){
        $PasswordErr = "Password must contain at least one uppercase letter";
        }
        }

      /*  $verify_query = "SELECT Email FROM `users` WHERE Email='$Email'";
        $resultver = $conn->query($verify_query);*/

        if(empty($Email)){
        $EmailErr = "Enter Email";
        }
       /* elseif($resultver->num_rows > 0){
        $EmailErr = "Email already in use";
        }*/
        else{
        $Email = input_verify($Email);
        if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $EmailErr = "Invalid Email";
        }
        }

        if(empty($Age)){
            $AgeErr = "Age is required";
        }
        else{
            $Age = input_verify($Age);
            if(!is_numeric($Age) || $Age < 1 || $Age > 100) {
                $AgeErr = "Invalid age"; 
            }
        }
        
     }
        

   
          /*  if($result){*/
                if(isset($_POST['submit'])){
                    if($NameErr == "" && $UsernameErr == "" && $EmailErr == "" && $AgeErr == "" && $PasswordErr == ""){
                         $sql = "INSERT INTO `users`(`Name`, `Username`, `Email`, `Age`, `Password`) 
                            VALUES ('{$Name}','{$Username}','{$Email}','{$Age}','{$Password}')";

                            $result = $conn->query($sql);

                            if($result){
                                echo "Successfully registered";
                                header('Location: index.php'); // Redirect to index.php after successful registration
                            }

                        
                    } 
                    else {
                        echo "Please fill form correctly";
                    }   
                }
           /* }*/


            

    function input_verify($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }

    

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Register</header>
            <form action="register.php" method="post">
                <div class="field input">
                    <label for="name">Name  <span class="error">*<?php echo $NameErr; ?></span></label>
                    <input type="text" name="Name" id="Name" >
                </div>

                <div class="field input">
                    <label for="username">Username<span class="error">*<?php echo $UsernameErr; ?></span></label>
                    <input type="text" name="Username" id="Username" autocomplete="off" >
                </div>

                <div class="field input">
                    <label for="password">Password <span class="error">*<?php echo $PasswordErr; ?></span></label>
                    <input type="password" name="Password" id="Password" autocomplete="off" >
                </div>

                <div class="field input">
                    <label for="email">Email<span class="error">*<?php echo $EmailErr; ?></span></label>
                    <input type="text" name="Email" id="Email" autocomplete="off">
                </div>

                <div class="field input">
                    <label for="age">Age<span class="error">*<?php echo $AgeErr; ?></span></label>
                    <input type="number" name="Age" id="Age" autocomplete="off">
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register" >
                </div>

                <div class="link">
                    Already have account?<a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
