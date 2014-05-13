<?php
  /*Jurica Kustec*/
    function lm_user_query($lm_user_id){
        $query = mysql_query("select * from lm_user where id = '$lm_user_id' or 'admin'='". $_SESSION['username'] ."';");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }
    
     function lm_user_query_det($lm_user_id, $id){
        $query = mysql_query("select * from lm_user where id = '$id';");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }

    function lm_user_insert ($username, $password, $ime, $prezime, $email){
        mysql_query(
         "INSERT INTO lm_user (username, password, ime, prezime, email)
                        VALUES('$username','$password', '$ime', '$prezime', '$email')");
    
         return mysql_insert_id();
        
    }
    
     function lm_user_update ($id,$username, $password, $ime, $prezime, $email){
         
        $update ="UPDATE lm_user 
                      SET username = '$username',
                          password = '$password',
                              ime = '$ime',
                          prezime = '$prezime',
                          email = '$email'
                       WHERE id = '$id'";
        mysql_query($update);
       
     }
    
    
    function lm_user_delete ($id){
         mysql_query("DELETE FROM lm_user WHERE id = '$id'");
    
    }
    
   
   
       
?>