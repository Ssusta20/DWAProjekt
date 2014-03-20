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
?>

