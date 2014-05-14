<!-- Darko Pranjić 
Miče postavljeni session sa postojećeg usera i šalje ga na login formu 
-->
<?php 
session_start();
unset($_SESSION['username']);
session_destroy();
header("location:login.php");
?>
