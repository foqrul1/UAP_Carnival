<?php 

session_start();
include_once("includes/dbconnection.php");

if(!isset($_SESSION['id'])){
    echo "<script>window.location='user_login.php'</script>";
}

 $id = $_SESSION['id'];


$query= "SELECT * FROM users WHERE id='$id'";
$result= mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
// print_r($row);
// exit();
?>


<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
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
            <a class="nav-link active" href="user_dashboard.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show_complain.php">All Complains</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="submit_complain.php">Complain Box</a>
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



<body style="background-image:url('images/5.jpg'); ;">
  <!-- background-color: #7bdef2 -->
   <div class="bodycontainer">

    <div class="row" style=" height: 500px;">
      <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="user_dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="show_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">All Complains</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="submit_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Complain Box</a>
                     
      </div>
    </div>
      <div class="col-9"> 
  <div class="row" style="/*background-color: #fff*/;">
    <h1>Welcome <?php echo $_SESSION['fullname']?></h1> 
    </div>
  <div class="row">
    <div class="col-8">
      <table class="table table-striped ">
        <tr>
          <th>Name</th><td><?php echo $row['name'];?></td>
        </tr>
        <tr>
          <th>Email Id</th><td><?php echo $row['emailid'];?></td>
        </tr>
        <tr>
          <th>Contact No</th><td><?php echo $row['contactno'];?></td>
        </tr>
        <tr>
          <th>Address</th><td><?php echo $row['address'];?></td>
        </tr>
        <tr>
          <th>Date Of Join</th><td><?php echo $row['created_date'];?></td>
        </tr>
        <tr>
          <th>Status</th><td><?php echo $row['status'];?></td>
        </tr>
        <tr>
          <td colspan="2" align="right">
            <a href="edit_userprofile.php?id=<?php echo $row['id']?>" class="btn btn-info">Edit Profile</a>
          </td>
        </tr>
      </table>
    </div>
    <div class="col-4" style="text-align: right;">
      <img src="profilepics/<?php echo $row['profilepic']?>" height='200' width='200'>
    </div>
  
  </div>

</div>
    </div>
     
   </div>


<?php
include_once('includes/footer.php')
?>