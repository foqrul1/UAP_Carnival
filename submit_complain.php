<?php  

session_start();
/*
if(!isset($_SESSION['id'])){
    echo "<script>window.location='user_login.php'</script>";
}*/

include_once('includes/dbconnection.php');

if (isset($_POST['complain'])) {


  $user_id = $_SESSION['id'];
  $user_name = $_SESSION['fullname'];
  $create_date = date("Y-m-d");
  $issue = $_POST['issue'];
  $description = $_POST['description'];


  if($issue == "Others"){
      $issue = $_POST['extra_input'];
  }

  $query = "INSERT INTO complain(user_id,user_name,issue,created_date,description)
   VALUES('$user_id','$user_name','$issue','$create_date','$description')";

   $q = mysqli_query($conn,$query);
    if($q){
      echo "<script>window.location='show_complain.php'</script>";
   }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Submit Complain</title>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>


<div class="w3-container">
  <header>
    <div class="row" style="padding-top: 20px;">
      <div class="col-5">
        <h1 class="h1" id="logo" style="color: #f3bf9f; font-family: 'Permanent Marker', cursive;">Uap Carnival</h1>
      </div>
      <div class="col-6">
        <ul class="nav nav-tabs" style=" border-bottom: 0px; float: right;">
          <li class="nav-item">
            <a class="nav-link" href="user_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_complain.php">All Complains</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="submit_complain.php">Complain Box</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_forum.php">Forum</a>
          </li>
          <?php 
      if(isset($_SESSION['id']) && $_SESSION['id'] !=""){
      ?>
      <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
      <?php } else{?>
    <!--<li class="nav-item"><a class="nav-link" href="user_login.php">Log In</a>
      </li>-->
        echo "<script>window.location='user_login.php'</script>";
      <?php }?>
          
        </ul>
      </div>
    </div>
  </header>
</div>


<?php
?>
    
<body style="background-image:url('images/5.jpg'); ;">
  <!-- background-color: #7bdef2 -->
   <div class="bodycontainer">

    <div class="row" style=" height: 500px;">
      <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="user_dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="show_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">All Complains</a>
            <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="submit_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Complain Box</a>
                     
      </div>
    </div>
    <div class="col-8">
    <h1>Submit Your Complain</h1>
    <form method="post" enctype="multipart/form-data" style="margin-left: 20px">
        <div class="top-row">
            <div style="">
                <!-- <label>Issue:</label> -->
            </div>
            <div>
                <span style="" >Issue:</span>
                <select name="issue" id="issue">
                    <option value="Religious">Religious</option>
                    <option value="Theift">Theift</option>
                    <option value="Political">Political</option>
                    <option value="Financial">Financial</option>
                    <option value="Rape">Rape</option>
                    <option value="Others">Others</option>
                </select>
                <br>
                <br>
                <input type="text" name="extra_input" id="extra_input" placeholder="If others issue, write here" style="width:250px; height:25px;">
                
            </div>
        </div>
        <br>
        <div class="top-row">
            <div>
                <textarea name="description" id="description" placeholder="Description" style="color: rgb(0, 0, 0); background: transparent; border-color: rgb(0, 0, 0); width: 100%; height: 150px;"></textarea>
            </div>
        </div>
        <div class="top-row">
            <div class="field-wrap"><input type="submit" class="button button-block" name="complain" id="complain" value="Submit"  style="cursive;" ></div>
        </div>
      
    </form>
    
    </div>
    </div>
     
   </div>


<?php
include_once('includes/footer.php')
?>