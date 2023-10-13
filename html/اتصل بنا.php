<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
        $email=filter_var(trim($_POST['email']),FILTER_VALIDATE_EMAIL);
        $address=filter_var(trim($_POST['address']),FILTER_SANITIZE_STRING);
        $phone=filter_var(trim($_POST['mobile']),FILTER_SANITIZE_NUMBER_INT);
        $msg=filter_var(trim($_POST['message']),FILTER_SANITIZE_STRING);
        $Error=array();
        if(strlen($name)<3){
            $Error[]='الاسم قصير جدا برجاء ادخال اسم جديد ';
        }
        if(strlen($email)==''){
            $Error[]="يجب كتابة الايميل";
        }
        if(strlen($address)==''){
            $Error[]='يجب كتابة العنوان';
        }
        if(strlen($phone)<5){
            $Error[]='رقم الموبايل غير صالح ';
        }
        if(strlen($msg)<10){
            $Error[]='الرساله قصيره جدا ';
        }
        $myMail="mmmnnn2016161515@gmail.com";
        $header="From:".$email."\r\n"."رقم الموبايل:".$phone."\r\n"."العنوان:".$address;
        $subject="دعم المدرسة";
        if(empty($Error)){
            mail($myMail,$subject,$msg,$header);
            $success="تم ارسال رسالتك بنجاح";
            $name='';
            $email='';
            $address='';
            $phone='';
            $msg='';
        }
    }
?>
<?php
    include "../control/database.php";
    $select=$con->prepare("SELECT * FROM settingsite");
    $select->execute();
    $row=$select->fetch();
    $sitename=$row['sitename'];
    $active=$row['active'];
    $selres=$con->prepare("SELECT * FROM result WHERE res_id=1");
    $selres->execute();
    $rowres=$selres->fetch();
    if($active==1){ ?>
<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>اتصل بنا</title>
        <link href="https://fonts.googleapis.com/css?family=Cairo|Harmattan&display=swap" rel="stylesheet">
        <link rel="shortcut icon" href="../img/%D8%A7%D9%84%D9%84%D9%88%D8%AC%D9%88%20%D8%A7%D9%84%D8%B1%D8%B3%D9%85%D9%8A.png">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9.css">
        <link rel="stylesheet" href="../css/editorBootstrap.css">
        <link rel="stylesheet" href="../css/%D8%A7%D9%84%D8%B4%D8%A7%D8%B4%D8%A7%D8%AA.css">
        <link rel="stylesheet" href="../css/hover-min.css">
        <link rel="stylesheet" href="../css/%D8%B9%D9%86%20%D8%A7%D9%84%D9%85%D8%AF%D8%B1%D8%B3%D8%A9.css">
        <link rel="stylesheet" href="../css/%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7.css">
        <link rel="stylesheet" href="../css/%D8%B4%D8%A7%D8%B4%D8%A7%D8%AA%20%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7%20.css">
    </head>
    <body>
        <div class="all-element">
            <!--الهيدر-->

            <header class="header">
                <div class="container container1">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-12 col-sm-2">

                                <img src="../img/alogo.png" alt="logo Responsive image" title="مدرسة سعداوي مجاهد الثانوية" class="logo img-fluid ">

                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8  col-sm-8 d-sm-block d-none img-header" >
                                <img src="../img/header.jpg" alt="bacground-header Responsive image" class="background-header img-fluid">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                            <div class="contianer-of-icon-span">
                                <div class="cont-span">
                                    <span class="span1">Email:<?php echo $row['email']; ?></span>
                                    <br>
                                    <span  class="span2">Hotline:<?php echo $row['number']; ?></span>
                                </div>
                                <div class="icon">
                                    <a href="https://www.facebook.com/%D9%85%D8%AF%D8%B1%D8%B3%D8%A9-%D8%B3%D8%B9%D8%AF%D8%A7%D9%88%D9%8A-%D9%85%D8%AC%D8%A7%D9%87%D8%AF-%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A%D8%A9-%D8%A7%D9%84%D9%85%D8%B4%D8%AA%D8%B1%D9%83%D8%A9-%D8%A8%D9%85%D9%8A%D8%AF%D9%88%D9%85-1821554047939510/?epa=SEARCH_BOX" target="_Blank">
                                    <i class="fab fa-facebook-square"></i></a>
                                    <i class="fab fa-twitter-square"></i>
                                    <i class="fab fa-instagram"></i>
                                    <i class="fab fa-youtube"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!---------------------------------------------------------------------------------------------------->
            <!--القائمة-->
            <section class="navbar-header">
                <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                          <li class="nav-item active">
                            <a class="nav-link" href="../index.php">الرئيسية <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="%D8%B9%D9%86%20%D8%A7%D9%84%D9%85%D8%AF%D8%B1%D8%B3%D8%A9.php">عن المدرسة</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="%D8%B1%D8%A4%D9%8A%D8%A9%20%D8%A7%D9%84%D9%85%D8%AF%D8%B1%D8%B3%D8%A9.php">رؤية المدرسة</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             النتيجة
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="<?php echo $rowres['First']; ?>" target="_blank">نتيجة الصف الاول</a>
                              <a class="dropdown-item" href="<?php echo $rowres['second']; ?>" target="_blank">نتيجة الصف الثاني</a>
                              <a class="dropdown-item last-imtes" href="<?php echo $rowres['third']; ?>" target="_blank">نتيجة الصف الثالث</a>
                            </div>
                          </li>
                            <li class="nav-item">
                            <a class="nav-link" href="%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7.php">اتصل بنا</a>
                          </li>
                        </ul>
                      </div>
                </nav>
            </section>
            <!-------------------------------------------------------------------------------------------------->
            <!--اتصل بنا-->
            <section>
                        <div class="contect">
                            <div class="contact-form">
                                <?php if(!empty($Error)){
                                    foreach($Error as $value){?>
                                        <div class="alert alert-danger alert-error error-name" role="alert">
                                            <?php echo $value ; ?>
                                        </div>
                                    <?php }
                                } ?>
                                <?php
                                    if(isset($success)){?>
                                        <div class="alert alert-success alert-dismissible fade show msg-success" role="alert">
                                             <?php echo $success; ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                 </button>
                                                </div>
                                    <?php }
                                ?>
                                <form method='post' action='<?php echo $_SERVER['PHP_SELF']; ?>' class='form-conect'>
                                <div class="container">
                                <h2>اتصل بنا</h2>
                                <div class="input-form">
                                    <div class="form-group">
                                        <div class="input-name ">
                                            <input class="namer"  type="text" name="name" value="<?php if(!empty($name)){
                                                echo $name;
                                            } ?>" placeholder="الاسم">
                                        </div>
                                        <div class="alert alert-danger alert-error error-name" role="alert">
                                              الاسم قصير جدا برجاء ادخال اسم جديد
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-email">
                                            <input class="emailer" type="email" name="email" value="<?php if(!empty($email)){
                                                echo $email;
                                            } ?>" placeholder="الايميل">
                                        </div>
                                        <div class="alert alert-danger alert-error error-email" role="alert">
                                              يجب كتابة الايميل
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-address">
                                            <input class="addresser" type="text" name="address" value="<?php if(!empty($address)){
                                                echo $address;
                                            } ?>" placeholder="العنوان">
                                        </div>
                                        <div class="alert alert-danger alert-error error-address" role="alert">
                                              يجب كتابه العنوان
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-mobile">
                                            <input class="mobiler" type="text" name="mobile" value="<?php if(!empty($phone)){
                                                echo $phone;
                                            } ?>" placeholder="رقم التليفون">
                                        </div>
                                        <div class="alert alert-danger alert-error error-mobile" role="alert">
                                                يجب كتابة رقم الموبايل
                                        </div>
                                    </div>
                                    </div>
                                <div class="area-send">
                                    <div class="text-area">
                                        <div class='form-group'>
                                        <textarea class="messager" placeholder="رسالتك" name="message"><?php if(!empty($msg)){
                                                echo $msg;
                                            } ?></textarea>
                                        <div class="alert alert-danger alert-error error-message" role="alert">
                                                الرساله قصيره جدا
                                        </div>
                                    </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class="send">
                                            <button class='login' type="submit">ارسل</button>
                                        </div>
                                        <div class="alert alert-danger alert-error error-login" role="alert">
                                                برجاء ادخال البيانات صحيحه
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                </div>
            </section>
            <!------------------------------------------------------------------------------------------------>
            <!--العنوان-->
            <section class="address adress-contect-school">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <iframe  class="iframe-contect-school" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3476.847073538829!2d31.16635802419706!3d29.374766608567963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145991ab3060f175%3A0x3eafe87fca1422ee!2z2YXYr9ix2LPZhyDYp9mE2YXYsdit2YjZhSDYs9i52K_Yp9mI2Yog2YXYrNin2YfYryDYp9mE2YXYtNiq2LHZg9ip!5e0!3m2!1sar!2seg!4v1582213559549!5m2!1sar!2seg" width="600" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                        <div class="col">
                            <div class="inforamtion-call inforamtion-call-contect-school">
                                <h2>بيانات الاتصال</h2>
                                <div class="inforamtion-call-small">
                                    <h3>العنوان</h3>
                                    <p><?php echo $row['address']; ?></p>
                                    <h3>الرقم المختصر</h3>
                                    <p><?php echo $row['number']; ?></p>
                                    <h3>البريد الالكتروني</h3>
                                    <p><?php echo $row['email']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!------------------------------------------------------------------------------------------------->
            <!--الفوتر-->
            <footer class="footer footer-contect-school">
                <div class="container">
                    <div class="footer-word">
                        <p> مدرسة سعداوي مجاهد &copy; Copyright  </p>
                        <p>designed by <a href="https://www.facebook.com/profile.php?id=100011445331879" target="_blank" class="designed hvr-pulse">Mahmoud Nasr</a> 2020</p>
                    </div>
                </div>
            </footer>
            <!------------------------------------------------------------------------------------------------>
        </div>
        <script src="../Js/jquery-3.4.1.min.js"></script>
        <script src="../Js/jquery.nicescroll.min.js"></script>
        <script src="../Js/bootstrap.min.js"></script>
        <script src="../Js/javaScript.js"></script>
    </body>
</html>


<?php    }
else{ ?>
    <!DOCTYPE html>
    <html lang="ar">
        <head>
            <title>اتصل بنا</title>
            <link rel="stylesheet" href="../css/closepage.css">
            <link rel="shortcut icon" href="../img/%D8%A7%D9%84%D9%84%D9%88%D8%AC%D9%88%20%D8%A7%D9%84%D8%B1%D8%B3%D9%85%D9%8A.png">
        </head>
        <body>
            <div>
                <img src="../img/%D8%A7%D9%84%D8%B5%D9%8A%D8%A7%D9%86%D8%A9.gif">
            </div>
        </body>
</html>
<?php }
?>
