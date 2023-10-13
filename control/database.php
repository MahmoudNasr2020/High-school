<?php
    $host="mysql:host=localhost;dbname=school";
    $user="root";
    $password='';
    try{
        $con=new PDO($host,$user,$password);
    }catch(PDOException $e){
        echo "Falid".$e->getMessage();
    }
