<?php 
include 'core/init.php';
include 'header.php'; 
?> 

<form class="form" action="login.php" method="POST">
            <h1>Login</h1>
            Username:<br> <input type="text" name="username" maxlength="20"><br>
            Lozinka:<br> <input type="password" name="password" maxlength="15"><br><br>
            <input type="submit" value="Logiraj se"><br><br>
            <a href="registracija.php">Registracija</a>
</form>

 <?php include 'footer.php'; ?>

     
<?php 

if (user_exists('zgajo') === true){
    echo 'postoji';
}
die();

if (empty($_POST) === FALSE){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
if (empty($username) || empty($password)){
    $errors[] = "Potrebno je unijeti username i password";
}    
else if (user_exists($username)=== FALSE){
        $errors[] = "Ne možemo pronaći username, dali ste registrirani?";

}





}



?>