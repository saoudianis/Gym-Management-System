<?php
//up img

if(isset($_POST['submitP'])){
    
   $myfile = $_FILES['Pic']; 
    $pname = rand(1000,10000)."-".$myfile['name'];
    $tname = $myfile['tmp_name'];
    
    
    $fileN = "Uimages" ;
    
    move_uploaded_file($tname,$fileN.'/'.$pname);
    $link= mysqli_connect("localhost","root","","gym");
    $id=$_GET['id'];
    $sql = "UPDATE GYM SET img='$pname' WHERE GYM.id='$id'";
    mysqli_query($link,$sql);

    
}




//edt
if(isset($_POST['edit'])){
    $link= mysqli_connect("localhost","root","","gym");
    $note= mysqli_real_escape_string($link ,$_POST['note']);
    $final= mysqli_real_escape_string($link ,$_POST['final']);
    $id=$_GET['id'];
    $sql = "UPDATE GYM SET note='$note',FD='$final' WHERE GYM.id='$id'";
    mysqli_query($link,$sql);
}
//normal
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $link= mysqli_connect("localhost","root","","gym");
    $sql="select * from GYM where id=$id";
   $res= mysqli_query($link,$sql); 
    $all= mysqli_fetch_array($res);
    
    $NLP = $all["NLP"]; //number of lessons he already played
    $NL = $all["NL"];  //number of lessons
    $NLR= $NL - $NLP;  //number of lessons rest
    $note=$all["note"];
    $DD=$all["datee"];
    $FD=$all["FD"];
    $tel=$all["random"];
    $user=$all["user"];
    $prix=$all["prix"];
    $tapi=$all["tapi"];
    $img=$all["img"];
    
}
?>

<html>
    <head> 
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
         <!-- style -->   
      <style>
        body{
    
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
          
          
          
          
          .container2 {
  position: relative;
  margin-top: 50px;
  width: 200px;
  height: 200px;
              
}

.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0);
  transition: background 0.5s ease;
    border-radius: 50%;
}

.container2:hover .overlay {
  display: block;
  background: rgba(0, 0, 0, .3);
}

.imgP {
  position: absolute;
  width: 200px;
  height: 200px;
  left: 0;
}

.title {
  
}

.container2:hover .button {
  top: 90px;
}

.button {
   
    
  position: absolute;
  width: 200px;
  left:0;
  top: 180px;
  text-align: center;
  opacity: 0;
  transition: opacity .35s ease;
    transition: top .5s ease;
}

.button a {
  width: 200px;
  padding: 12px 48px;
  text-align: center;
  color: white;
  border: solid 2px white;
  z-index: 1;
}

.container2:hover .button {
  opacity: 1;
}

        </style>
    </head>
     <body>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand"><img src="F+y.png" height="50px" width="50px" style="margin-right: 20px">Force Plus</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item log">
                    <a href="index.php?logout=1" class="nav-link">LogOut</a>
                </li>
                
            </ul>
        </div>

    </nav>
         
         <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <form method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="Pic" id="fileToUpload">
  

        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submitP">Save changes</button>
      </div></form></div>
    </div>
  </div>
</div>
         
         
         
         <!-- Container -->
         <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Users</li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                      
                      
                      <div class="container2">
                          <?php
                          if(empty($img)){
                          echo'<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle imgP" width="150">';
                          }
                          else{
                              $img="Uimages/".$img;
                              echo'<img src="'.$img.'" alt="Admin" class="rounded-circle imgP" width="150">';
                          }
                          ?>
                       
                      
  <div class="overlay"></div>
  <div class="button"><a href="#" data-toggle="modal" data-target="#exampleModal"> Edit </a></div>
                      </div>
                      
                      
                      
                      
                    <div class="mt-3">
                      <h4><?= $user?></h4>
                      <p class="text-secondary mb-1">Start date: <?= $DD?></p>
                      <p class="text-muted font-size-sm">End date: <?= $FD?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Phone Number:</h6>
                    <span class="text-secondary">0<?= $tel?></span>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $user?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Price</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $prix?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tapi</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $tapi?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <?php
                        $time = getdate();
                       $date = $time['year']."/".$time['mon']."/".$time['mday'];
                          $year=$time['year'];
                          $mon=$time['mon']; //realtime
                          $day=$time['mday'];
                          
                          
                          $FDS=list($d, $m, $y) = explode('/', $FD); //final date
                          $FDD = $y."/".$m."/".$d;//tratib
                          $FDD = strtotime($FDD);//php time format
                          $dated = strtotime($date);//php time format
                         
                          if($FDD>=$dated){$status= '<p style="color:green">His subscription is still</p>';}
                          else{
                          $status = '<p style="color:red">His subscription has expired</p>';
                          }
                          
                        ?>
                        
                      <h6 class="mb-0">status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $status?>
                    </div>
                  </div>
                  <hr><form method="post">
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Final Date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                          <input type="text" value="<?= $FD?>" name="final">
                    </div>
                  </div>
                    <hr>
                    
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">note</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                          <textarea name="note"><?= $note?></textarea>
                    </div>
                  </div>
                  <hr>
                 
                  <div class="row">
                    <div class="col-sm-12">
                      <input class="btn btn-info" type="submit" name="edit" value="edit">
                    </div>
                  </div></form>
                </div>
              </div>

            



            </div>
          </div>

        </div>
    </div>
         
         
         
         
         <div class="container">
  <div class="row">
      <input type="hidden" value="<?=$id?>" id="mid">
      <?php
      for($i=1; $i<= $NLP ;$i++){
                              
             echo '<div class="col-md-2 .col-lg-2 .col-sm-3">
      <img id="right" src="imgs/right.png" alt="..." class="img-thumbnail" onclick="mypic(this)">
      </div>';               
      }
      for($i=1; $i<= $NLR ;$i++){
                              
             echo '<div class="col-md-2 .col-lg-2 .col-sm-3">
      <img id="wrong" src="imgs/wrong.png" alt="..." class="img-thumbnail" onclick="mypic(this);">
      </div>';               
      }
      
      ?>
      
     
      
             </div>
         </div>
         
         
         
         
         
         
         
         
         
         
         
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
         
         <script src="jquery-3.5.1.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
         
        <script>
         function mypic(typ) {
             var pid = typ.id;
             
           var scan = pid.substr(0, 5);
             
             
             if(typ.id=="right"){
                 
                 document.getElementById(pid).src ='imgs/wrong.png';
                 document.getElementById(pid).id = 'wrong';
                postwrong();
                 
             }
             if(typ.id=="wrong"){
                 
                 document.getElementById(pid).src ='imgs/right.png';
                 document.getElementById(pid).id = 'right';
                postright();
                 
             }
     
}
             
             function postright() { 
                var lol = $('#mid').val();
              var user = document.getElementById("mid").value;
                 var proc = 1;
                  var gurl = "lessons.php?user="+user+"&proc="+proc;
                 
                 
        $.ajax({
                url: 'lessons.php',
                method: 'POST',
                action:'lessons.php',
            dataType:'json',
                data: {'user':user,'proc':proc},
                cache: false,
                success: function(response) {
        // some debug could be here
    },
    error: function(a,b,c) {
        // some debug could be here
    }  
               });
             }
             
           function postwrong() { 
               
              var user = document.getElementById("mid").value;
                 var proc = 0;
               var gurl = "lessons.php?user="+user+"&proc="+proc;
               
        $.ajax({
                url: "lessons.php",
                method: 'POST',
                data: {'user':user,'proc':proc},
                success:function(response){
                  
                    
                    
                }
            });
             }   
         </script>
    </body>
</html>
