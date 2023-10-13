<?php
    session_start();
    if(isset($_SESSION['username'])){
        include "init.php";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $addtext=$_POST['addnews'];
        $text=$_POST['textarea'];
        $img_name=$_FILES['img']['name'];
        $img_tmp=$_FILES['img']['tmp_name'];
        $folder_img="source/".$img_name;
         move_uploaded_file($img_tmp,$folder_img);
        if(strlen($addtext)==''){
            $erroradd="ادخل عنوان النص";
        }
        if(strlen($text)==''){
            $errortext="ادخل النص";
        }
        if(strlen( $img_name)==''){
            $errorimg="لا توجد صورة";
        }
        if(empty($erroradd)&&empty($errortext)&&empty($errorimg)){
            $insert=$con->prepare("UPDATE manger SET mangerAdd=?,mangerText=?,mangerImg=? ");
            $insert->execute(array($addtext,$text,$folder_img));
            $success="تم ارسال البيانات بنجاح";

        }
    }
    $selmang=$con->prepare("SELECT * FROM manger");
    $selmang->execute();
    $rowmang=$selmang->fetch();

?>
<?php
    if(isset($erroradd)){ ?>
        <div class="alert alert-danger alert-dismissible danger-add fade show" role="alert">
                      <?php echo $erroradd; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
    <?php }
?>
<?php
    if(isset($errortext)){ ?>
        <div class="alert alert-danger alert-dismissible danger-text fade show" role="alert">
                      <?php echo $errortext; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
    <?php }
?>
<?php
    if(isset($errorimg)){ ?>
        <div class="alert alert-danger alert-dismissible danger-img fade show" role="alert">
                      <?php echo $errorimg; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
    <?php }
?>

<?php
    if(isset($success)){ ?>
        <div class="alert alert-success alert-dismissible success-about fade show" role="alert">
                      <?php echo $success; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
    <?php }
?>


        <h2 class="h2about">مدير المدرسة</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="content-of-about-school">
                <label class="col-6 label-add">عنوان النص</label>
                <div class="col-10">
                    <input class="form-control input-address-news" type="text" name="addnews" value="<?php echo $rowmang['mangerAdd']; ?>">
                </div>
                    <label class="col-6 label2 label-text" >النص</label>
                <div class='col-8'>
                    <textarea name="textarea"><?php echo $rowmang['mangerText']; ?></textarea>
                </div>
                <label class='col-6 label-img'>الصورة</label>
                 <div class="col-6">
                     <input class="fileimg" type="file" name="img" >
                 </div>
                <input type="submit" value="حفظ" class="btn btn-danger danger-about">
            </div>
        </form>

<?php
    include $temp."footer.php";
        }else{
            header('location:login.php');
        }
?>


