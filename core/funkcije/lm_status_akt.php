<?php
	/*Petar Finderle*/
	function lm_status_akt_query(){
	    
	    $query = mysql_query("select * from lm_status_akt;");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	 function lm_status_akt_query_det($id){
	    $query = mysql_query("select * from lm_status_akt where id = '$id';");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	function lm_status_akt_insert ($sifra, $opis){
	    mysql_query(
	     "INSERT INTO lm_status_akt (sifra, opis)
	                    VALUES('$sifra', '$opis')");
	
	     return mysql_insert_id();
	    
	}
	
	 function lm_status_akt_update ($id,$sifra, $opis){
	    $update ="UPDATE lm_status_akt 
	                  SET sifra = '$sifra',
	                      opis = '$opis'
	                 WHERE id = '$id'";
	               
	    mysql_query($update);
	
	}
	
	function lm_status_akt_delete ($id){
	     mysql_query("DELETE FROM lm_status_akt WHERE id = '$id'");
	
	}

?>