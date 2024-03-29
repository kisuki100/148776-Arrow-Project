<?php

    session_start();

    include 'config.php';

    if(isset($_SESSION["username"])) {
        header("Location: {$hostname} /waandishi/system/add-post.php");
    }

 ?>

<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Login</h3>
                        <!-- Form Start -->
                        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                        <?php 

                            if(isset($_POST['login'])) {
                                
                                $username = mysqli_real_escape_string($conn,$_POST['username']);
                                $password = mysqli_real_escape_string($conn,$_POST['password']);

                                $selectSql = "SELECT user_id,username,password,role FROM user WHERE username = '{$username}'";

                                $selectResult = mysqli_query($conn,$selectSql);

                                if(!$selectResult) {
                                    die("Error: ".$selectSql."<br/>".mysqli_error($conn));
                                }

                                if(mysqli_num_rows($selectResult) > 0) {
                                    
                                    while($row = mysqli_fetch_assoc($selectResult)) {

                                        if($username == $row['username'] && password_verify($password,$row['password']) == TRUE) {

                                            $_SESSION["username"] = $row['username'];

                                            $_SESSION["user_id"] = $row['user_id'];

                                            $_SESSION["role"] = $row['role'];

                                            header("Location: {$hostname} /waandishi/system/add-post.php");

                                        } else {
                                            echo "<script>alert('username and password doesn\'t match');</script>";
                                        }
                                    }

                                } else {
                                    echo "<script>alert('username doesn\'t exist');</script>";
                                }

                            }

                         ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
