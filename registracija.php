<?php include 'core/init.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Registracija</title>
<link href="css/all.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style media="all" type="text/css">
</style>
</head>
<body>

<form class="form" action="registracija.php" method="GET">
            <h1>Registracija</h1>
            Ime:<br><input type="text" name="ime" maxlength="20" required><br>
            Prezime:<br><input  type="text" name="prezime" maxlength="20" required><br>
            Username:<br><input type="text" name="username" maxlength="20" required><br>
            Email:<br> <input type="email" name="email" maxlength="20" required><br>
            Lozinka: <br><input type="password" name="password" maxlength="15" required><br>
            <br><input type="submit" value="Registracija">
            <br><br>Već ste registrirani?  <a href="login.php" style="color:blue">Ulogiraj se</a>

</form>


</body>
</html>




<?php

if (!empty($_GET)){
    $username = $_GET['username'];
    $ime = $_GET['ime'];
    $prezime = $_GET['prezime'];
    $email = $_GET['email'];
    $password = $_GET['password'];

    /*
    switch($test){
        case ($username && $email) === true :
        header("location:registracija.php");
        die("username i email postoje!!! probajte sa trugim imenom ili se logirajte");
   
        break;
    case user_exists($username) === true :
        header("location:registracija.php");
        die("user postoji!!! probajte sa drugim usernameom");
        
        break;
    case email_check($email) === true :
        header("location:registracija.php");
        die("email postoji, dali ste se već registrirali?");
        
        break;
        default:
    registracija($ime, $prezime, $email, $password, $username);
    header("location:login.php");
    }
  */
    



//ne znam di sam fulao, uvijek mi javlja ovu prvu grešku..  sutra cu se zajebavat s tim, previse mi se spava sad
  
    
    
   if (user_exists($username) === true && email_check($email) === true){
        die("username i email postoje!!! probajte sa drugim imenom ili se logirajte");
                header("location:registracija.php");

    }
    elseif (user_exists($username) === true) {
   
        die("user postoji!!! probajte sa drugim usernameom"); 
        header("location:registracija.php");
}
    elseif (email_check($email) === true) {
        
        die("email postoji, dali ste se već registrirali?");
        header("location:registracija.php");
}

 else {
    registracija($ime, $prezime, $email, $password, $username);
    header("location:login.php");
 }
  
}

?>