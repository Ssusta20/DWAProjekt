<?php
	/*Petar Finderle*/
	function lm_sif_kvalif_query(){
	    
	    $query = mysql_query("select * from lm_sif_kvalif;");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	 function lm_sif_kvalif_query_det($id){
	    $query = mysql_query("select * from lm_sif_kvalif where id = '$id';");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	function lm_sif_kvalif_insert ($sifra, $opis){
	    mysql_query(
	     "INSERT INTO lm_sif_kvalif (sifra, opis)
	                    VALUES('$sifra', '$opis')");
	
	     return mysql_insert_id();
	    
	}
	
	 function lm_sif_kvalif_update ($id,$sifra, $opis){
	    $update ="UPDATE lm_sif_kvalif 
	                  SET sifra = '$sifra',
	                      opis = '$opis'
	                 WHERE id = '$id'";
	               
	    mysql_query($update);
	
	}
	
	function lm_sif_kvalif_delete ($id){
	     mysql_query("DELETE FROM lm_sif_kvalif WHERE id = '$id'");
	
	}

?>