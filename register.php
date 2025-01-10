<?php
include("connect.php");

$name= $_POST['name'];
$mobile= $_POST['mobile'];
$password= $_POST['password'];
$cpassword= $_POST['cpassword'];
$address= $_POST['address'];
$image= $_FILES ['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role =$_POST['role'];

if($password==$cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, cpassword, address, photo, role ) VALUES  ('$name', '$mobile', '$password', '$cpassword', '$address', '$image', '$role') ");

    if($insert){
        echo '
   <script>
   alert("Registration Successfull!");
   window.location = "../";
   </script>
   ';

    }
    else{
        echo '
   <script>
   alert("Some Error occurued");
   window.location = "../routes/register.html";
   </script>
   ';
    }
}
else{
   echo '
   <script>
   alert("password and confirm password do not match");
   window.location = "../routes/register.html";
   </script>
   ';
}


?>