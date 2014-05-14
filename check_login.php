<!--Darko Pranjić-->
<?php 
#Provjera dali je session postavljen, tj. dali je user ulogiran (isset). ako nije (!isset) vraća ga na login formu
   if (!isset($_SESSION['username'])) {
         header("Location: login.php");
   }
?>