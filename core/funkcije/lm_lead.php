<?php

    function lm_lead_insert ($sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
     mysql_query(
     "INSERT INTO lm_lead (sifra, ime, prezime, email, naziv_tvrtke, telefon, mobitel, ulica, grad, zip, napomena, lm_user_id, lm_sif_kvalif_id, lm_zemlja_id)
                    VALUES('$sifra', '$ime', '$prezime', '$email', '$naziv_tvrtke', '$telefon', '$mobitel', '$ulica', '$grad', '$zip', '$napomena', '$lm_user_id', '$lm_sif_kvalif_id', '$lm_zemlja_id')");
    
    }
    
     function lm_lead_update ($id,$sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
     mysql_query("UPDATE lm_lead 
                  SET sifra = $sifra,
                      ime = $ime,
                      prezime = $prezime,
                      email = $email,
                      naziv_tvrtke = $naziv_tvrtke,
                      telefon = $telefon,
                      mobitel = $mobitel,
                      ulica = $ulica,
                      grad = $grad,
                      zip = $zip,
                      napomena = $napomena,
                      lm_user_id = $lm_user_id,
                      lm_sif_kvalif_id = $lm_sif_kvalif_id,
                      lm_zemlja_id = $lm_zemlja_id
                 WHERE id = '$id'");
    
    }
    
    function lm_lead_delete ($id){
     mysql_query("DELETE FROM lm_lead WHERE id = '$id'");
    
    }
    
    /*Liste za zemlje*/
    function lm_lead_LOVZemlja(){
        $query = mysql_query("select naziv, id from lm_zemlja;");
        return $query;
    }
    
    /*Lista za kvalifikaciju*/
    function lm_lead_LOVKvalifikacija(){
        $query = mysql_query("select opis, id from lm_sif_kvalif;");
        return $query;
    }
?>

