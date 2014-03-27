<?php
function user_exists($username){
    $query = mysql_query("SELECT count(*) as broj FROM lm_user where username='$username';");
    if (mysql_result($query, 0) == 1){
        return true;
    }
    else {
        return false;
    }
}

function pass_check($username,$password){
    $query = mysql_query("select count(*) as broj from lm_user where username = '$username' and password='$password';");
    if (mysql_result($query, 0) == 1){
        return true;
    }
    else {
        return false;
    }
 }
 

function email_check($email){
    $query = mysql_query("SELECT count(*) as broj FROM lm_user where email='$email';");
    if (mysql_result($query, 0) == 1){
        return true;
    }
    else {
        return false;
    }
}

function registracija($ime, $prezime, $email, $password, $username){
 mysql_query("INSERT INTO lm_user (ime, prezime, email, password, username) VALUES ('$ime', '$prezime', '$email', '$password', '$username')");

}

    /*funkcija za dobivanje id iz username za tabelu lm_lead*/
    
    function username2id($username){
        $query = mysql_query("SELECT id as id FROM lm_user where username='$username';");
        $id = mysql_result($query, 0);
        return $id;
        
    }
    
    
?>

