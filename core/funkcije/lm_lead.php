<?php
	/*Petar Finderle*/
	function lm_lead_query($lm_user_id){
	    /*Query iz lm_lead po useru ili admin(vidi sve). tabela lm_user uzeta je da bi admin vidio kojem useru pripada lead*/
	    $query = mysql_query("select l.*,u.username from lm_lead l, lm_user u where l.lm_user_id = u.id and (l.lm_user_id = '$lm_user_id' or 'admin'='". $_SESSION['username'] ."');");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	 function lm_lead_query_det($lm_user_id, $id){
	    $query = mysql_query("select * from lm_lead where id = '$id';");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	function lm_lead_insert ($sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
	    
	    $napomena = mysql_real_escape_string($napomena);
	    $insert = "INSERT INTO lm_lead (sifra, ime, prezime, email, naziv_tvrtke, telefon, mobitel, ulica, grad, zip, napomena, lm_user_id, lm_sif_kvalif_id, lm_zemlja_id)
	                    VALUES('$sifra', '$ime', '$prezime', '$email', '$naziv_tvrtke', '$telefon', '$mobitel', '$ulica', '$grad', '$zip', '$napomena', '$lm_user_id', '$lm_sif_kvalif_id', '$lm_zemlja_id')";
        
	    mysql_query($insert);
	    return mysql_insert_id();
	    
	}
	
	 function lm_lead_update ($id,$sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id){
	    $napomena = mysql_real_escape_string($napomena);
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
	
	/*Provjerava da li postoje aktivnosti prije brisanja lead-a*/
	function lm_delete_aktivnost($lm_lead_id) {
	    $delete = "DELETE FROM lm_aktivnost WHERE lm_lead_id = '$lm_lead_id'";
	    mysql_query($delete);
	}
	?>