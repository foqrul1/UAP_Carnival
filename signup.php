<!DOCTYPE html>
<html>
<head>
  <title>Sign Up Page</title>
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Permanent+Marker" >
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
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="signup.php">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user_login.php">Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adminlogin.php">Admin Log In</a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</div>


<?php
  include_once('includes/dbconnection.php');

  if (isset($_POST['registration'])) {

    $fullname       = $_POST['fullname'];
    $contactno      = $_POST['contactno'];
    $emailid        = $_POST['emailid'];
    $password       = $_POST['password'];
    $address        = $_POST['address'];
    $status         = "Inactive";
    $created_date   = date('Y-m-d');  
    $profilepic     = $_FILES['profilepic']['name'];
    $profilepics    ='profilepics/'.$profilepic;

     $query ="INSERT INTO users(name,contactno,emailid,password,address,created_date,profilepic,status) VALUES('$fullname','$contactno','$emailid','$password','$address','$created_date','$profilepic','$status')";

    $lastid= mysqli_query($conn,$query);

  if($lastid){
    // echo "string";
    // exit();
    move_uploaded_file($_FILES['profilepic']['tmp_name'], $profilepics);
    echo "<script>window.location='user_login.php'</script>";
  }
  }
?>

<body id="image" style="background-image:url('images/5.jpg');">
  <div class="form" style="">  
      <div class="">
        <div id="signup">   
          <h1 style="font-family: 'Permanent Marker', cursive; color: rgb(0, 0, 0);">Sign Up Here</h1>
          <form method="post" enctype="multipart/form-data">
            <div class="top-row">
              <div class="field-wrap" >
                <input type="text" name="fullname" id="fullname" placeholder="Full Name" required autocomplete="off" style="color: rgb(0, 0, 0)" />
              </div>
              <div class="field-wrap" >
                <input type="text" name="contactno" id="contactno" placeholder="Contact No" style="color: rgb(0, 0, 0)"/>
              </div>
              
              </div>
              <div class="top-row">
              <div class="field-wrap" >
                <input type="email" name="emailid" id="emailid" placeholder="Email Address" required autocomplete="off" style="color: rgb(0, 0, 0)"/>
              </div>
              <div class="field-wrap" >
                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off" style="color: rgb(0, 0, 0)"/>
              </div>
            </div>
            <div class="top-row">
            <div class="field-wrap" >  
                <!-- <input type="text" name="address" id="address" style="color: rgb(0, 0, 0)"/> -->
                <textarea name="address" id="address" placeholder="Address" style="color: rgb(0, 0, 0); background: transparent; border-color: rgb(0, 0, 0); width: 100%; height: 43px;"></textarea>
              </div>
              <div class="field-wrap" >
              <!--<label>Profile Pic</label>-->
              <input type="file" name="profilepic" id="profilepic" style="line-height: 1.15; " style="color: rgb(0, 0, 0)"/>
            </div>
          </div>
            <div>
              <input type="submit" class="button button-block" name="registration" value="Register Now"  style="font-family: 'Permanent Marker', cursive;" >
              </div>
              </form>
        
      </div><!-- sign-up -->
      
</div>
</div> <!-- /form -->

  <?php
    include_once('includes/footer.php');
  ?>

