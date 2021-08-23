<?php
error_reporting(0);
session_start();
if($_SESSION['id']=="admin"){
$link= mysqli_connect("localhost","root","","gym");

$r= mysqli_query($link,"select * from GYM");
$t = mysqli_query($link,"select * from GYM");

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
    
    
 
    
    

//buttons    
$sqls ="";
    
if($_POST['addmember']){
    $sqls = "INSERT INTO GYM 
         (user,prix,tapi,datee,random,FD,NL,NLP,note) VALUES ('$user', '$prix','$tapi','$date','$random','$FD','$NL','$NLP','$note') ";

    mysqli_query($link,$sqls);
    header("location: member.php");
}    
    
    
    

 /*   //Add Button
if($_POST['btnadd']){
    $sqls = "INSERT INTO members 
         (user,prix,tapi,datee,random) VALUES ('$user', '$prix','$tapi','$date','$random') ";

    mysqli_query($link,$sqls);
    header("location: member.php");
} */
   //Edit Button
if($_POST['btnedt']){
    //var
    
    $useru= mysqli_real_escape_string($link ,$_POST['useru']);
$prixu= mysqli_real_escape_string($link ,$_POST['prixu']);
$tapiu= mysqli_real_escape_string($link ,$_POST['tapiu']);
$dateu= mysqli_real_escape_string($link ,$_POST['dateeu']); 
    $id= mysqli_real_escape_string($link ,$_POST['id']);
    //proc
    $sqls = "update GYM set user='$useru',prix='$prixu',tapi='$tapiu',datee='$dateu',random='$randomu' where id=$id";
    mysqli_query($link,$sqls);
    header("location: member.php");
}
   //Delete Button
    $id= mysqli_real_escape_string($link ,$_POST['id']);
if($_POST['btndel']){
    $sqls = "delete from GYM where id=$id";
    mysqli_query($link,$sqls);
    header("location: member.php");
}
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
    background-color: black;
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
                background: url(coverfp.png);}
.sbg{background-color: #343a40;}
            p{
                margin-bottom: 2px;
                float: left;
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
         <form method="post">
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
         
         
         
<form method="post" class="secondd">
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
    <br><br>
    <div class="sbg">
        <?php
        $i=0;
        while ($row = mysqli_fetch_array($t))
        {
            $i++;
        }
        echo '<h3>Total: '.$i.'</h3>';
        ?>
        
    <div>
        <h3>Avec Le Numero</h3>    
    <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Chercher Avec Le Numero ..." title="Type in a name" class="form-control">
    </div>
    <div>
        <h3>Avec Le nom Et Le prenom</h3>    
    <input type="text" id="myInputN" onkeyup="myFilterN()" placeholder="Chercher Avec Le nom Et Le prenom ..." title="Type in a name" class="form-control">
    </div></div>
    
    <br><br>
    <table id="info" class="table table-dark">
    <tr class="header">
        <th scope="col">ID</th>
        <th scope="col">Member</th>
        <th scope="col">Prix</th>
        <th scope="col">Tapi</th>
        <th scope="col">Date</th>
        <th scope="col">Telephone</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($r))
        {
            $tel = "0".$row["random"];
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["user"] . "</td>";
            echo "<td>" . $row["prix"] . "</td>";
            echo "<td>" . $row["tapi"] . "</td>";
            echo "<td>" . $row["datee"] . "</td>";
            echo '<td>' . $tel . '</td>';
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
          
         
         document.getElementById("user").value = this.cells[1].innerHTML; 
            
        document.getElementById("prix").value = this.cells[2].innerHTML;   
        document.getElementById("tapi").value = this.cells[3].innerHTML; 
        document.getElementById("date").value = this.cells[4].innerHTML; 
        document.getElementById("tel").value = this.cells[5].innerHTML; 
         
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
    td = tr[i].getElementsByTagName("td")[1];
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