<?php
function user_exists($username){
    #$username = sanitize($username);
    $query = mysql_query("SELECT count(*) as broj FROM lm_user where username='$username';");
    if (mysql_result($query, 0) == 1){
        return true;
    }
    else {
        return false;
    }
    
    #return (mysql_result($query, 0) == 1) ? true : false;
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
?>

