<!--Darko Pranjić-->

<?php include 'core/init.php';?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="css/all.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style media="all" type="text/css">
</style>
</head>
<body>

<form class="form" action="login.php" method="POST">
    <h1>Login</h1>
    Username:<br> <input type="text" name="username" maxlength="20" required><br>
    Lozinka:<br> <input type="password" name="password" maxlength="15" required><br><br>
    <input type="submit" value="Logiraj se"><br><br>
    <a href="registracija.php" style="color:blue">Registracija</a>
</form>


</body>
</html>

     
<?php 
    /*provjerava: ako nije prazno polje upisa ide dalje*/
    if (!empty($_POST)){
        $username = $_POST['username'];
        $password = $_POST['password'];
            /*prva provjera: ako user nije pronađen u bazi*/
        if (user_exists($username) === FALSE){
            die("Ne možemo pronaći username, dali ste registrirani?");
        } 
            /* ako je user pronaden provjerava dalje*/
        else{
                        /*ukoliko se username i password podudaraju ide na stranicu  lead.php. uspješno ulogiranje*/
           if (pass_check($username, $password)){
               $_SESSION['username'] = $username;
               #header("location:lead.php");
               header( "Refresh: 1; url=lead.php" );
            }
          else {
                     /* ako je upisana kriva lozinka*/
              #session_destroy();
              die("Kriva lozinka");
              header("location: login.php");
         }
            
        }
    
    }



?>