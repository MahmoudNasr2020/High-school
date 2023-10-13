<?php
    include "control/database.php";
    $select=$con->prepare("SELECT * FROM settingsite");
    $select->execute();
    $row=$select->fetch();
    $sitename=$row['sitename'];
    $active=$row['active'];
    $selabout=$con->prepare("SELECT * FROM aboutschool");
    $selabout->execute();
    $rowabout=$selabout->fetch();
    $selmang=$con->prepare("SELECT * FROM manger");
    $selmang->execute();
    $rowmang=$selmang->fetch();
    $rownews=$con->prepare("SELECT * FROM news");
    $rownews->execute();
    $fetchnews=$rownews->fetch();
    $selres=$con->prepare("SELECT * FROM result WHERE res_id=1");
    $selres->execute();
    $rowres=$selres->fetch();
    $showslider=$con->prepare("SELECT * FROM slider");
    $showslider->execute();
    $fetchslider=$showslider->fetch();
    $stc_slid=$con->prepare("SELECT * FROM sliderstc WHERE id=2");
    $stc_slid->execute();
    $stc_fetch=$stc_slid->fetch();
    if($active==1){ ?>
   <!DOCTYPE html>
    <html lang="ar">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?php echo $sitename; ?></title>
        <link rel="shortcut icon" href="img/%D8%A7%D9%84%D9%84%D9%88%D8%AC%D9%88%20%D8%A7%D9%84%D8%B1%D8%B3%D9%85%D9%8A.png">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/%D8%A7%D9%84%D8%B5%D9%81%D8%AD%D8%A9%20%D8%A7%D9%84%D8%B1%D8%A6%D9%8A%D8%B3%D9%8A%D8%A9.css">
        <link rel="stylesheet" href="css/editorBootstrap.css">
        <link rel="stylesheet" href="css/css3.css">
        <link rel="stylesheet" href="css/hover-min.css">
    </head>
    <body>
        <div class="all-element">
            <!--الهيدر-->

            <header class="header">
                <div class="container container1">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-xs-12 col-sm-2">

                                <img src="img/alogo.png" alt="logo Responsive image" title="مدرسة سعداوي مجاهد الثانوية" class="logo img-fluid ">

                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8  col-sm-8 d-sm-block d-none img-header" >
                                <img src="img/header.jpg" alt="bacground-header Responsive image" class="background-header img-fluid">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 ">
                            <div class="contianer-of-icon-span">
                                <div class="cont-span">
                                    <span class="span1">Email:<?php echo $row['email']; ?></span>
                                    <br>
                                    <span  class="span2">Hotline:<?php echo $row['number']; ?></span>
                                </div>
                                <div class="icon">
                                    <a href='control/login.php' target='_blank'><i class="fab fa-laptop"></i></a>
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
                            <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./html/%D8%B9%D9%86%20%D8%A7%D9%84%D9%85%D8%AF%D8%B1%D8%B3%D8%A9.php">عن المدرسة</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="./html/%D8%B1%D8%A4%D9%8A%D8%A9%20%D8%A7%D9%84%D9%85%D8%AF%D8%B1%D8%B3%D8%A9.php">رؤية المدرسة</a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             النتيجة
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="<?php echo $rowres['First']; ?>" target='_blank'>نتيجة الصف الاول</a>
                              <a class="dropdown-item" href="<?php echo $rowres['second']; ?>" target='_blank'>نتيجة الصف الثاني</a>
                              <a class="dropdown-item last-imtes" href="<?php echo $rowres['third']; ?>" target='_blank'>نتيجة الصف الثالث</a>
                            </div>

                          </li>
                            <li class="nav-item">
                            <a class="nav-link" href="html/%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7.php">اتصل بنا</a>
                          </li>
                        </ul>
                      </div>
                </nav>
            </section>
            <!-------------------------------------------------------------------------------------------------->
            <!--السليدر-->
            <section class="slider-header">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">

                                  <div class="carousel-item active">
                                      <img src="<?php echo "control/".$stc_fetch['img']; ?>" class="d-block w-100" alt="...">
                                      <div class="carousel-caption d-none d-md-block">
                                        <p><?php echo $stc_fetch['news']; ?></p>
                                      </div>
                                </div>
                          <?php
                              while($fetchslider=$showslider->fetch()){ ?>
                                  <div class="carousel-item">
                                      <img src="<?php echo "control/".$fetchslider['img']; ?>" class="d-block w-100" alt="...">
                                      <div class="carousel-caption d-none d-md-block">
                                        <p><?php echo $fetchslider['news'] ?></p>
                                     </div>
                                  </div>
                              <?php }
                          ?>

                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                </div>
            </section>

            <!---------------------------------------------------------------------------------------------------->
            <!--السنين الدراسية-->
            <section class="year">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                                <div class="marquee-news">
                            <div class="marquee">
                                <p>:اخر الاخبار   </p>
                                <marquee direction="right" scrollamount="4"  onmouseover="this.stop()" onmouseout="this.start()" behavior="scroll">
                                    <?php
                                            while($fetchnews=$rownews->fetch()){ ?>
                                                 <a href='#'> <?php echo $fetchnews['news']; ?></a>
                                            <?php }
                                               ?>
                                </marquee>
                            </div>
                        </div>
                        </div>
                </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="first-year">
                                <div class="front-face">
                                <img src="img/%D8%A7%D9%84%D8%A7%D9%88%D9%84%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A.png" alt="الصف الاول الثانوي">
                                <span>سعداوي <br>
                                    مجاهد</span>
                                <p>الصف الاول الثانوي</p>
                                </div>
                                <div class="back-face">
                                    <img src="img/%D8%A7%D9%84%D8%A7%D9%88%D9%84%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A%20%D9%85%D9%83%D8%B1%D8%B1.png">
                                    <div class="h3">
                                    <h3>تهدف المدرسة من هذه المرحلة <br>
                                     اعداد طلاب قادرين علي استيعاب
                                        <br>
                                        وفهم القدر الكافي من المعلومات
                                        <br>
                                        التي ستفيده في المراحل المتقدمة
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="second-year">
                                <div class="front-face">
                                    <img src="img/%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%8A%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A.png" alt="الصف الثاني الثانوي">
                                    <p>الصف الثاني الثانوي</p>
                                </div>
                                <div class="back-face">
                                    <img src="img/%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%8A%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A%202.png">
                                    <div class="h3">
                                    <h3> هدف المدرسة في هذه المرحلة
                                        <br>
                                           هو اعداد الطلاب اعداداً قوياً ومرناً
                                        <br>
                                        للمرحلة النهائية من الثانوية العامة
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col ">
                            <div class="third-year ">
                                <div class="front-face">
                                    <img src="img/%D8%A7%D9%84%D8%AB%D8%A7%D9%84%D8%AB%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A.png" alt="الصف الثاني الثانوي">
                                    <p>الصف الثالث الثانوي</p>
                                </div>
                                <div class="back-face">
                                    <img src="img/%D8%A7%D9%84%D8%AB%D8%A7%D9%84%D8%AB%20%D8%A7%D9%84%D8%AB%D8%A7%D9%86%D9%88%D9%8A%20%D9%85%D9%83%D8%B1%D8%B1.png">
                                    <div class="h3">
                                    <h3>هدف المدرسة في هذه المرحلة
                                        <br>
                                        هو اعداد الطلاب الاعداد الصحيح
                                        <br>
                                        الذي يؤهل الطلاب للمرحلة الجامعية
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!---------------------------------------------------------------------------------------------------->
            <!-- خدمات الموقع-->
            <section class="service">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <a href="html/%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%8A%D9%85%20%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A.php">
                                <div class="eduction">
                                <p>التعليم الالكتروني</p>
                                <img src="img/%D8%A7%D9%84%D8%AA%D8%B9%D9%84%D9%8A%D9%85%20%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A.png" alt='التعليم الالكتروني'>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <a href="https://study.ekb.eg/" target="_blank">
                                <div class="lib">
                                    <p>المكتبة الالكترونية</p>
                                    <img src="img/%D8%A7%D9%84%D9%85%D9%83%D8%AA%D8%A8%D8%A9%20%D8%A7%D9%84%D8%A7%D9%84%D9%83%D8%AA%D8%B1%D9%88%D9%86%D9%8A%D8%A9.png" alt='المكتبة الالكتروني'>
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <a href="html/%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7.php">
                                <div class="call">
                                    <p>اتصل بنا</p>
                                    <img src="img/%D8%A7%D8%AA%D8%B5%D9%84%20%D8%A8%D9%86%D8%A7.png" alt="اتصل بنا">
                                 </div>
                            </a>
                        </div>
                        </div>
                        </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <a href="index.php">
                                <div class="tour">
                                    <P>جولة</P>
                                    <img src="img/%D8%AC%D9%88%D9%84%D8%A9.png" alt="جولة">
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <a href="#">
                                <div class="result" id='result'>
                                    <p>النتيجة</p>
                                    <img src="img/%D8%A7%D9%84%D9%86%D8%AA%D9%8A%D8%AC%D8%A9.png" alt="النتيجة">
                                </div>
                            </a>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <a href='html/%D8%A7%D9%84%D8%BA%D9%8A%D8%A7%D8%A8.php'>
                                <div class="absence">
                                    <p>متابعة الغياب</p>
                                    <img src="img/%D8%A7%D9%84%D8%BA%D9%8A%D8%A7%D8%A8.png" alt="الغياب">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="circle">
                    <span class="text">سعداوي مجاهد</span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="service-web">
                                <p>خدمات الموقع</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!------------------------------------------------------------------------------------------------>
            <!--كلمة المديرة-->
            <section class="manager-location">
                <div class="container">
                    <div class="row">
                        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="manager">
                                <img
                                src="<?php echo "control/".$rowmang['mangerImg']; ?>">
                            </div>
                        </div>
                        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <h2><?php echo $rowmang['mangerAdd']; ?></h2>
                            <div class="manager-words">
                                <?php echo $rowmang['mangerText']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!------------------------------------------------------------------------------------------------>
            <!--العنوان-->
            <section class="address">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3476.847073538829!2d31.16635802419706!3d29.374766608567963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145991ab3060f175%3A0x3eafe87fca1422ee!2z2YXYr9ix2LPZhyDYp9mE2YXYsdit2YjZhSDYs9i52K_Yp9mI2Yog2YXYrNin2YfYryDYp9mE2YXYtNiq2LHZg9ip!5e0!3m2!1sar!2seg!4v1582213559549!5m2!1sar!2seg" width="600" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div>
                        <div class="col">
                            <div class="inforamtion-call">
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
            <footer class="footer">
                <div class="container">
                    <div class="footer-word">
                        <p> مدرسة سعداوي مجاهد &copy; Copyright  </p>
                        <p>designed by <a href="https://www.facebook.com/profile.php?id=100011445331879" target="_blank" class="designed hvr-pulse">Mahmoud Nasr</a> 2020</p>
                    </div>
                </div>
            </footer>
            <!------------------------------------------------------------------------------------------------>
            <!-- صفحه التحميل-->
            <div class="loading">
                <img src="img/loading.png" class="imgload">
            </div>
        </div>
        <script src="Js/jquery-3.4.1.min.js"></script>
        <script src="Js/jquery.nicescroll.min.js"></script>
        <script src="Js/bootstrap.min.js"></script>
        <script src="Js/javaScript.js"></script>
    </body>
</html>

<?php    }
else{ ?>
    <!DOCTYPE html>
    <html lang="ar">
        <head>
            <title><?php echo $sitename; ?></title>
            <link rel="stylesheet" href="css/closepage.css">
            <link rel="shortcut icon" href="img/%D8%A7%D9%84%D9%84%D9%88%D8%AC%D9%88%20%D8%A7%D9%84%D8%B1%D8%B3%D9%85%D9%8A.png">
        </head>
        <body>
            <div>
                <img src="./img/%D8%A7%D9%84%D8%B5%D9%8A%D8%A7%D9%86%D8%A9.gif">
            </div>
        </body>
</html>
<?php }
?>
