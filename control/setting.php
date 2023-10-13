<?php
     session_start();
    if(isset($_SESSION['username'])){
        include "init.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $sitename=filter_var($_POST['sitename'],FILTER_SANITIZE_STRING);
        $active=$_POST['active'];
        $siteemail=filter_var($_POST['siteemail'],FILTER_VALIDATE_EMAIL);
        $sitephone=filter_var($_POST['sitephone'],FILTER_SANITIZE_NUMBER_FLOAT);
        $siteaddress=filter_var($_POST['siteaddress'],FILTER_SANITIZE_STRING);
        $error=array();

        if(empty($sitename)||empty($siteemail)||empty($sitephone)||empty($siteaddress)||$siteemail==false){
            $error[]="من فضلك اكمل البيانات";
        }
        if(empty($error)&&$siteemail==!(false)){

            $insert=$con->prepare("UPDATE settingsite SET sitename=?,active=?,email=?,number=?,address=? WHERE site_id=1 ");
            $insert->execute(array($sitename,$active,$siteemail,$sitephone,$siteaddress));
            $sucess='تم تسجيل البيانات بنجاح';
        }


    }
            $select=$con->prepare("SELECT * FROM settingsite");
            $select->execute();
            $row=$select->fetch();
            $siteupdate=$row['sitename'];

?>
    <h2 class="h2setting">اعدادت الموقع</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
            if(!empty($error)){ ?>
                <div class="alert alert-danger errorname" role="alert">
                  <?php
                    foreach($error as $error){
                        echo $error;
                    }
                    ?>
                </div>

           <?php }
            if(isset($sucess)){ ?>
                <div class="alert alert-success alert-dismissible success-setting fade show" role="alert">
                      <?php echo $sucess; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>

        <?php    }
            ?>
        <div class="content-of-setting">
            <label class="col-6 label1">اسم الموقع</label>
            <div class="col-10">
                <input class="form-control input-sitename" type="text" name="sitename"
                       value="<?php  if(isset($siteupdate)){ echo $siteupdate; }  ?>">
            </div>
            <label class="col-6 label-email">الايميل</label>
            <div class="col-10">
                <input class="form-control input-siteemail" type="email" name="siteemail"
                       value="<?php echo $row['email'] ?>">
            </div>
            <label class="col-6 label-phone">الرقم</label>
            <div class="col-10">
                <input class="form-control input-sitephone" type="text" name="sitephone"
                       value="<?php echo $row['number'] ?>">
            </div>
            <label class="col-6 label-address">العنوان</label>
            <div class="col-10">
                <input class="form-control input-siteaddress" type="text" name="siteaddress"
                       value="<?php echo $row['address'] ?>">
            </div>
            <label class="col-6 label2">حاله الموقع</label>
                <select name="active">
                    <?php
                        if($row['active']==1){?>
                            <option value='1'>مفتوح</option>
                            <option value='2'>مغلق</option>
                        <?php }else{ ?>
                            <option value='2'>مغلق</option>
                            <option value='1'>مفتوح</option>
                        <?php }
                    ?>

                </select>
            <input type="submit" value="حفظ" class="btn btn-danger btn-submit-setting">
        </div>
    </form>
<?php
    include "include/templates/footer.php";
        }else{
            header('location:login.php');
        }
?>


