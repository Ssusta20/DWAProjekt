<?php
 #Petar Finderle
function kalendar($mjesec, $godina){
    
    $dani_u_mjesecu = cal_days_in_month ( CAL_GREGORIAN , $mjesec , $godina );
    
    for($i = 1;$i <= $dani_u_mjesecu; $i++){
        echo "<tr><td>". $i.".".$mjesec.".".$godina.".</td></tr>";
    }   
}

function lm_kalendar_query($lm_user_id,$datum_od,$datum_do){
        $query = mysql_query("select * from lm_kalendar_v1 where user_id = '$lm_user_id' or 'admin'='". $_SESSION['username'] ."';");
        if (!$query) {
            die('Invalid query: ' . mysql_error());
        }
        return $query;
    }
?>