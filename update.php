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

      $ids=$_GET['id'];

      $showquery="select * from StudentRegistration where ID={$ids}";
      $showdata=mysqli_query($conne,$showquery);
      $arrdata=mysqli_fetch_array($showdata);

     if (isset($_POST['submit'])){

         $idupdate=$_GET['id'];

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

          // $insertquery="insert into StudentRegistration(FirstName,LastName,Emailid,PassWord,ConfPass,GenDer,AddRess,Pincode,PhoneNumber)
           //values('$Firstname','$Lastname','$Mail','$pass','$ConfirmPass','$Gender','$Address','$Zipcode','$MobileNO')";

           $query1="update StudentRegistration set id=$ids,FirstName='$Firstname',LastName='$Lastname',Emailid='$Mail',PassWord='$pass',Confirm='$ConfirmPass',GenDer='$Gender',AddRess='$Address',Pincode='$Zipcode',PhoneNumber='$MobileNO'
           where id=$idupdate";

           $res= mysqli_query($conne,$query1);
         }
         else
         {
           echo "Password is not matching";
         }
           if($res){
             ?>
             <script>
             alert("Data Updated Succesful");
             </script>
             <?php
           }else{
             ?>
             <script>
             alert("Data NOT updated Succesful");
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
             <input type="text" name="fname" value="<?php echo $arrdata['FirstName'];?>"class="input" required>
          </div>
           <div class="inputfield">
             <label>Last Name</label>
             <input type="text" name="lname" value="<?php echo $arrdata['LastName'];?>"class="input" required>
          </div>
          <div class="inputfield">
             <label>Password</label>
             <input type="password" name="pass" value="<?php echo $arrdata['PassWord'];?>"class="input" required>
          </div>
         <div class="inputfield">
             <label>Confirm Password</label>
             <input type="password" name="confirmpass" value="<?php echo $arrdata['ConfPass'];?>"class="input" required>
          </div>
           <div class="inputfield">
             <label>Gender</label>

             <div class="custom_select">
               <select name="gender" value="<?php echo $arrdata['GenDer'];?>"required>
                 <option value="">Select</option>
                 <option  value="male">Male</option>
                 <option  value="female">Female</option>
               </select>
             </div>
          </div>
           <div class="inputfield">
             <label>Email Address</label>
             <input type="text" name="email" value="<?php echo $arrdata['Emailid'];?>"class="input" required>
          </div>
         <div class="inputfield">
             <label>Phone Number</label>
             <input type="text" name="phoneno" value="<?php echo $arrdata['PhoneNumber'];?>"class="input" required>
          </div>
         <div class="inputfield">
             <label>Address</label>
             <input type="text" value="<?php echo $arrdata['AddRess'];?>"name="address" required>
             <textarea class="textarea"></textarea>
          </div>
         <div class="inputfield">
             <label>Postal Code</label>
             <input type="text" name="postalcode" value="<?php echo $arrdata['Pincode'];?>"class="input" required>
          </div>
         <div class="inputfield terms">
             <label class="check">
               <input type="checkbox" name="terms" required>
               <span class="checkmark"></span>
             </label>
             <p>Agreed to terms and conditions</p>
          </div>
         <div class="inputfield">
           <input type="submit" value="Update" name="submit" class="btn">
         </div>
       </div>
     </form>
       </div>



 </body>
 </html>
