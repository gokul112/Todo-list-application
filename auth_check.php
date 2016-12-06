<?php
session_start();
include ('config.php'); 

$username = $_POST['username']; 
$password = md5($_POST['password']);


$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM users WHERE username='$username' and password='$password'";
$result=mysql_query($sql);


$count=mysql_num_rows($result);

if($count==1){

$_SESSION['username']= $username; 

header("location:dashboard.php");
}

//if the username and password doesn't match redirect to homepage with message=1
else {
    echo '
    <script language="javascript" type="text/javascript">
window.location.href="index.php?message=1";
</script>';

}
?>