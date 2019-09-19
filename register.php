<?php
session_start ();
$_SESSION ['message'] = '';
$db = mysqli_connect("localhost", "root", '', "stud_profile" );


//$romdb=mysql_connect('localhost','root','');
//$dam=mysql_select_db('stud_profile',$romdb);

if (isset ($_POST[ 'registration'])) {
    //session_start();
    $name = mysql_real_escape_string($_POST['name']);
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['password']);
    $password2 = mysql_real_escape_string($_POST['password2']);
    
    if ($_POST['password'] == $_POST['password2']) {

        $password = md5 ($password);

$sql = "INSERT INTO profile (name, email, password)VALUES('$name','$email', '$password')";
mysqli_query($db, $sql);
$_SESSION['message'] = "You are now logged in";
$_SESSION['name']= $name;
header ("location: homepage.php");
    } else {
        $_SESSION['message'] = "Passwords does not match";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN OR SIGN UP</title>

<link rel="stylesheet" type="text/css" href="formstyle.css"> </head>

<div class="content">
  <div class="main">
  <form method="post" action="register.php" >
  <h2>CONTACT FORM</h2> 
  <h4><?php echo $_SESSION ['message']; ?> </h4>
  
  <label>Name :</label>
  <input type="text" name="name" placeholder="Name" required />
  <label>Email :</label>
   <input type="text" name ="email" placeholder="Email Address" required />
  <label>Password :</label>
  <input type="password"  name ="password" placeholder="password" required/>
  <label>Confirm Password :</label>
  <input type="password"  name ="password2" placeholder="password again" required />
  <!--<label>Message :</label>
  <textarea id= "Message" name= "message" placeholder="Message" style="height:200px"></textarea>-->
  <input type="submit" name="registration" value="Register"  >
  

</div>
  
  </form>
  </div>
  </div>
  