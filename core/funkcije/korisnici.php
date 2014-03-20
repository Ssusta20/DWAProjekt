<?php
function user_exists($username){
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT('id') FROM 'test' WHERE 'username' = '$username'");
    return (mysql_result($query, 0) == 1) ? true : false;
}
?>

