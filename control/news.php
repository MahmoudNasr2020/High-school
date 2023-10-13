<?php
     session_start();
    if(isset($_SESSION['username'])){
        date_default_timezone_set('EET');
    include "init.php";
    $select=$con->prepare("SELECT * FROM news");
    $select->execute();
    $rownews=$select->fetch();
    ?>
       <a href='?action=add'> <div class="btn btn-primary addnews">اضافة خبر</div></a>
    <?php
    if(@$_REQUEST['action']=="add"){ ?>
        <form method="post" action="">
            <div class="form-group group-news">
                <label class="lebal-news col-6">اضافة الخبر</label>
                <div class="news col-4">
                    <input type="text" class="form-control input-news" name="news" autofocus>
                </div>
                <input type="submit" class="btn btn-danger input-submit" value="اضافة" name="add-news">
            </div>
        </form>

 <?php if($_SERVER['REQUEST_METHOD']=="POST"){
        $news=$_POST['news'];
        $errornews='';
        $datetime=date("Y-m-d h:i:s");
        if(strlen($news)==''){
            $errornews="ادخل الخبر";
        }
        if(empty($errornews)){
            $insnews=$con->prepare("INSERT INTO news(news,date) VALUES('$news','$datetime')");
            $insnews->execute();
            $suecssnews="تم اضافة الخبر";
            echo "<meta http-equiv='refresh' content='1;url=news.php' />";

        }
    }

        if(isset($suecssnews)){ ?>
            <div class="alert alert-success alert-dismissible news-alert fade show" role="alert">
                  <?php echo $suecssnews; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
           </div>

        <?php

        }
        if(!empty($errornews)){ ?>
            <div class="alert alert-danger alert-dismissible news-alert fade show" role="alert">
                  <?php echo $errornews; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
           </div>

        <?php

        }
     }

     if(@$_REQUEST['action']=='edit'){
            $idnews=$_GET['id'];
            if(isset($idnews)&&is_numeric($idnews)){
                $selectedit=$con->prepare("SELECT * FROM news WHERE id='".$idnews."'");
                $selectedit->execute();
                $rowedit=$selectedit->fetch();
                ?>
                <form method="post" action="">
                    <div class="form-group edit-news">
                        <label class="lebal-edit col-6">تعديل الخبر</label>
                        <div class="news col-4">
                            <input type="text" class="form-control input-edit" name="editnews" value="<?php echo $rowedit['news']; ?>" autofocus>
                        </div>
                        <input type="submit" class="btn btn-success btn1-edit" value="تعديل" name="edit-news">
                    </div>
                </form>
            <?php
            }
           if($_SERVER['REQUEST_METHOD']=="POST"){
            $editnews=$_POST['editnews'];
            $erroredit='';
            $dateedit=date("Y-m-d h:i:m");
            if(strlen($editnews)==''){
                $erroredit="برجاء تعديل الخبر";
            }
            if(empty($erroredit)){
                $insertedit=$con->prepare("UPDATE news SET news=?,date=? WHERE id='".$idnews."'");
                $insertedit->execute(array($editnews,$dateedit));
                $sucessedit="تم التعديل بنجاح";
                echo "<meta http-equiv='refresh' content='1;url=news.php' />";

            }
        }
         if(isset($sucessedit)){ ?>
             <div class="alert alert-success alert-dismissible news-alert fade show" role="alert">
                  <?php echo $sucessedit; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
           </div>

        <?php
            }
          if(!empty($erroredit)){ ?>
             <div class="alert alert-danger alert-dismissible news-alert fade show" role="alert">
                  <?php echo $erroredit; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
           </div>

        <?php
            }

        }
        if(@$_REQUEST['action']=="delete"){
            $delid=$_GET['id'];
            $seldel=$con->prepare("SELECT * FROM news WHERE id='".$delid."'");
            $seldel->execute();
            $rowdel=$seldel->fetch();
            if(isset($delid)&&is_numeric($delid)){ ?>
                <form method="post" action="">
                    <div class="form-group del-news">
                        <label class="lebal-del col-6">حذف الخبر</label>
                        <div class="news col-4">
                            <input type="text" class="form-control input-del" name="delnews" value="<?php echo $rowdel['news']; ?>" autofocus>
                        </div>
                        <input type="submit" class="btn btn-danger btn-del" value="حذف" name="delete-news">
                    </div>
                </form>
      <?php
         }
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $delete_news=$_POST['delnews'];
                $delerror='';
                if(empty($delete_news)){
                    echo $delerror="لا يوجد خبر لكي يحذف";
                }
                if(empty($delerror)){
                    $delete_sql=$con->prepare("DELETE FROM news WHERE id='".$delid."'");
                    $delete_sql->execute();
                    $suecssdel="تم حذف الخبر";
                    echo "<meta http-equiv='refresh' content='1;url=news.php' />";
                }
            }
            if(isset($suecssdel)){?>
                <div class="alert alert-success alert-dismissible news-alert fade show" role="alert">
                  <?php echo $suecssdel; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
           </div>
    <?php }
            if(!empty($delerror)){?>
                <div class="alert alert-danger alert-dismissible del-alert fade show" role="alert">
                  <?php echo $delerror; ?>
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                </button>
                </div>
    <?php }
        }
        while($rownews=$select->fetch()){ ?>
            <div class="alert alert-info fetch-news" role="alert">
                <?php echo "<p>".$rownews['news']."</p>";
                echo "<a href=?action=edit&id=".$rownews['id']."><div class='btn btn-success update-news'>تعديل</div></a>";
                echo "<a href=?action=delete&id=".$rownews['id']."><div class='btn btn-danger remove-news'>حذف</div></a>";
                echo $rownews['date'];
                ?>
            </div>
        <?php }

    include $temp."footer.php";
        }else{
            header('location:login.php');
        }
?>


