<?php 
    include 'core/init.php';
    include 'header.php';
    
?> 

<form class="form" action="login.php" method="GET">
    <h1>Login</h1>
    Username:<br> <input type="text" name="username" maxlength="20" required><br>
    Lozinka:<br> <input type="password" name="password" maxlength="15" required><br><br>
    <input type="submit" value="Logiraj se"><br><br>
    <a href="registracija.php">Registracija</a>
</form>

 <?php include 'footer.php'; ?>

     
<?php 

    if (!empty($_GET)){
        $username = $_GET['username'];
        $password = $_GET['password'];
        
        if (user_exists($username) === FALSE){
            die("Ne možemo pronaći username, dali ste registrirani?");
        } 
        else{
            ##Kad postoji onda radi
            die("Korisnik postoji!");
            
        }
    
    }



?>