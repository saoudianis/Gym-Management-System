<?php

if(isset($_POST['user'])){
    $link= mysqli_connect("localhost","root","","gym");
    if(isset($_POST['proc'])){
        $proc =$_POST['proc'];
        $id = $_POST['user'];
        echo $id.$proc;
        //for more
        if($proc ==1){
            $link= mysqli_connect("localhost","root","","gym");
            $sql="select * from GYM where id=$id";
            $res= mysqli_query($link,$sql); 
    $all= mysqli_fetch_array($res);
    
    $NLP = $all["NLP"]; //number of lessons he already played
$NLP = $NLP+1;
            $sql = "UPDATE GYM SET NLP='$NLP' WHERE GYM.id='$id'";
        mysqli_query($link,$sql);
        }
        //for less
        if($proc ==0){
             $link= mysqli_connect("localhost","root","","gym");
            $sql="select * from GYM where id=$id";
            $res= mysqli_query($link,$sql); 
    $all= mysqli_fetch_array($res);
    
    $NLP = $all["NLP"]; //number of lessons he already played
$NLP--;
            $sql = "UPDATE GYM SET NLP='$NLP' WHERE GYM.id='$id'";
            mysqli_query($link,$sql);
            
        }
    }
}else
{
    header('HTTP/1.1 500 Internal Server Error');
}



?>