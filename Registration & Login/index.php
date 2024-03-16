<?php
    require_once('config.php');
    session_start();

    $error = "";

    if(isset($_POST['login'])){
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        $sql = "SELECT * FROM `users` WHERE `Username`='{$Username}'";
        
        $result = $conn->query($sql);

        if($result->num_rows>0){
            $rows = $result->fetch_assoc();

            if($Password == $rows['Password']){
                 $_SESSION['Id'] = $rows['Id'];
               //  $_SESSION['Username'] = $rows['Username'];
            
            session_regenerate_id(true);
            header('Location:home.php');
            exit();
           // $_SESSION['Password'] = $rows['Password'];
            }
            else{
            $error =  "Invalid username or password";
        }
    }
    else{
        $error = "Invalid username or password";
    }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Login</header>
            <?php
            if(!empty($error)){
            ?>
                <div class="error">
                <?php echo $error; ?>
            </div>
           <?php } ?>
            <form action="index.php" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="Username" id="Username" autocomplete="off" >
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="Password" id="Password" autocomplete="off" >
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="login" value="Login" required>
                </div>

                <div class="link">
                    Don't have account?<a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
