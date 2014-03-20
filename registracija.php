
<?php 
 include 'core/init.php';
include 'header.php'; ?> 


<form class="form" action="registracija.php" method="POST">
            <h1>Registracija</h1>
           Ime:<input style="text-align: right;" type="text" name="ime" maxlength="20"><br>
            Prezime:<input style="text-align: right;" type="text" name="prezime" maxlength="20"><br>
            Username: <input type="text" name="username" maxlength="20"><br>
            Email: <input type="email" name="email" maxlength="20"><br>
            Lozinka: <input type="password" name="password" maxlength="15"><br>
            <input type="submit" value="Registracija">
</form>

 <?php include 'footer.php'; ?>
