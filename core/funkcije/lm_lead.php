<?php
    /*Finderle*/
    function lm_lead_query($lm_user_id){
        $query = mysql_query("select * from lm_lead where lm_user_id = '$lm_user_id';");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }
    
     function lm_lead_query_det($lm_user_id, $id){
        $query = mysql_query("select * from lm_lead where lm_user_id = '$lm_user_id' and id = '$id';");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }

    function lm_lead_insert ($sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
        mysql_query(
         "INSERT INTO lm_lead (sifra, ime, prezime, email, naziv_tvrtke, telefon, mobitel, ulica, grad, zip, napomena, lm_user_id, lm_sif_kvalif_id, lm_zemlja_id)
                        VALUES('$sifra', '$ime', '$prezime', '$email', '$naziv_tvrtke', '$telefon', '$mobitel', '$ulica', '$grad', '$zip', '$napomena', '$lm_user_id', '$lm_sif_kvalif_id', '$lm_zemlja_id')");
    
         return mysql_insert_id();
        
    }
    
     function lm_lead_update ($id,$sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
        $update ="UPDATE lm_lead 
                      SET sifra = '$sifra',
                          ime = '$ime',
                          prezime = '$prezime',
                          email = '$email',
                          naziv_tvrtke = '$naziv_tvrtke',
                          telefon = '$telefon',
                          mobitel ='$mobitel',
                          ulica = '$ulica',
                          grad = '$grad',
                          zip = '$zip',
                          napomena = '$napomena',
                          lm_user_id = '$lm_user_id',
                          lm_sif_kvalif_id = '$lm_sif_kvalif_id',
                          lm_zemlja_id = '$lm_zemlja_id'
                     WHERE id = '$id'";
                   
        mysql_query($update);
    
    }
    
    function lm_lead_delete ($id){
         mysql_query("DELETE FROM lm_lead WHERE id = '$id'");
    
    }
    
    /*Lista za zemlje*/
    function lm_lead_LOVZemlja(){
        $query = mysql_query("select naziv, id from lm_zemlja;");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }

        return $query;
    }
    
    /*Lista za kvalifikaciju*/
    function lm_lead_LOVKvalifikacija(){
        $query = mysql_query("select opis, id from lm_sif_kvalif;");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }
?>

