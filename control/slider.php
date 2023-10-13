<?php
     session_start();
    if(isset($_SESSION['username'])){
        include "init.php";
    date_default_timezone_set('EET');
   ?>
    <a href="?action=addmain&idmain=2"><div class="btn btn-info btn-slidermain" >اضافة سليدر ثابت</div></a>
    <a href="?action=add"><div class="btn btn-primary btn-slider" >اضافة سليدر</div></a>
    <?php
                $stc_sel=$con->prepare("SELECT * FROM sliderstc ");
                $stc_sel->execute();
                $stc_fetch=$stc_sel->fetch();
        if(@$_REQUEST['action']=="addmain"){
            $stc_id=$_GET['idmain'];
            if(isset($stc_id)&&is_numeric($stc_id)){
                $stc_slid=$con->prepare("SELECT * FROM sliderstc WHERE id='".$stc_id."'");
                $stc_slid->execute();
                $stc_fetch=$stc_slid->fetch();
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $stc_news=$_POST['slidernewsstatic'];
                $stc_img=$_FILES['slideimgstatic']['name'];
                $stc_folder_edit='';
                $stc_error_news='';
                $stc_time=date("Y-m-d h:i:s");
                if($stc_img==''){
                    $stc_folder_edit=$stc_fetch['img'];
                }else{
                    $stc_new_img=$_FILES['slideimgstatic']['name'];
                    $stc_tmp=$_FILES['slideimgstatic']['tmp_name'];
                    $stc_folder_edit='source/'.$stc_img;
                    move_uploaded_file($stc_tmp,$stc_folder_edit);
                }

                if($stc_news==''){
                    $stc_error_news=" برجاء تعديل الخبر";
                }
                if(empty($stc_error_news)){
                    $stc_ins=$con->prepare("UPDATE sliderstc SET img=?,news=?,date=? WHERE id=2");
                    $stc_ins->execute(array($stc_folder_edit,$stc_news,$stc_time));
                    $stc_success="تم الحفظ بنجاح";
                    echo "<meta http-equiv='refresh' content='1;url=slider.php?action=addmain&idmain=2'>";
                }

            }

        ?>
                <form class='form-slider' method="post" action='' enctype='multipart/form-data'>
                          <div class="slider-content">
                                <div class="form-group group-slider1">
                                        <label class='col-4 label-slider'>اضافة الخبر</label>
                                        <div class='col-4'>
                                            <input type="text" name="slidernewsstatic" value="<?php echo $stc_fetch['news']; ?>" class='form-control input-slider' autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group group-slider2">
                                         <label class='col-4 label-slider'>اضافة الصورة</label>
                                        <div>
                                            <input type="file" name="slideimgstatic" class='file-slider'>
                                            <input type="file" name="slideimgstatic1" class='file-slider' hidden value='<?php echo $stc_fetch['img'];?>'>
                                        </div>
                                    </div>
                                    <input class='btn btn-danger submit-slider' type="submit" value='حفط'>
                          </div>
                    </form>
        <?php
                if(!empty($stc_error_news)){ ?>
                    <div class="alert alert-danger alert-dismissible slider-edit-success fade show" role="alert">
                          <?php echo $stc_error_news; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                    </div>

            <?php
            }
                 if(isset($stc_success)){ ?>
                    <div class="alert alert-success alert-dismissible slider-add-success fade show" role="alert">
                      <?php echo $stc_success; ?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                   <?php
                }
            if(isset($edit_sucess)){ ?>
                                <div class="alert alert-success alert-dismissible slider-edit-success fade show" role="alert">
                                  <?php echo $edit_sucess; ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                        <?php }
            }
            while($stc_fetch=$stc_sel->fetch()){ ?>
                    <div class="alert alert-info slider-news" role="alert">
                        <p><?php echo $stc_fetch['news']; ?></p>
                        <img src="<?php echo $stc_fetch['img']; ?>" class='img-database1'>
                        <p class="date-stc"><?php echo $stc_fetch['date']; ?></p>
                    </div>
                <?php }
            }
            ?>


        <?php
            if(@$_REQUEST['action']=="add"){
                  if($_SERVER['REQUEST_METHOD']=="POST"){
                $slidernews=$_POST['slidernews'];
                $slider_img=$_FILES['slideimg']['name'];
                $slider_temp=$_FILES['slideimg']['tmp_name'];
                $slide_floder="source/".$slider_img;
                $dateadd=date('Y-m-d h:i:s');
                $errorslider="";
                move_uploaded_file($slider_temp,$slide_floder);
                if($slidernews==''||$slider_img==''){
                    $errorslider="يجب ادخال الخبر والصورة";
                }
                if(empty($errorslider)){
                    $ins_slider=$con->prepare("INSERT INTO slider(img,news,date) VALUES('$slide_floder','$slidernews','$dateadd')");
                    $ins_slider->execute();
                    $suecssslider="تم الحفظ بنجاح";
                    echo "<meta http-equiv='refresh' content='1;url=slider.php?action=add'>";

                }

            }
?>

                    <form class='form-slider' method="post" action='' enctype='multipart/form-data'>
                          <div class="slider-content">
                        <div class="form-group group-slider1">
                                <label class='col-4 label-slider'>اضافة الخبر</label>
                                <div class='col-4'>
                                    <input type="text" name="slidernews" value="<?php if(!empty($slidernews)){ echo $slidernews; } ?>" class='form-control input-slider' autofocus>
                                </div>
                            </div>
                            <div class="form-group group-slider2">
                                 <label class='col-4 label-slider'>اضافة الصورة</label>
                                <div>
                                    <input type="file" name="slideimg" class='file-slider'>
                                </div>
                            </div>
                            <input class='btn btn-danger submit-slider' type="submit" value='حفط'>
                          </div>
                    </form>

            <?php

              if(!empty($errorslider)){ ?>
                    <div class="alert alert-danger alert-dismissible slider-add-alert fade show" role="alert">
                      <?php echo $errorslider; ?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
              <?php }
                    if(isset($suecssslider)){ ?>
                    <div class="alert alert-success alert-dismissible slider-add-success fade show" role="alert">
                      <?php echo $suecssslider; ?>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                   <?php
                }
                $showslider=$con->prepare("SELECT * FROM slider");
                $showslider->execute();
                $fetchslider=$showslider->fetch();
                while($fetchslider=$showslider->fetch()){ ?>
                    <div class="alert alert-info slider-news" role="alert">
                        <p><?php echo $fetchslider['news']; ?></p>
                        <img src="<?php echo $fetchslider['img']; ?>" class='img-database'>
                        <a href='?action=edit&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-success slider-update'>تعديل</div></a>
                        <a href='?action=delete&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-danger slider-remove'>حذف</div></a>
                         <p class='date'><?php echo $fetchslider['date']; ?></p>
                    </div>
        <?php    }

            }

                if(@$_REQUEST['action']=='edit'){
                    $slider_id=$_GET['id'];
                    $sel_info_slider=$con->prepare("SELECT * FROM slider WHERE id=?");
                    $sel_info_slider->execute(array($slider_id));
                    $fetch_info=$sel_info_slider->fetch();
                    if(isset( $slider_id)&&is_numeric( $slider_id)){
                         if($_SERVER['REQUEST_METHOD']=='POST'){
                                $editnews=$_POST['slidereditnews'];
                                $edit_img_exists=$_FILES['slideimgedit']['name'];
                                $erroredit='';
                                $folder_edit;
                                $dateedit=date('Y-m-d h:i:s');

                                if($edit_img_exists==''){
                                    $folder_edit= $fetch_info['img'];
                                }else{
                                    $editnewimg=$_FILES['slideimgedit']['name'];
                                    $tmp_edit=$_FILES['slideimgedit']['tmp_name'];
                                    $folder_edit="source/".$editnewimg;
                                    move_uploaded_file($tmp_edit,$folder_edit);
                                }

                            if($editnews==''){
                                $erroredit="برجاء تعديل الخبر";
                            }
                            if(empty($erroredit)){
                                $edit_silder=$con->prepare("UPDATE slider SET img=?,news=?,date=? WHERE id='".$slider_id."'");
                                $edit_silder->execute(array($folder_edit,$editnews,$dateedit));
                                $edit_sucess="تم التعديل بنجاح";
                                echo "<meta http-equiv='refresh' content='1;url=?actin=add' />";
                            }

                            }
                        ?>
                        <form class='form-slider' method="post" action='' enctype='multipart/form-data'>
                          <div class="slider-content">
                        <div class="form-group group-slider1">
                                <label class='col-4 label-slider'>تعديل الخبر</label>
                                <div class='col-4'>
                                    <input type="text" name="slidereditnews" class='form-control input-slider' value='<?php echo $fetch_info['news']; ?>' autofocus>
                                </div>
                            </div>
                            <div class="form-group group-slider2">
                                 <label class='col-4 label-slider'>تعديل الصورة</label>
                                <div>
                                    <input type="file" name="slideimgedit" class='file-slider'>
                                    <input type="file" name="slideimgexists" class='file-slider' value='<?php echo $fetch_info['img'] ?>' hidden>
                                </div>
                            </div>
                            <input class='btn btn-success submit-slider' type="submit" value='تعديل'>
                          </div>
                    </form>

                        <?php
                            if(!empty($erroredit)){ ?>
                                <div class="alert alert-danger alert-dismissible slider-edit-alert fade show" role="alert">
                                  <?php echo $erroredit; ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                    <?php }
                            if(isset($edit_sucess)){ ?>
                                <div class="alert alert-success alert-dismissible slider-edit-success fade show" role="alert">
                                  <?php echo $edit_sucess; ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                        <?php }
                     }
                    $showslider=$con->prepare("SELECT * FROM slider");
                $showslider->execute();
                $fetchslider=$showslider->fetch();
                while($fetchslider=$showslider->fetch()){ ?>
                    <div class="alert alert-info slider-news" role="alert">
                        <p><?php echo $fetchslider['news']; ?></p>
                        <img src="<?php echo $fetchslider['img']; ?>" class='img-database'>
                        <a href='?action=edit&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-success slider-update'>تعديل</div></a>
                        <a href='?action=delete&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-danger slider-remove'>حذف</div></a>
                         <p class='date'><?php echo $fetchslider['date']; ?></p>
                    </div>
        <?php    }

                }

                            if(@$_REQUEST['action']=='delete'){
                                $deletslider=$_GET['id'];
                                $del_sel=$con->prepare("SELECT * FROM slider WHERE id='".$deletslider."'");
                                $del_sel->execute();
                                $del_fetch=$del_sel->fetch();
                                 if($_SERVER['REQUEST_METHOD']=='POST'){
                                    $del_news=$_POST['sliderdelnews'];
                                    $del_img=$_FILES['slideimgdel']['name'];
                                    $error_slider_news='';
                                    if($del_news==''){
                                        $error_slider_news="لا يوجد خبر لكي يحذف";
                                    }

                                    if(empty($error_slider_news)){
                                        $delete_slider=$con->prepare("DELETE FROM slider WHERE id='".$deletslider."'");
                                        $delete_slider->execute();
                                        $del_success="تم الحذف بنجاح";
                                        echo "<meta http-equiv='refresh' content='1;url=slider.php?action=add'>";
                                    }
                                }
                                if(isset($deletslider)&&is_numeric($deletslider)){ ?>
                                     <form class='form-slider' method="post" action='' enctype='multipart/form-data'>
                                          <div class="slider-content">
                                        <div class="form-group group-slider1">
                                                <label class='col-4 label-slider'>حذف الخبر</label>
                                                <div class='col-4'>
                                                    <input type="text" name="sliderdelnews" class='form-control input-slider' value='<?php echo $del_fetch['news']; ?>' autofocus>
                                                </div>
                                            </div>
                                            <div class="form-group group-slider2">
                                                 <label class='col-4 label-slider'>حذف الصورة</label>
                                                <div>
                                                    <input type="file" name="slideimgdel" class='file-slider' value='<?php echo $del_fetch['img'] ?>'>
                                                </div>
                                            </div>
                                            <input class='btn btn-danger submit-slider' type="submit" value='حذف'>
                                          </div>
                                    </form>

                                <?php
                                        if(!empty($error_slider_news)){ ?>
                                            <div class="alert alert-danger alert-dismissible slider-del-alert fade show" role="alert">
                                              <?php echo $error_slider_news; ?>
                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                    <?php }
                            if(isset($del_success)){ ?>
                                <div class="alert alert-success alert-dismissible slider-del-success fade show" role="alert">
                                  <?php echo $del_success; ?>
                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                        <?php }
                                        }
                 $showslider=$con->prepare("SELECT * FROM slider");
                $showslider->execute();
                $fetchslider=$showslider->fetch();
                while($fetchslider=$showslider->fetch()){ ?>
                    <div class="alert alert-info slider-news" role="alert">
                        <p><?php echo $fetchslider['news']; ?></p>
                        <img src="<?php echo $fetchslider['img']; ?>" class='img-database'>
                        <a href='?action=edit&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-success slider-update'>تعديل</div></a>
                        <a href='?action=delete&id=<?php echo $fetchslider['id'] ?>'><div class='btn btn-danger slider-remove'>حذف</div></a>
                         <p class='date'><?php echo $fetchslider['date']; ?></p>
                    </div>
        <?php    }

                            }
                    ?>



<?php
    include $temp."footer.php";
        }else{
            header('location:login.php');
        }
?>


