<?php
session_start();


include_once("includes/dbconnection.php");

$user_name = $_SESSION['fullname'];


if (isset($_POST['comment'])) {

    $text_comment  = $_POST['text_comment'];
    $created_date   = date('Y-m-d');
    $mstatus = "yes";
     $query ="INSERT INTO forum(name,created_date,post,status) VALUES('$user_name','$created_date','$text_comment','$mstatus')";

    $chk= mysqli_query($conn,$query);

      
    $query= "SELECT * FROM forum ORDER BY id DESC";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $sn = $row['id'];
    echo $sn;
    $query = "UPDATE forum SET comment_id='$sn' WHERE id ='$sn'";
    $result = mysqli_query($conn,$query);
    
    if($result){
        echo "<script>window.location='user_forum.php'</script>";
    }
  }

?>




<!DOCTYPE html>
<html>
<head>
  <title>Forum</title>
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
            <a class="nav-link" href="submit_complain.php">Complain Box</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="user_forum.php">Forum</a>
          </li>
          
          <?php 
      if(isset($_SESSION['id']) && $_SESSION['id'] !=""){
      ?>
      <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>
      <?php } else{?>
    <li class="nav-item"><a class="nav-link" href="adminlogin.php"></a>
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
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="show_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">All Complains</a>
            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="submit_complain.php" role="tab" aria-controls="v-pills-messages" aria-selected="false">Complain Box</a>

         
      </div>
    </div>

<div class="col-9"><h1>Forum</h1>   
  <div class="row">
    <div class="col-12" >
      <table class="table table-bordered" style="border-color: #000;background-color: #f8f9fa;">
        <thead>
        <tr>
          <th>S.NO.</th>
          <th>Posted Date</th>
          <th>Name</th>
          <th>Post</th>         
          
        </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM forum WHERE status='yes' ORDER BY created_date DESC";
          $result = mysqli_query($conn,$query);
          $sn=1;
          while($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['created_date']; ?></td>
            <td><?php echo $row['name']; ?></td>     
            <td><?php echo $row['post']; ?></td>
            
            <td><a class="btn btn-info" href="user_forum_ex.php?act=del&id=<?php echo $row['id']?>">Go to</a></td>
          </tr>

      <?php 
        $sn++ ;
      } ?>


        </tbody>
      </table>
    </div>
    <div class="col-12">
        
        <form method="post" enctype="multipart/form-data">
            <div class="top-row">
              <div class="field-wrap" >
                <input type="text" name="fullname" id="fullname" value=<?php echo $user_name?>  required autocomplete="off" style="color: rgb(0, 0, 0)" />
              </div>
            </div>
            <div class="top-row">
            <div class="field-wrap" >  
                <!-- <input type="text" name="address" id="address" style="color: rgb(0, 0, 0)"/> -->
                <textarea name="text_comment" id="text_comment" placeholder="Write your comment here..." style="color: rgb(0, 0, 0); background: transparent; border-color: rgb(0, 0, 0); width: 100%; height: 150px;"></textarea>
                <br>
                <input type="submit" class="button button-block" name="comment" value="Comment"  style="width:100px;height:50px;font-size:15px;" >
                <br>
            </div>
              
           </div>
        </form>
  </div>
</div>
  
</div>
  

</div>
    
     
   </div>


<?php
include_once('includes/footer.php')
?>