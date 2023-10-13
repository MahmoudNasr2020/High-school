<?php
    include "database.php";
    session_start();
    if(isset($_SESSION['username'])){
        header('location:setting.php');
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $username=filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
        $pass=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
        $pass=sha1($pass);
        $error='';
        $select=$con->prepare("SELECT * FROM login WHERE username='".$username."'AND password='".$pass."'");
        $select->execute();
        $row=$select->rowCount();
        if($row>0){
            $_SESSION['username']=$username;
            header('location:setting.php');
        }
        else{
            $error='The username or password is incorrect';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <title>لوحة التحكم</title>
    <link rel='shortcut icon' href='layout/img/logo.png'>
    <link rel="stylesheet" type="text/css" href="layout/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <img class="wave" src="layout/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="layout/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="" method='post'>
                <img src="layout/img/avatar.svg">
                <h2 class="title">Welcome</h2>
                   <div class="input-div one">
                      <div class="i">
                              <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                              <h5>Username</h5>
                              <input type="text" class="input" name='username'>
                      </div>
                   </div>
                   <div class="input-div pass">
                      <div class="i">
                           <i class="fas fa-lock"></i>
                      </div>
                      <div class="div">
                           <h5>Password</h5>
                           <input type="password" class="input" name='password'>
                   </div>
                </div>
                <input type="submit" class="btn" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="layout/js/main.js"></script>
</body>
</html>
