<?php
    include "init.php";
    session_start();
    if(isset($_SESSION['username'])){ ?>
        <div class='att'>
        <a href='?action=first'><div class="btn btn-danger btn-att1">الصف الاول</div></a>
        <a href='?action=second'><div class="btn btn-success btn-att2">الصف الثاني</div></a>
        <a href='?action=third'><div class="btn btn-primary btn-att3">الصف الثالث</div></a>
    </div>
    <?php
        if(@$_REQUEST['action']=="first"){ ?>
               <a href='?action=first&type=show1'><div class="btn btn-warning btn-show1">اظهار الغياب</div></a>
                <a href='?action=first&type=insert1'><div class="btn btn-info btn-ins1">ادخال طالب</div></a>
    <?php
        if(@$_REQUEST['type']=='insert1'){
                      if($_SERVER['REQUEST_METHOD']=="POST"){
            $id_std=$_POST['idstd'];
            $name_std=$_POST['namestd'];
            $day_std=$_POST['daystd'];
            $atterror1='';
            if($id_std==''||$name_std==''||$day_std==''){
                $atterror1=' ادخل البيانات كاملة';
            }

            if(empty($atterror1)){
                $selatt1=$con->prepare("SELECT * FROM attfirst WHERE idstd='$id_std'");
                $selatt1->execute();
                $rowatt1=$selatt1->rowCount();
                if($rowatt1>0){
                    $error_id_ex="رقم الطالب موجود بالفعل";
                }
                else{
                    $insatt1=$con->prepare("INSERT INTO attfirst(name,idstd,numberday) VALUES('$name_std','$id_std','$day_std')");
                    $insatt1->execute();
                    $success_att1="تم الحفظ بنجاح";
                    echo "<meta http-equiv='refresh' content='1;url=?action=first&type=show1'>";

                }
            }

        }
        ?>
            <form action="" method="post" class='first-att'>
            <div class="content-of-std">
                <label class="col-6 label-id-std">الرقم التعريفي للطالب</label>
                <div class="col-10">
                    <input class="form-control input-id-std" type="number" name="idstd" value="<?php if(!empty($id_std)){echo $id_std;} ?>">
                </div>
                 <label class="col-6 label-name-std">اسم الطالب</label>
                <div class="col-10">
                    <input class="form-control input-name-std" type="text" name="namestd" value="<?php if(!empty($name_std)){echo $name_std;} ?>">
                </div>
                <label class="col-6 label-day-std">عدد ايام الغياب</label>
                <div class="col-10">
                    <input class="form-control input-day-std" type="number" name="daystd" value="<?php if(!empty($day_std)){echo $day_std;} ?>">
                </div>
                <input type="submit" value="حفظ" class="btn btn-danger std_btn">
            </div>
        </form>
    <?php

            if(isset($error_id_ex)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $error_id_ex ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
                if(isset($success_att1)){ ?>
                    <div class="alert alert-success alert-dismissible fade show alert-att" role="alert">
                      <?php echo $success_att1 ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
             <?php }
            if(!empty($atterror1)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $atterror1 ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
        }
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------الاظهار-----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            if(@$_REQUEST['type']=='show1'){
                 $sle_att1=$con->prepare("SELECT * FROM attfirst");
                $sle_att1->execute();
                $fetch_att1=$sle_att1->fetch();
                /*--------------------------------------------------------------------------------------------------------------------------------------------التعديل----------------------------------------------------*/
                if(@$_REQUEST['do']=="update"){
                    $update1_id=$_GET['id'];
                    $sle_update1=$con->prepare("SELECT * FROM attfirst WHERE idstd='$update1_id'");
                    $sle_update1->execute();
                    $sel_fetch_att1=$sle_update1->fetch();
                    if(isset($update1_id)&&is_numeric($update1_id)){ ?>
                         <form action="" method="post" class='first-att'>
                            <div class="content-of-std">
                                <label class="col-6 label-id-std">تعديل الرقم التعريفي</label>
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_updat" value="<?php echo $sel_fetch_att1['idstd'];  ?>">
                                </div>
                                 <label class="col-6 label-name-std">تعديل الاسم</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_update" value="<?php echo $sel_fetch_att1['name'];  ?>">
                                </div>
                                <label class="col-6 label-day-std">تعديل ايام الغياب</label>
                                <div class="col-10">
                                    <input class="form-control input-day-std" type="number" name="daystd_update" value="<?php echo $sel_fetch_att1['numberday'];  ?>">
                                </div>
                                <input type="submit" value="تعديل" class="btn btn-success std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_updat=$_POST['id_std_updat'];
                        $namestd_update=$_POST['namestd_update'];
                        $daystd_update=$_POST['daystd_update'];
                        $update_error1='';
                        if($id_std_updat==''||$namestd_update==''||$daystd_update==''){
                            $update_error1="يجب ادخال البيانات";
                        }
                        if(empty($update_error1)){
                            $sel_update_att1=$con->prepare("SELECT * FROM attfirst WHERE idstd='$id_std_updat'");
                            $update_att1=$con->prepare("UPDATE attfirst SET name=?,idstd=?,numberday=? WHERE idstd='$update1_id' ");
                            $update_att1->execute(array($namestd_update,$id_std_updat,$daystd_update));
                            $success_update1="تم التعديل بنجاح";
                            echo "<meta http-equiv='refresh' content='1;url=?action=first&type=show1'>";
                        }
                    }

                }

                            /*--------------------------------------------------------------------------------------------------------------------------------------------الحذف----------------------------------------------------*/
                if(@$_REQUEST['do']=="delete"){
                    $del1_id=$_GET['id'];
                    $sle_del1=$con->prepare("SELECT * FROM attfirst WHERE idstd='$del1_id'");
                    $sle_del1->execute();
                    $sel_fetch_att1_del1=$sle_del1->fetch();
                    if(isset($del1_id)&&is_numeric($del1_id)){ ?>
                         <form action="" method="post" class='first-att1-del'>
                            <div class="content-of-std">
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_del" value="<?php echo $sel_fetch_att1_del1['idstd'];  ?>" hidden>
                                </div>
                                 <label class="col-6 label-name-std">حذف الطالب</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_del" value="<?php echo $sel_fetch_att1_del1['name'];  ?>">
                                </div>
                                <input type="submit" value="حذف" class="btn btn-danger std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_del=$_POST['id_std_del'];
                        $namestd_del=$_POST['namestd_del'];
                        $update_error1='';
                        if($id_std_del==''||$namestd_del==''){
                            $update_error1="يجب ادخال البيانات";
                        }
                        if(empty($update_error1)){
                            $sel_del_att1=$con->prepare("DELETE FROM attfirst WHERE idstd='$del1_id'");
                            $sel_del_att1->execute();
                            $success_update1="تم الحذف بنجاح";
                            echo "<meta http-equiv='refresh' content='1;url=?action=first&type=show1'>";
                        }
                    }

                }
                while($fetch_att1=$sle_att1->fetch()){ ?>
                    <div class="alert alert-info alert-show-att1" role="alert">
                        <p class="p-att1"><span class='span-att1'>اسم الطالب : </span> <?php echo $fetch_att1['name']; ?></p>
                        <p class="p-att1"><?php echo $fetch_att1['idstd']; ?> <span class='span-att2'> : رقم التعريف</span></p>
                        <p class="p-att1"><?php echo $fetch_att1['numberday']; ?> <span class='span-att3'> : عدد ايام الغياب</span></p>
                        <a href='?action=first&type=show1&do=update&id=<?php echo $fetch_att1['idstd'] ?>'><div class="btn btn-success update-std">تعديل</div></a>
                        <a href='?action=first&type=show1&do=delete&id=<?php echo $fetch_att1['idstd'] ?>'><div class="btn btn-danger delete-std">حذف</div></a>
                    </div>
                <?php }

                if(!empty($update_error1)){ ?>
                        <div class="alert alert-danger alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $update_error1; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php }
                    if(isset($success_update1)){ ?>
                        <div class="alert alert-success alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $success_update1; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    <?php }

            }
        }
    ?>
 <?php
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------الصف الثاني------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
?>
    <?php
        if(@$_REQUEST['action']=="second"){ ?>
               <a href='?action=second&type=show2'><div class="btn btn-warning btn-show1">اظهار الغياب</div></a>
                <a href='?action=second&type=insert2'><div class="btn btn-info btn-ins1">ادخال طالب</div></a>
    <?php
        if(@$_REQUEST['type']=='insert2'){
                      if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std=$_POST['idstd'];
                        $name_std=$_POST['namestd'];
                        $day_std=$_POST['daystd'];
                        $atterror2='';
                    if($id_std==''||$name_std==''||$day_std==''){
                            $atterror2=' ادخل البيانات كاملة';
                        }

            if(empty($atterror2)){
                $selatt2=$con->prepare("SELECT * FROM attsecond WHERE idstd='$id_std'");
                $selatt2->execute();
                $rowatt2=$selatt2->rowCount();
                if($rowatt2>0){
                    $error_id_ex="رقم الطالب موجود بالفعل";
                }
                else{
                    $insatt2=$con->prepare("INSERT INTO attsecond(name,idstd,numberday) VALUES('$name_std','$id_std','$day_std')");
                    $insatt2->execute();
                    $success_att2="تم الحفظ بنجاح";
                    echo "<meta http-equiv='refresh' content='1;url=?action=second&type=show2'>";

                }
            }

        }
        ?>
            <form action="" method="post" class='first-att'>
            <div class="content-of-std">
                <label class="col-6 label-id-std">الرقم التعريفي للطالب</label>
                <div class="col-10">
                    <input class="form-control input-id-std" type="number" name="idstd" value="<?php if(!empty($id_std)){echo $id_std;} ?>">
                </div>
                 <label class="col-6 label-name-std">اسم الطالب</label>
                <div class="col-10">
                    <input class="form-control input-name-std" type="text" name="namestd" value="<?php if(!empty($name_std)){echo $name_std;} ?>">
                </div>
                <label class="col-6 label-day-std">عدد ايام الغياب</label>
                <div class="col-10">
                    <input class="form-control input-day-std" type="number" name="daystd" value="<?php if(!empty($day_std)){echo $day_std;} ?>">
                </div>
                <input type="submit" value="حفظ" class="btn btn-danger std_btn">
            </div>
        </form>
    <?php

            if(isset($error_id_ex)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $error_id_ex ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
                if(isset($success_att2)){ ?>
                    <div class="alert alert-success alert-dismissible fade show alert-att" role="alert">
                      <?php echo $success_att2 ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
             <?php }
            if(!empty($atterror2)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $atterror2 ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
        }
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------الاظهار-----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            if(@$_REQUEST['type']=='show2'){
                 $sle_att2=$con->prepare("SELECT * FROM attsecond");
                $sle_att2->execute();
                $fetch_att2=$sle_att2->fetch();
                /*--------------------------------------------------------------------------------------------------------------------------------------------التعديل----------------------------------------------------*/
                if(@$_REQUEST['do']=="update"){
                    $update2_id=$_GET['id'];
                    $sle_update2=$con->prepare("SELECT * FROM attsecond WHERE idstd='$update2_id'");
                    $sle_update2->execute();
                    $sel_fetch_att2=$sle_update2->fetch();
                    if(isset($update2_id)&&is_numeric($update2_id)){ ?>
                         <form action="" method="post" class='first-att'>
                            <div class="content-of-std">
                                <label class="col-6 label-id-std">تعديل الرقم التعريفي</label>
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_updat" value="<?php echo $sel_fetch_att2['idstd'];  ?>">
                                </div>
                                 <label class="col-6 label-name-std">تعديل الاسم</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_update" value="<?php echo $sel_fetch_att2['name'];  ?>">
                                </div>
                                <label class="col-6 label-day-std">تعديل ايام الغياب</label>
                                <div class="col-10">
                                    <input class="form-control input-day-std" type="number" name="daystd_update" value="<?php echo $sel_fetch_att2['numberday'];  ?>">
                                </div>
                                <input type="submit" value="تعديل" class="btn btn-success std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_updat=$_POST['id_std_updat'];
                        $namestd_update=$_POST['namestd_update'];
                        $daystd_update=$_POST['daystd_update'];
                        $update_error2='';
                        if($id_std_updat==''||$namestd_update==''||$daystd_update==''){
                            $update_error2="يجب ادخال البيانات";
                        }
                        if(empty($update_error2)){
                            $sel_update_att2=$con->prepare("SELECT * FROM attsecond WHERE idstd='$id_std_updat'");
                            $update_att2=$con->prepare("UPDATE attsecond SET name=?,idstd=?,numberday=? WHERE idstd='$update2_id' ");
                            $update_att2->execute(array($namestd_update,$id_std_updat,$daystd_update));
                            $success_update2="تم التعديل بنجاح";
                            echo "<meta http-equiv='refresh' content='1;url=?action=second&type=show2'>";
                        }
                    }

                }

                            /*--------------------------------------------------------------------------------------------------------------------------------------------الحذف----------------------------------------------------*/
                if(@$_REQUEST['do']=="delete"){
                    $del2_id=$_GET['id'];
                    $sle_del2=$con->prepare("SELECT * FROM attsecond WHERE idstd='$del2_id'");
                    $sle_del2->execute();
                    $sel_fetch_att2_del2=$sle_del2->fetch();
                    if(isset($del2_id)&&is_numeric($del2_id)){ ?>
                         <form action="" method="post" class='first-att1-del'>
                            <div class="content-of-std">
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_del" value="<?php echo $sel_fetch_att2_del2['idstd'];  ?>" hidden>
                                </div>
                                 <label class="col-6 label-name-std">حذف الطالب</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_del" value="<?php echo $sel_fetch_att2_del2['name'];  ?>">
                                </div>
                                <input type="submit" value="حذف" class="btn btn-danger std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_del=$_POST['id_std_del'];
                        $namestd_del=$_POST['namestd_del'];
                        $update_error2='';
                        if($id_std_del==''||$namestd_del==''){
                            $update_error2="يجب ادخال البيانات";
                        }
                        if(empty($update_error2)){
                            $sel_del_att2=$con->prepare("DELETE FROM attsecond WHERE idstd='$del2_id'");
                            $sel_del_att2->execute();
                            $success_update2="تم الحذف بنجاح";
                            //echo "<meta http-equiv='refresh' content='1;url=?action=second&type=show2'>";
                        }
                    }

                }
                while($fetch_att2=$sle_att2->fetch()){ ?>
                    <div class="alert alert-info alert-show-att1" role="alert">
                        <p class="p-att1"><span class='span-att1'>اسم الطالب : </span> <?php echo $fetch_att2['name']; ?></p>
                        <p class="p-att1"><?php echo $fetch_att2['idstd']; ?> <span class='span-att2'> : رقم التعريف</span></p>
                        <p class="p-att1"><?php echo $fetch_att2['numberday']; ?> <span class='span-att3'> : عدد ايام الغياب</span></p>
                        <a href='?action=second&type=show2&do=update&id=<?php echo $fetch_att2['idstd'] ?>'><div class="btn btn-success update-std">تعديل</div></a>
                        <a href='?action=second&type=show2&do=delete&id=<?php echo $fetch_att2['idstd'] ?>'><div class="btn btn-danger delete-std">حذف</div></a>
                    </div>
                <?php }

                if(!empty($update_error2)){ ?>
                        <div class="alert alert-danger alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $update_error2; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php }
                    if(isset($success_update2)){ ?>
                        <div class="alert alert-success alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $success_update2; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    <?php }

            }
        }
?>
     <?php
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------الصف الثالث------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
?>
    <?php
        if(@$_REQUEST['action']=="third"){ ?>
               <a href='?action=third&type=show3'><div class="btn btn-warning btn-show1">اظهار الغياب</div></a>
                <a href='?action=third&type=insert3'><div class="btn btn-info btn-ins1">ادخال طالب</div></a>
    <?php
        if(@$_REQUEST['type']=='insert3'){
                      if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std=$_POST['idstd'];
                        $name_std=$_POST['namestd'];
                        $day_std=$_POST['daystd'];
                        $atterror3='';
                    if($id_std==''||$name_std==''||$day_std==''){
                            $atterror3=' ادخل البيانات كاملة';
                        }

            if(empty($atterror3)){
                $selatt3=$con->prepare("SELECT * FROM attthird WHERE idstd='$id_std'");
                $selatt3->execute();
                $rowatt3=$selatt3->rowCount();
                if($rowatt3>0){
                    $error_id_ex="رقم الطالب موجود بالفعل";
                }
                else{
                    $insatt3=$con->prepare("INSERT INTO attthird(name,idstd,numberday) VALUES('$name_std','$id_std','$day_std')");
                    $insatt3->execute();
                    $success_att3="تم الحفظ بنجاح";
                    echo "<meta http-equiv='refresh' content='1;url=?action=third&type=show3'>";

                }
            }

        }
        ?>
            <form action="" method="post" class='first-att'>
            <div class="content-of-std">
                <label class="col-6 label-id-std">الرقم التعريفي للطالب</label>
                <div class="col-10">
                    <input class="form-control input-id-std" type="number" name="idstd" value="<?php if(!empty($id_std)){echo $id_std;} ?>">
                </div>
                 <label class="col-6 label-name-std">اسم الطالب</label>
                <div class="col-10">
                    <input class="form-control input-name-std" type="text" name="namestd" value="<?php if(!empty($name_std)){echo $name_std;} ?>">
                </div>
                <label class="col-6 label-day-std">عدد ايام الغياب</label>
                <div class="col-10">
                    <input class="form-control input-day-std" type="number" name="daystd" value="<?php if(!empty($day_std)){echo $day_std;} ?>">
                </div>
                <input type="submit" value="حفظ" class="btn btn-danger std_btn">
            </div>
        </form>
    <?php

            if(isset($error_id_ex)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $error_id_ex ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
                if(isset($success_att3)){ ?>
                    <div class="alert alert-success alert-dismissible fade show alert-att" role="alert">
                      <?php echo $success_att3 ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
             <?php }
            if(!empty($atterror3)){ ?>
                <div class="alert alert-danger alert-dismissible fade show alert-att" role="alert">
                  <?php echo $atterror3 ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
             <?php }
        }
        /*-----------------------------------------------------------------------------------------------------------------------------------------------------------------الاظهار-----------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            if(@$_REQUEST['type']=='show3'){
                 $sle_att3=$con->prepare("SELECT * FROM attthird");
                $sle_att3->execute();
                $fetch_att3=$sle_att3->fetch();
                /*--------------------------------------------------------------------------------------------------------------------------------------------التعديل----------------------------------------------------*/
                if(@$_REQUEST['do']=="update"){
                    $update3_id=$_GET['id'];
                    $sle_update3=$con->prepare("SELECT * FROM attthird WHERE idstd='$update3_id'");
                    $sle_update3->execute();
                    $sel_fetch_att3=$sle_update3->fetch();
                    if(isset($update3_id)&&is_numeric($update3_id)){ ?>
                         <form action="" method="post" class='first-att'>
                            <div class="content-of-std">
                                <label class="col-6 label-id-std">تعديل الرقم التعريفي</label>
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_updat" value="<?php echo $sel_fetch_att3['idstd'];  ?>">
                                </div>
                                 <label class="col-6 label-name-std">تعديل الاسم</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_update" value="<?php echo $sel_fetch_att3['name'];  ?>">
                                </div>
                                <label class="col-6 label-day-std">تعديل ايام الغياب</label>
                                <div class="col-10">
                                    <input class="form-control input-day-std" type="number" name="daystd_update" value="<?php echo $sel_fetch_att3['numberday'];  ?>">
                                </div>
                                <input type="submit" value="تعديل" class="btn btn-success std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_updat=$_POST['id_std_updat'];
                        $namestd_update=$_POST['namestd_update'];
                        $daystd_update=$_POST['daystd_update'];
                        $update_error3='';
                        if($id_std_updat==''||$namestd_update==''||$daystd_update==''){
                            $update_error3="يجب ادخال البيانات";
                        }
                        if(empty($update_error3)){
                            $sel_update_att3=$con->prepare("SELECT * FROM attthird WHERE idstd='$id_std_updat'");
                            $update_att3=$con->prepare("UPDATE attthird SET name=?,idstd=?,numberday=? WHERE idstd='$update3_id' ");
                            $update_att3->execute(array($namestd_update,$id_std_updat,$daystd_update));
                            $success_update3="تم التعديل بنجاح";
                            echo "<meta http-equiv='refresh' content='1;url=?action=third&type=show3'>";
                        }
                    }

                }

                            /*--------------------------------------------------------------------------------------------------------------------------------------------الحذف----------------------------------------------------*/
                if(@$_REQUEST['do']=="delete"){
                    $del3_id=$_GET['id'];
                    $sle_del3=$con->prepare("SELECT * FROM attthird WHERE idstd='$del3_id'");
                    $sle_del3->execute();
                    $sel_fetch_att3_del3=$sle_del3->fetch();
                    if(isset($del3_id)&&is_numeric($del3_id)){ ?>
                         <form action="" method="post" class='first-att1-del'>
                            <div class="content-of-std">
                                <div class="col-10">
                                    <input class="form-control input-id-std" type="number" name="id_std_del" value="<?php echo $sel_fetch_att3_del3['idstd'];  ?>" hidden>
                                </div>
                                 <label class="col-6 label-name-std">حذف الطالب</label>
                                <div class="col-10">
                                    <input class="form-control input-name-std" type="text" name="namestd_del" value="<?php echo $sel_fetch_att3_del3['name'];  ?>">
                                </div>
                                <input type="submit" value="حذف" class="btn btn-danger std_btn">
                            </div>
                        </form>
                    <?php }
                    if($_SERVER['REQUEST_METHOD']=="POST"){
                        $id_std_del=$_POST['id_std_del'];
                        $namestd_del=$_POST['namestd_del'];
                        $update_error3='';
                        if($id_std_del==''||$namestd_del==''){
                            $update_error3="يجب ادخال البيانات";
                        }
                        if(empty($update_error3)){
                            $sel_del_att3=$con->prepare("DELETE FROM attthird WHERE idstd='$del3_id'");
                            $sel_del_att3->execute();
                            $success_update3="تم الحذف بنجاح";
                            echo "<meta http-equiv='refresh' content='1;url=?action=third&type=show3'>";
                        }
                    }

                }
                while($fetch_att3=$sle_att3->fetch()){ ?>
                    <div class="alert alert-info alert-show-att1" role="alert">
                        <p class="p-att1"><span class='span-att1'>اسم الطالب : </span> <?php echo $fetch_att3['name']; ?></p>
                        <p class="p-att1"><?php echo $fetch_att3['idstd']; ?> <span class='span-att2'> : رقم التعريف</span></p>
                        <p class="p-att1"><?php echo $fetch_att3['numberday']; ?> <span class='span-att3'> : عدد ايام الغياب</span></p>
                        <a href='?action=third&type=show3&do=update&id=<?php echo $fetch_att3['idstd'] ?>'><div class="btn btn-success update-std">تعديل</div></a>
                        <a href='?action=third&type=show3&do=delete&id=<?php echo $fetch_att3['idstd'] ?>'><div class="btn btn-danger delete-std">حذف</div></a>
                    </div>
                <?php }

                if(!empty($update_error3)){ ?>
                        <div class="alert alert-danger alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $update_error3; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <?php }
                    if(isset($success_update3)){ ?>
                        <div class="alert alert-success alert-dismissible fade show alert-att-edit" role="alert">
                          <?php echo $success_update3; ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                    </div>
                    <?php }

            }
        }
    }
    else{
        header('location:login.php');
    }
    include "include/templates/footer.php";
?>
