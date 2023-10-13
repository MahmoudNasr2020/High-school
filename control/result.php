<?php
    session_start();
    if(isset($_SESSION['username'])){
    include "init.php";
    $selres=$con->prepare("SELECT * FROM result WHERE res_id=1");
    $selres->execute();
    $rowres=$selres->fetch();
?>

    <h2 class="h2-res">النتيجة</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="form-res">
            <div class="group-res">
                <div class="form-group group-res1">
                    <label class="lebal-result-1 col-6">رابط نتيجة الصف الاول</label>
                    <div class="news col-4">
                        <input type="text" class="form-control input-res1" name="res1" value="<?php echo $rowres['First']; ?>">
                        <input type="hidden" class="form-control input-res1" name="resone" value="<?php echo $rowres['First'];?>">
                    </div>
                </div>
                <div class="form-group group-res2">
                    <label class="lebal-result-2 col-6">رابط نتيجة الصف الثاني</label>
                    <div class="news col-4">
                        <input type="text" class="form-control input-res2" name="res2" value="<?php echo $rowres['second'];?>">
                        <input type="hidden" class="form-control input-res2" name="restwo" value="<?php echo $rowres['second'];?>">
                    </div>
                </div>
                <div class="form-group group-res3">
                    <label class="lebal-result-2 col-6">رابط نتيجة الصف الثالث</label>
                    <div class="news col-4">
                        <input type="text" class="form-control input-res3" name="res3" value="<?php echo $rowres['third'];?>">
                        <input type="hidden" class="form-control input-res3" name="resthird" value="<?php echo $rowres['third'];?>">
                    </div>
                </div>
                <input type="submit" class="btn btn-danger input-submit-res" value="حفظ" name="res-submit">
            </div>
        </form>
        <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $res_one =$_POST['res1'];
            $res_two=$_POST['res2'];
            $res_there=$_POST['res3'];
            $error_res="";
            $link_one;
            $link_two;
            $link_there;
            if(empty($res_one)){
                $link_one=$rowres['First'];

            }else{
                $link_one=$res_one;
            }
            if(empty( $res_two)){
                $link_two=$rowres['second'];
            }
            else{
                $link_two=$res_two;
            }
             if(empty($res_there)){
                $link_there=$rowres['third'];
             }
            else{
                $link_there=$res_there;
            }
            if(strlen($res_one)=="" && strlen($res_two)=="" && strlen($res_there)==""){
                $error_res="يجب ادخال رابط النتائج";
            }
            if(empty($error_res)){
                $selres=$con->prepare("UPDATE result SET First=?,second=?,third=?");
                $selres->execute(array($link_one,$link_two,$link_there));
                $successres="تم الحفظ بنجاح";
                //echo "<meta http-equiv='refresh' content='1;url=result.php' />";
            }
            if(!empty($error_res)){ ?>
                        <div class="alert alert-danger alert-dismissible res-alert fade show" role="alert">
                              <?php echo $error_res; ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                      <?php }
            if(!empty($successres)){ ?>
                        <div class="alert alert-success alert-dismissible res-alert fade show" role="alert">
                              <?php echo $successres; ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                      <?php }
     }

    include $temp."footer.php";
    }
    else{
        header('location:login.php');
    }
?>

