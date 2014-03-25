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

<form class="form" action="login.php" method="GET">
    <h1>Login</h1>
    Username:<br> <input type="text" name="username" maxlength="20" required><br>
    Lozinka:<br> <input type="password" name="password" maxlength="15" required><br><br>
    <input type="submit" value="Logiraj se"><br><br>
    <a href="registracija.php" style="color:blue">Registracija</a>
</form>


</body>
</html>

     
<?php 
    
    if (!empty($_GET)){
        $username = $_GET['username'];
        $password = $_GET['password'];
        
        if (user_exists($username) === FALSE){
            die("Ne možemo pronaći username, dali ste registrirani?");
        } 
        else{
           if (pass_check($username, $password)){
               #password ti ne treba, treba nam samo username je po njemu ćemo raditi queryie
               $_SESSION['username'] = $username;
               header("location:index.php");
            }
          else {
              #session_destroy();
              die("Kriva lozinka");
              header("location: login.php");
         }
            
        }
    
    }



?>