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

<form class="form" action="registracija.php" method="POST">
            <h1>Registracija</h1>
            Ime:<br><input type="text" name="ime" maxlength="20" required><br>
            Prezime:<br><input  type="text" name="prezime" maxlength="20" required><br>
            Username:<br><input type="text" name="username" maxlength="20" required><br>
            Email:<br> <input type="email" name="email" maxlength="20" required><br>
            Lozinka: <br><input type="password" name="password" maxlength="15" required><br>
            <br><input type="submit" value="Registracija">
            <br><br>Već ste registrirani?  <a href="login.php.php">Ulogiraj se</a>

</form>


</body>
</html>
