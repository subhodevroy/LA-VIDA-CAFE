<?php
session_start();

$con=mysqli_connect('localhost','root','','restaurant');

mysqli_select_db($con, 'sessionpractical');
$name= $_POST['name'];
$email=$_POST['email'];

$contact=$_POST['contact'];
$password= $_POST['password'];
$q="select * from rest where  name= '$name'  && email= '$email'  ";
$result=mysqli_query($con, $q);
$num=mysqli_num_rows($result);
if($num==1)
{
  echo "<script type='text/javascript'>alert('already exists');
window.location='opening.html';
</script>";

}

else
{
  $qy=" insert into rest(name ,email,contact,password) values ('$name' , '$email','$contact','$password') ";
  mysqli_query($con,$qy);
  $_SESSION['name']=$name;

  header('location:login.html');
}

?>