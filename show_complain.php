<?php
session_start();

include_once("includes/dbconnection.php");
if(isset($_REQUEST['del_id']) && $_REQUEST['del_id'] !=""){
    $del_id= $_REQUEST['del_id'];
    echo $del_id;
    $query = "DELETE FROM complain WHERE id='$del_id'";
    $delcouse= mysqli_query($conn,$query);
    if(!$delcouse){
        echo "<script>window.location='show_complain.php'</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>All Complains</title>
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
            <a class="nav-link active" href="show_complain.php">All Complains</a>
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
    <li class="nav-item"><a class="nav-link" href="user_login.php">Log In</a>
      </li>
      <?php }?>
          
        </ul>
      </div>
    </div>
  </header>
</div>



<body style="background-image:url('images/5.jpg'); ;">
  <!-- background-color: #7bdef2 -->
   <div class="bodycontainer">
    <div class="row" style=" height: auto;">
    <div class="col-3" style="border-right: 1px solid #ccc; max-width: 20%;">

      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <a class="nav-link" id="v-pills-home-tab" data-toggle="pill" href="user_dashboard.php" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
            <a class="nav-link active" id="v-pills-messages-tab" data-toggle="pill" href="show_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">All Complains</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="submit_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Complain Box</a>

         
      </div>
    </div>

<div class="col-9"><h1>All Complain</h1>   
  <div class="row">
    <div class="col-12" >
      <table class="table table-bordered" style="border-color: #000;background-color: #f8f9fa;">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Created Date</th>
          <th>Issue</th>
          <th>Description</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $userid=$_SESSION['id'];
            $query = "SELECT * FROM complain WHERE user_id='$userid'";
          $result = mysqli_query($conn,$query);
          $sn=1;
          while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['created_date']; ?></td>
            <td><?php echo $row['issue']; ?></td>
            <td><?php echo $row['description']; ?></td>       
            <td><a class="btn btn-danger" href="show_complain.php?del_id=<?php echo $row['id']?>">Delete</a></td>
          </tr>

      <?php 
        $sn++ ;
      } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>