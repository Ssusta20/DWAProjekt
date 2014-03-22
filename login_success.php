<?php include 'core/init.php';?>

<?php
session_start();
if(!session_is_registered($username)){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<body>
Login Successful
</body>
</html>