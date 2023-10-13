<?php
    $css="layout/css/";
    $js="layout/js/";
    $temp="include/templates/";
    //include
    include "database.php";
    include $temp."header.php";
    if(!(isset($noslide))){
        include $temp."content.php";
    }
