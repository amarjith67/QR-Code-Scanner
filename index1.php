<?php
   $server="localhost";
   $username="root";
   $password="";
   $dbname="mysql";

   $conn=new mysqli("localhost","root","","mysql");
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  ?>
  <?php
  $id=$_POST['text'];
  $sql = "SELECT * FROM users where user_id=$id";
   $result = $conn->query($sql);
   $status=''; 
   $success='registered';
   if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $user_id= $row["user_id"];
      $user_name=$row["user_name"]; 
      $email_id=$row["email_id"]; 
      $phn=$row["phn_no"];
      $college_name=$row["college_name"];
    }
   } else {
     $user_name='';
     $email_id='nil';
     $phn='nil';
     $college_name='nil';
    $status= "student details not found";
    $success='unregistered';
   }
   mysqli_close($conn);
   ?>
   

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Scanner</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css"  type="text/css">
</head>
<body>
<div class="container">

<div class="circle1"></div>
<div class="circle2"></div>
<div class="circle3"></div>

<div class="main">
  
 



<div class="card-wrapper"> 
  <!-- BG -->
  <div class="card-wrapper__bg">
    <div class="card-wrapper__cover-bg">
    </div>
    <div class="card-wrapper__profile-pic">
      <img src="https://pickaface.net/assets/images/slides/slide4.png"> 
    </div>
  </div>

  <!-- card details -->
  <div class="card-wrapper__details">

    <!-- First Fold -->
    <div class="card-wrapper__user-details">
      <div class="text-center card-wrapper__user-name">
        <p> <?php echo $user_name; echo $status; ?></p>
      </div>
      <div class="text-center card-wrapper__designation card-wrapper__user-detail">
        <strong>Student</strong>
      </div>
      <div class="text-center card-wrapper__company  card-wrapper__user-detail">
      <?php echo $college_name;  ?>
      </div>
    </div>

    <!-- Second Fold -->
    <div class="card-wrapper__user-contact-info-wrapper text-center">
      <!-- email details -->
      <div class="card-wrapper__user-contact-info card-wrapper__user-contact-info--email">
        <div class="card-wrapper__user-contact-info-label">
          <strong>Email</strong>
        </div>
        <div class="card-wrapper__user-contact-info-value">
          <p>
          <?php echo $email_id;  ?>
          </p>
        </div>
      </div>

      <!-- phone details -->
      <div class="card-wrapper__user-contact-info card-wrapper__user-contact-info--email">
        <div class="card-wrapper__user-contact-info-label">
          <strong>Mobile</strong>
        </div>
        <div class="card-wrapper__user-contact-info-value">
        <?php echo $phn;  echo "<br><br><strong>status</strong><br> $success"; ?>
        </div>
      </div>
    </div>
  </div>

  <form method="POST" action="index.php">
    <input id="but" class="btn btn-primary " type="submit" value="return"/>
  </form>
</div>
  

</div>
</div>
  
</body>
</html>


