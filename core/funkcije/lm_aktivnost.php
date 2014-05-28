<?php
	/*Goran Miljević*/
	function lm_aktivnost_query($id){
	  
	    $query = mysql_query("select * from lm_kalendar_v1 where lead_id = '$id' order by datum;");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	 function lm_aktivnost_query_det($id){
	    $query = mysql_query("select id, date_format(datum,'%d.%m.%Y') datum, napomena,lm_lead_id,lm_sif_aktivnost_id,lm_status_akt_id  from lm_aktivnost where id = '$id';");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	
	function lm_aktivnost_insert ($datum, $napomena, $lm_lead_id, $lm_sif_aktivnost_id,$lm_status_akt_id){
	    
	     $napomena = mysql_real_escape_string($napomena);
	     $datum = date("Y-m-d", strtotime($datum));
	     $insert= "INSERT INTO lm_aktivnost (datum,napomena,lm_lead_id,lm_sif_aktivnost_id,lm_status_akt_id)
	                    VALUES('$datum', '$napomena', '$lm_lead_id', '$lm_sif_aktivnost_id','$lm_status_akt_id')";
	    
	     mysql_query( $insert);
	     
	     return mysql_insert_id();
	    
	}
	
	 function lm_aktivnost_update ($id,$datum, $napomena, $lm_lead_id, $lm_sif_aktivnost_id,$lm_status_akt_id){
	    #pretvara datum u format u bazi
	    $datum = date("Y-m-d", strtotime($datum));
	    $napomena = mysql_real_escape_string($napomena);
	    $update = "UPDATE lm_aktivnost 
	                   SET datum = '$datum',
	                       napomena = '$napomena',
	                       lm_lead_id = '$lm_lead_id',
	                       lm_sif_aktivnost_id = '$lm_sif_aktivnost_id',
	                       lm_status_akt_id ='$lm_status_akt_id'
	                  WHERE id = '$id'";
	                
	    
	    mysql_query($update);
	
	}
	
	function lm_aktivnost_delete ($id){
	     mysql_query("DELETE FROM lm_aktivnost WHERE id = '$id'");
	
	}
	
	/*Lista za zemlje*/
	function lm_aktivnost_LOVaktivnosti(){
	    $query = mysql_query("select opis,id from lm_sif_aktivnost;");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	
	    return $query;
	}
	
	/*Lista za kvalifikaciju*/
	function lm_aktivnost_LOVstatus(){
	    $query = mysql_query("select opis,id from lm_status_akt;");
	    if (!$query) {
	        die('Invalid query: ' . mysql_error());
	    }
	    return $query;
	}
	?>