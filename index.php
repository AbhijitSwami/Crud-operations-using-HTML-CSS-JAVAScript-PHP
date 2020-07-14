<?php

session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Registration form</title>

  <?php include 'link.php'; ?>

 <link rel="stylesheet" href="styles.css">


</head>
<body>


  <?php

     include 'connection.php';

    if (isset($_POST['submit'])){

      $Firstname= mysqli_real_escape_string($conne,$_POST['fname']);
      $Lastname=mysqli_real_escape_string($conne,$_POST['lname']);
      $Password=mysqli_real_escape_string($conne,$_POST['pass']);
      $ConfirmPassword=mysqli_real_escape_string($conne,$_POST['confirmpass']);
      $Gender=mysqli_real_escape_string($conne,$_POST['gender']);
      $Mail=mysqli_real_escape_string($conne,$_POST['email']);
      $MobileNO=mysqli_real_escape_string($conne,$_POST['phoneno']);
      $Address=mysqli_real_escape_string($conne,$_POST['address']);
      $Zipcode=mysqli_real_escape_string($conne,$_POST['postalcode']);


      $pass=password_hash($Password, PASSWORD_BCRYPT);
      $ConfirmPass=password_hash($ConfirmPassword, PASSWORD_BCRYPT);

      $emailquery="select * from StudentRegistration where Emailid='$Mail'";
      $query=mysqli_query($conne,$emailquery);
     $emailcount=mysqli_num_rows($query);

      if($emailcount > 0){

       echo "Email already Exists";
      }else{
        if($Password===$ConfirmPassword){

          $insertquery="insert into StudentRegistration(FirstName,LastName,Emailid,PassWord,ConfPass,GenDer,AddRess,Pincode,PhoneNumber)
          values('$Firstname','$Lastname','$Mail','$pass','$ConfirmPass','$Gender','$Address','$Zipcode','$MobileNO')";

          $res= mysqli_query($conne,$insertquery);
        }
        else
        {
          echo "Password is not matching";
        }
          if($res){
            ?>
            <script>
            alert("Data inserted Succesful");
            </script>
            <?php
          }else{
            ?>
            <script>
            alert("Data NOT inserted Succesful");
            </script>
            <?php

          }


      }
 }
    ?>

<div class="wrapper">
      <div class="title">
        Registration Form
      </div>

      <div class="Container Register">
        <div class="row">
          <div class="col-mod-3 Register-left">
            <a href="display.php">CHECK FORM</a><br/>

      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
      <div class="form" >
         <div class="inputfield">
            <label>First Name</label>
            <input type="text" name="fname" class="input" required>
         </div>
          <div class="inputfield">
            <label>Last Name</label>
            <input type="text" name="lname" class="input" required>
         </div>
         <div class="inputfield">
            <label>Password</label>
            <input type="password" name="pass" class="input" required>
         </div>
        <div class="inputfield">
            <label>Confirm Password</label>
            <input type="password" name="confirmpass"class="input" required>
         </div>
          <div class="inputfield">
            <label>Gender</label>

            <div class="custom_select">
              <select name="gender" required>
                <option value="">Select</option>
                <option  value="male">Male</option>
                <option  value="female">Female</option>
              </select>
            </div>
         </div>
          <div class="inputfield">
            <label>Email Address</label>
            <input type="text" name="email" class="input" required>
         </div>
        <div class="inputfield">
            <label>Phone Number</label>
            <input type="text" name="phoneno" class="input" required>
         </div>
        <div class="inputfield">
            <label>Address</label>
            <input type="text" name="address" required>
            <textarea class="textarea"></textarea>
         </div>
        <div class="inputfield">
            <label>Postal Code</label>
            <input type="text" name="postalcode" class="input" required>
         </div>
        <div class="inputfield terms">
            <label class="check">
              <input type="checkbox" name="terms" required>
              <span class="checkmark"></span>
            </label>
            <p>Agreed to terms and conditions</p>
         </div>
        <div class="inputfield">
          <input type="submit" value="Register" name="submit" class="btn">
        </div>
      </div>
    </form>
      </div>



</body>
</html>
