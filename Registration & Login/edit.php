<?php
    require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>

        <div class="right-links">
           <!-- <a href="#">Change Profile</a> -->
            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <div class="container">
        <div class="box form-box">
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <labe for="name">Name</labe>
                    <input type="text" name="name" id="name" required>
                </div>

                <div class="field input">
                    <labe for="username">Username</labe>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <labe for="email">Email</labe>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <labe for="age">Age</labe>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update" required>
                </div>

            </form>
        </div>
    </div>
</body>
</html>