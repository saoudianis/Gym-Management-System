<?php
error_reporting(0);
session_start();
if($_SESSION['id']=="admin"){
$link= mysqli_connect("localhost","root","","gym");
if ($conn->connect_error) {
   die("Connection failed: " . $link->connect_error);
}
  echo "Connected successfully";
    echo 'PHP version: ' . phpversion();
    
$r= mysqli_query($link,"select * from GYM");
$t = mysqli_query($link,"select * from GYM");

 
    
    
 
    
    

//buttons    
$sqls ="";
    
    
    
if($_POST['addmember']){
    $link= mysqli_connect("localhost","root","","gym");
    $user= mysqli_real_escape_string($link ,$_POST['user']);
$prix= mysqli_real_escape_string($link ,$_POST['prix']);
$tapi= mysqli_real_escape_string($link ,$_POST['tapi']);
$date= mysqli_real_escape_string($link ,$_POST['datee']);
$random= mysqli_real_escape_string($link ,$_POST['random']);//phone number
$id= mysqli_real_escape_string($link ,$_POST['id']);
$FD=mysqli_real_escape_string($link ,$_POST['FD']);
$NL=mysqli_real_escape_string($link ,$_POST['NL']);
$NLP=mysqli_real_escape_string($link ,$_POST['NLP']);
$note=mysqli_real_escape_string($link ,$_POST['note']);   
$img="dfsds ";    
    
    $sqls = "INSERT INTO GYM 
         (user,prix,tapi,datee,random,FD,NL,NLP,note) VALUES ('$user', '$prix','$tapi','$date','$random','$FD','$NL','$NLP','$note') ";

    $exist =mysqli_query($link,$sqls);
    if (!$exist) {
     echo $exist;
}
    header("location: members.php?add=added");
}    
    
    
    

 /*   //Add Button
if($_POST['btnadd']){
    $sqls = "INSERT INTO members 
         (user,prix,tapi,datee,random) VALUES ('$user', '$prix','$tapi','$date','$random') ";

    mysqli_query($link,$sqls);
    header("location: member.php");
} 
   //Edit Button
if($_POST['btnedt']=="Modifer"){
    $link= mysqli_connect("localhost","root","","gym");
    //var
    
    $useru= mysqli_real_escape_string($link ,$_POST['useru']);
$prixu= mysqli_real_escape_string($link ,$_POST['prixu']);
$tapiu= mysqli_real_escape_string($link ,$_POST['tapiu']);
$dateu= mysqli_real_escape_string($link ,$_POST['dateeu']); 
    $id= mysqli_real_escape_string($link ,$_POST['id']);
    //proc
    $sql = "update GYM set user='$useru',prix='$prixu',tapi='$tapiu',datee='$dateu',random='$randomu' where id=$id";
    mysqli_query($link,$sql);
    header("location: members.php?add=edited");
}*/
   //Delete Button
    $id= mysqli_real_escape_string($link ,$_POST['id']);
if($_POST['btndel']){
    $sql = "delete from GYM where id=$id";
    mysqli_query($link,$sql);
    header("location: members.php");
}
}
?>
<html>
    <head> 
        <link href="bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" rel="stylesheet">
         <!-- style -->   
        <style>
/*  stat css */
            
:root {
  --blue: #5e72e4;
  --indigo: #5603ad;
  --purple: #8965e0;
  --pink: #f3a4b5;
  --red: #f5365c;
  --orange: #fb6340;
  --yellow: #ffd600;
  --green: #2dce89;
  --teal: #11cdef;
  --cyan: #2bffc6;
  --white: #fff;
  --gray: #8898aa;
  --gray-dark: #32325d;
  --light: #ced4da;
  --lighter: #e9ecef;
  --primary: #5e72e4;
  --secondary: #f7fafc;
  --success: #2dce89;
  --info: #11cdef;
  --warning: #fb6340;
  --danger: #f5365c;
  --light: #adb5bd;
  --dark: #212529;
  --default: #172b4d;
  --white: #fff;
  --neutral: #fff;
  --darker: black;
  --breakpoint-xs: 0;
  --breakpoint-sm: 576px;
  --breakpoint-md: 768px;
  --breakpoint-lg: 992px;
  --breakpoint-xl: 1200px;
  --font-family-sans-serif: Open Sans, sans-serif;
  --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}

@-ms-viewport {
  width: device-width;
}

figcaption,
footer,
header,
main,
nav,
section {
  display: block;
}

body {
  font-family: Open Sans, sans-serif;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  margin: 0;
  text-align: left;
  color: #525f7f;
  background-color: #f8f9fe;
}

[tabindex='-1']:focus {
  outline: 0 !important;
}

h2,
h5 {
  margin-top: 0;
  margin-bottom: .5rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

dfn {
  font-style: italic;
}

strong {
  font-weight: bolder;
}

a {
  text-decoration: none;
  color: #5e72e4;
  background-color: transparent;
  -webkit-text-decoration-skip: objects;
}

a:hover {
  text-decoration: none;
  color: #233dd2;
}

a:not([href]):not([tabindex]) {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):hover,
a:not([href]):not([tabindex]):focus {
  text-decoration: none;
  color: inherit;
}

a:not([href]):not([tabindex]):focus {
  outline: 0;
}

caption {
  padding-top: 1rem;
  padding-bottom: 1rem;
  caption-side: bottom;
  text-align: left;
  color: #8898aa;
}

button {
  border-radius: 0;
}

button:focus {
  outline: 1px dotted;
  outline: 5px auto -webkit-focus-ring-color;
}

input,
button {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
  margin: 0;
}

button,
input {
  overflow: visible;
}

button {
  text-transform: none;
}

button,
[type='reset'],
[type='submit'] {
  -webkit-appearance: button;
}

button::-moz-focus-inner,
[type='button']::-moz-focus-inner,
[type='reset']::-moz-focus-inner,
[type='submit']::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

input[type='radio'],
input[type='checkbox'] {
  box-sizing: border-box;
  padding: 0;
}

input[type='date'],
input[type='time'],
input[type='datetime-local'],
input[type='month'] {
  -webkit-appearance: listbox;
}

legend {
  font-size: 1.5rem;
  line-height: inherit;
  display: block;
  width: 100%;
  max-width: 100%;
  margin-bottom: .5rem;
  padding: 0;
  white-space: normal;
  color: inherit;
}

[type='number']::-webkit-inner-spin-button,
[type='number']::-webkit-outer-spin-button {
  height: auto;
}

[type='search'] {
  outline-offset: -2px;
  -webkit-appearance: none;
}

[type='search']::-webkit-search-cancel-button,
[type='search']::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

[hidden] {
  display: none !important;
}

h2,
h5,
.h2,
.h5 {
  font-family: inherit;
  font-weight: 600;
  line-height: 1.5;
  margin-bottom: .5rem;
  color: #32325d;
}

h2,
.h2 {
  font-size: 1.25rem;
}

h5,
.h5 {
  font-size: .8125rem;
}

.container-fluid {
  width: 100%;
  margin-right: auto;
  margin-left: auto;
  padding-right: 15px;
  padding-left: 15px;
}

.row {
  display: flex;
  margin-right: -15px;
  margin-left: -15px;
  flex-wrap: wrap;
}

.col,
.col-auto,
.col-lg-6,
.col-xl-3,
.col-xl-6 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}

.col {
  max-width: 100%;
  flex-basis: 0;
  flex-grow: 1;
}

.col-auto {
  width: auto;
  max-width: none;
  flex: 0 0 auto;
}

@media (min-width: 992px) {
  .col-lg-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}

@media (min-width: 1200px) {
  .col-xl-3 {
    max-width: 25%;
    flex: 0 0 25%;
  }
  .col-xl-6 {
    max-width: 50%;
    flex: 0 0 50%;
  }
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  border: 1px solid rgba(0, 0, 0, .05);
  border-radius: .375rem;
  background-color: #fff;
  background-clip: border-box;
}

.card-body {
  padding: 1.5rem;
  flex: 1 1 auto;
}

.card-title {
  margin-bottom: 1.25rem;
}

@keyframes progress-bar-stripes {
  from {
    background-position: 1rem 0;
  }
  to {
    background-position: 0 0;
  }
}

.bg-info {
  background-color: #11cdef !important;
}

a.bg-info:hover,
a.bg-info:focus,
button.bg-info:hover,
button.bg-info:focus {
  background-color: #0da5c0 !important;
}

.bg-warning {
  background-color: #fb6340 !important;
}

a.bg-warning:hover,
a.bg-warning:focus,
button.bg-warning:hover,
button.bg-warning:focus {
  background-color: #fa3a0e !important;
}

.bg-danger {
  background-color: #f5365c !important;
}

a.bg-danger:hover,
a.bg-danger:focus,
button.bg-danger:hover,
button.bg-danger:focus {
  background-color: #ec0c38 !important;
}



a.bg-default:hover,
a.bg-default:focus,
button.bg-default:hover,
button.bg-default:focus {
  background-color: #0b1526 !important;
}

.rounded-circle {
  border-radius: 50% !important;
}

.align-items-center {
  align-items: center !important;
}

@media (min-width: 1200px) {
  .justify-content-xl-between {
    justify-content: space-between !important;
  }
}

.shadow {
  box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
}

.mb-0 {
  margin-bottom: 0 !important;
}

.mr-2 {
  margin-right: .5rem !important;
}

.mt-3 {
  margin-top: 1rem !important;
}

.mb-4 {
  margin-bottom: 1.5rem !important;
}

.mb-5 {
  margin-bottom: 1rem !important;
}

.pt-5 {
  padding-top: 1rem !important;
}

.pb-8 {
  padding-bottom: 2rem !important;
}

.m-auto {
  margin: auto !important;
}


@media (min-width: 1200px) {
  .mb-xl-0 {
    margin-bottom: 0 !important;
  }
}

.text-nowrap {
  white-space: nowrap !important;
}

.text-center {
  text-align: center !important;
}

.text-uppercase {
  text-transform: uppercase !important;
}

.font-weight-bold {
  font-weight: 600 !important;
}

.text-white {
  color: #fff !important;
}

.text-success {
  color: #2dce89 !important;
}

a.text-success:hover,
a.text-success:focus {
  color: #24a46d !important;
}

.text-warning {
  color: #fb6340 !important;
}

a.text-warning:hover,
a.text-warning:focus {
  color: #fa3a0e !important;
}

.text-danger {
  color: #f5365c !important;
}

a.text-danger:hover,
a.text-danger:focus {
  color: #ec0c38 !important;
}

.text-white {
  color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
  color: #e6e6e6 !important;
}

.text-muted {
  color: #8898aa !important;
}

@media print {
  *,
  *::before,
  *::after {
    box-shadow: none !important;
    text-shadow: none !important;
  }
  a:not(.btn) {
    text-decoration: underline;
  }
  p,
  h2 {
    orphans: 3;
    widows: 3;
  }
  h2 {
    page-break-after: avoid;
  }
  @ page {
    size: a3;
  }
  body {
    min-width: 992px !important;
  }
}

figcaption,
main {
  display: block;
}

main {
  overflow: hidden;
}

.bg-yellow {
  background-color: #ffd600 !important;
}

a.bg-yellow:hover,
a.bg-yellow:focus,
button.bg-yellow:hover,
button.bg-yellow:focus {
  background-color: #ccab00 !important;
}



@keyframes floating-lg {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(15px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes floating {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(10px);
  }
  100% {
    transform: translateY(0px);
  }
}

@keyframes floating-sm {
  0% {
    transform: translateY(0px);
  }
  50% {
    transform: translateY(5px);
  }
  100% {
    transform: translateY(0px);
  }
}

[class*='shadow'] {
  transition: all .15s ease;
}

.text-sm {
  font-size: .875rem !important;
}

.text-white {
  color: #fff !important;
}

a.text-white:hover,
a.text-white:focus {
  color: #e6e6e6 !important;
}

[class*='btn-outline-'] {
  border-width: 1px;
}

.card-stats .card-body {
  padding: 1rem 1.5rem;
}

.main-content {
  position: relative;
    box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 1px, rgba(0, 0, 0, 0.07) 0px 2px 2px, rgba(0, 0, 0, 0.07) 0px 4px 4px, rgba(0, 0, 0, 0.07) 0px 8px 8px, rgba(0, 0, 0, 0.07) 0px 16px 16px;
}

@media (min-width: 768px) {
  .main-content .container-fluid {
    padding-right: 39px !important;
    padding-left: 39px !important;
  }
}

.footer {
  padding: 2.5rem 0;
  background: #f7fafc;
}

.footer .copyright {
  font-size: .875rem;
}

.header {
  position: relative;
}

.icon {
  width: 3rem;
  height: 3rem;
}

.icon i {
  font-size: 2.25rem;
}

.icon-shape {
  display: inline-flex;
  padding: 12px;
  text-align: center;
  border-radius: 50%;
  align-items: center;
  justify-content: center;
}

.icon-shape i {
  font-size: 1.25rem;
}

@media (min-width: 768px) {
  @ keyframes show-navbar-dropdown {
    0% {
      transition: visibility .25s, opacity .25s, transform .25s;
      transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
      opacity: 0;
    }
    100% {
      transform: translate(0, 0);
      opacity: 1;
    }
  }
  @keyframes hide-navbar-dropdown {
    from {
      opacity: 1;
    }
    to {
      transform: translate(0, 10px);
      opacity: 0;
    }
  }
}

@keyframes show-navbar-collapse {
  0% {
    transform: scale(.95);
    transform-origin: 100% 0;
    opacity: 0;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

@keyframes hide-navbar-collapse {
  from {
    transform: scale(1);
    transform-origin: 100% 0;
    opacity: 1;
  }
  to {
    transform: scale(.95);
    opacity: 0;
  }
}

p {
  font-size: 1rem;
  font-weight: 300;
  line-height: 1.7;
}
            
/*  main css */
#myInput , #myInputN{
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
label,h3{
    color: white;
            }

.MyForm{
    margin: auto;
  width: 50%;
  border: 3px solid #ddd;
  padding: 10px;
    margin-top: 35px;
    background-color: black;
    
    box-shadow: -5px -5px 30px 5px black, 5px 5px 30px 5px red;
    margin-bottom: 30px;
            }
            body {
    text-align: center;
}
.secondd {
    display: inline-block;
}
.log{
    float: right;
            }
.navbar{
    margin-bottom: 20px;
            }
            html,body { 
                background: url(powert.png);}
.sbg{background-color: #343a40;}
            p{
                margin-bottom: 2px;
                float: left;
            }
            
        </style>
    </head>
     <body>
         <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand"><img src="powert.png" height="50px" width="50px" style="margin-right: 20px">Power Fitness</a>
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
         
      <!-- Button add modal -->
         <?php
         
         $time = getdate();
         $date = $time['mday']."/".$time['mon']."/".$time['year'];
         $m =  $time['mon'];
         
         if($m<12){
             $m=$m+1;
             $fdate = $time['mday']."/".$m."/".$time['year'];
             
         }
         else{if($m>=12){
             $m = 1;
             $fdate = $time['mday']."/".$m."/".$time['year'];
         }}
         
         ?>
         <!-- Modal -->
         <form method="post" action="add.php">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add a new member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Modal body -->
        <p>Member</p>
        <input type="text"  name="user" class="form-control" placeholder="le nom et prenom">
    <p>Prix</p><br>
        <input type="text"  name="prix" class="form-control" placeholder="prix">
    <p>Tapi</p>    <br>
        <input type="text"  name="tapi" class="form-control" placeholder="Tapi">
   <p>Date</p><br>
        <input type="text"  name="datee" class="form-control" placeholder="La date" value="<?= $date?>">
    <p>Telephone</p><br>
        <input type="text"  name="random" class="form-control" placeholder="Numero Telephone">
    <p>Final Date</p><br>
        <input type="text" name="FD" class="form-control" placeholder="final date" value="<?= $fdate?>"> 
          <p>Number of Lessons</p><br>
        <input type="text" name="NL" class="form-control" placeholder="number of lessons"> 
        <p>Played number of lessons</p><br>
        <input type="text" name="NLP" class="form-control" placeholder="played" value="1">  
        <p>note</p><br>
        <input type="text" name="note" class="form-control" placeholder="note" value="...">  
          
          <!-- //Modal body -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="addmember">Add new</button>
      </div>
    </div>
  </div>
</div>
         </form>
         <!-- //Button add modal -->
         
         
         
<form method="post" class="secondd" action="edit.php">
    <div class="MyForm">
    <label>Member</label>
        <input type="text" id="user" name="useru" class="form-control" placeholder="le nom et prenom">
    <label>Prix</label><br>
        <input type="text" id="prix" name="prixu" class="form-control" placeholder="prix">
    <label>Tapi</label>    <br>
        <input type="text" id="tapi" name="tapiu" class="form-control" placeholder="Tapi">
    <label>Date</label><br>
        <input type="text" id="date" name="dateeu" class="form-control" placeholder="La date">
    <label>Telephone</label><br>
        <input type="text" id="tel" name="randomu" class="form-control" placeholder="Numero Telephone">
    
        <input type="hidden" id="id" name="id" class="form-control" placeholder="Ne Touche Pas"><br>
    
        
        <input type="button" data-toggle="modal" data-target="#exampleModal" value="Ajouter" class="btn btn-success"/>
        <input type="submit" name="btnedt" value="Modifer" class="btn btn-primary"/>
        <input type="submit" name="btndel" value="Supp" class="btn btn-danger"/>
        
    
    </div>
    
    
    
    
    
    
    <!-- statistiques -->
        <?php
        $i=0;
        while ($row = mysqli_fetch_array($t))
        {
            $i++;
        }
       
        ?>
    
   
  <div class="main-content">
    <div class="header bg-gradient-primary pb-8 pt-12 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5">Stats Card</h2>
        <div class="header-body">
          <div class="row">
              
            <div class="col-xl-12 col-lg-12 center" align="center">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Les Members</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $i ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
            <div class="row">
            <div class="col">
      <div>
        <h3 style="color:#32325d">Avec Le Numero</h3>    
    <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Chercher Avec Le Numero ..." title="Type in a name" class="form-control">
    </div>
    </div>
                
            
            </div>
            
            <div class="row">
            <div class="col">
     <div>
        <h3 style="color:#32325d">Avec Le nom Et Le prenom</h3>    
    <input type="text" id="myInputN" onkeyup="myFilterN()" placeholder="Chercher Avec Le nom Et Le prenom ..." title="Type in a name" class="form-control">
    </div>
    </div>
                
            
            </div>
        </div>
      </div>
    </div>
    </div>
    
    <!--end stat  -->
    
    
    
    <br><br>
    <table id="info" class="table align-middle mb-0 bg-white">
    <tr class="header">
        <th scope="col">ID</th>
        <th scope="col">Pic</th>
        <th scope="col">Member</th>
        <th scope="col">Prix</th>
        <th scope="col">Tapi</th>
        <th scope="col">Date</th>
        <th scope="col">Telephone</th>
        <th scope="col">statu</th>
        <th scope="col">Info</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($r))
        {
            $tel = "0".$row["random"];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            
             if(empty($row["img"])){
                          $img= '<img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle imgP" width="150" style="width: 45px; height: 45px">';
                          }
                          else{
                              $img="Uimages/".$row["img"];
                              $img = '<img src="'.$img.'" alt="Admin" class="rounded-circle imgP" width="150" style="width: 45px; height: 45px">';
                          }
            echo "<td>" . $img . "</td>";
            echo "<td>" . $row["user"] . "</td>";
            echo "<td>" . $row["prix"] . "</td>";
            echo "<td>" . $row["tapi"] . "</td>";
            echo "<td>" . $row["datee"] . "</td>";
            echo '<td>' . $tel . '</td>';
            
            //subs stat
            $time = getdate();
                       $date = $time['year']."/".$time['mon']."/".$time['mday'];
                          $year=$time['year'];
                          $mon=$time['mon']; //realtime
                          $day=$time['mday'];
                          
                          
                          $FDS=list($d, $m, $y) = explode('/', $row["FD"]); //final date
                          $FDD = $y."/".$m."/".$d;//tratib
                          $FDD = strtotime($FDD);//php time format
                          $dated = strtotime($date);//php time format
                         
                          if($FDD>=$dated){$stat= '<span class="badge badge-success rounded-pill d-inline">Active</span>';}
                          else{
                          $stat= '<span class="badge badge-danger rounded-pill d-inline">Expired</span>';
                          }
            
            
            echo "<td>" . $stat . "</td>";
            
            
            
            
            
            
            
            
            $infoid = $row["id"];
            echo '<td><a href="info.php?id='.$infoid.'" target="_blank"><button type="button" class="btn btn-info">Info</button></a> </td>';
            echo "</tr>";
        }
        ?>
    </table>

</form>

<script>
var tbl = document.getElementById('info');
    for(var i=1; i<tbl.rows.length;i++){
        tbl.rows[i].onclick=function(){
            
         document.getElementById("id").value = this.cells[0].innerHTML;
          
         
         document.getElementById("user").value = this.cells[2].innerHTML; 
            
        document.getElementById("prix").value = this.cells[3].innerHTML;   
        document.getElementById("tapi").value = this.cells[4].innerHTML; 
        document.getElementById("date").value = this.cells[5].innerHTML; 
        document.getElementById("tel").value = this.cells[6].innerHTML; 
         
        }
    }

    
    function myFilter() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("info");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
    
    function myFilterN() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputN");
  filter = input.value.toUpperCase();
  table = document.getElementById("info");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
         
         <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
         
    </body>
