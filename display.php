<!DOCTYPE>
<html>

<head>
  <title>

</title>
<?php include 'link.php'; ?>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main-div">
  <h1>List Of All The Students </h1>
<div class="center-div">
  <div class="table-responsive">

  <table>
    <thead>
      <tr>

        <th>Id</th>
        <th>Full Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Confirm Password</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Pincode</th>
        <th>Phone Number</th>
        <th>Operation</th>

      </tr>
  </thead>
  <tbody>

    <?php

     include 'connection.php';

     $selectquery ="select * from StudentRegistration";
     $query=mysqli_query($conne,$selectquery);

     $nums= mysqli_num_rows($query);

     while($res=mysqli_fetch_array($query)) {


      ?>






       <tr>
         <td><?php echo $res['ID'];?></td>
         <td><?php echo $res['FirstName']; ?></td>
         <td><?php echo $res['LastName']; ?></td>
         <td><?php echo $res['Emailid']; ?></td>
         <td><?php echo $res['PassWord']; ?></td>
         <td><?php echo $res['ConfPass']; ?></td>
         <td><?php echo $res['GenDer']; ?></td>
         <td><?php echo $res['AddRess']; ?></td>
         <td><?php echo $res['Pincode']; ?></td>
         <td><?php echo $res['PhoneNumber']; ?></td>

         <td><a href="update.php?id=<?php echo $res['ID'];?>" data-toggle="tooltip" data-placement="bottom" title="Update"><i class="fa fa-edit" aria-hidden="true"></i></td>
           <td><i class="fa fa-trash" aria-hidden="true"></i></a></td>

       </tr>

       <?php


     }

     ?>

</tbody>

  </table>
</div>
</div>
</div>
<script>

$(document).ready(function){
$('[data-toggle="tooltip"]').tooltip();

});


</script>
</body>
</html>
