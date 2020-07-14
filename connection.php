<?php

 $server ="localhost";
 $user ="root";
 $password="";
 $db="myassignment";

 $conne = mysqli_connect($server,$user,$password,$db);

 if($conne){

   ?>
   <script>

   alert('connection Succesful');
   </script>
   <?php
 }else {

   ?>
   <script>

   alert('connection Not Succesful');
   </script>
   <?php

 }

 ?>
