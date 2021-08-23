<?php
$link= mysqli_connect("localhost","root","","gym");
if($_POST['btnedt']){
    
    //var
    
    $useru= mysqli_real_escape_string($link ,$_POST['useru']);
$prixu= mysqli_real_escape_string($link ,$_POST['prixu']);
$tapiu= mysqli_real_escape_string($link ,$_POST['tapiu']);
$dateu= mysqli_real_escape_string($link ,$_POST['dateeu']); 
    $id= mysqli_real_escape_string($link ,$_POST['id']);
    $randomu= mysqli_real_escape_string($link ,$_POST['randomu']);
    //proc
    $sql = "UPDATE GYM SET user='$useru',prix='$prixu',tapi='$tapiu',datee='$dateu',random='$randomu' WHERE GYM.id='$id'";
    
    if ($link->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $link->error;
}
    header("location: members.php");
}
   //Delete Button
    $id= mysqli_real_escape_string($link ,$_POST['id']);
if($_POST['btndel']){
    $sql = "delete from GYM where id=$id";
    mysqli_query($link,$sql);
    header("location: members.php");
}

?>