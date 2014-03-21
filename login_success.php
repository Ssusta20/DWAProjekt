<html>
    <body>
    <?php
        session_start();
        if(empty($_SESSION['username'])){
            header("location:login.php");
        }
    ?>
        <h1>Login Successful!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>
    </body>
</html>