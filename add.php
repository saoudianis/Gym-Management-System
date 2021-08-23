<?php
$link= mysqli_connect("localhost","root","","gym");

    $user= mysqli_real_escape_string($link ,$_POST['user']);
$prix= mysqli_real_escape_string($link ,$_POST['prix']);
$tapi= mysqli_real_escape_string($link ,$_POST['tapi']);
$date= mysqli_real_escape_string($link ,$_POST['datee']);
$random= mysqli_real_escape_string($link ,$_POST['random']);//phone number

$FD=mysqli_real_escape_string($link ,$_POST['FD']);
$NL=mysqli_real_escape_string($link ,$_POST['NL']);
$NLP=mysqli_real_escape_string($link ,$_POST['NLP']);
$note=mysqli_real_escape_string($link ,$_POST['note']);   
    
    
    $sqls = "INSERT INTO GYM 
         (user,prix,tapi,datee,random,FD,NL,NLP,note) VALUES ('$user', '$prix','$tapi','$date','$random','$FD','$NL','$NLP','$note') ";

    mysqli_query($link,$sqls);
 header("location: members.php?add=added");

?>