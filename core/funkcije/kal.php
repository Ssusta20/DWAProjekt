<?php
 #Petar Finderle
function kalendar($mjesec, $godina){
    #gleda koliko dana ima u izbaranom mjesecu
    $dani_u_mjesecu = cal_days_in_month ( CAL_GREGORIAN , $mjesec , $godina );
    
    $result = lm_kalendar_query(username2id($_SESSION['username']));
    #radi lakše konstruiranja kalendara podatke ću puniti u associative array
    #koji ću čitati po datumu
    $podaci=array();
    $podaci_za_dan = array();
    
    while ($row = mysql_fetch_assoc($result)) {
        $podaci[$row["datum"]] = $row;
 
    }
    
    
    #vrti po svim danima i gleda da li u lm_aktivnosti postoji neka aktivnost za taj dan
    for($i = 1;$i <= $dani_u_mjesecu; $i++){
        $podaci_za_dan=$podaci[$i.".".$mjesec.".".$godina];
        #ako postoji aktivnost oboji red.
        #za planiranu žuto, za reliziranu crveno
        if ($podaci_za_dan){
             if ($podaci_za_dan["sifra_sta"] =='P'){
                 $boja = 'class="zuto"';
                
             } else {
                 $boja ='class="crveno"';
             }
             
        }else {
            $boja = null;
        }
            echo "<tr ". $boja .">";
            echo "<td>" . $i.".".$mjesec.".".$godina. "</td>";
            echo "<td>" . $podaci_za_dan["ime"] . "</td>";
            echo "<td>" . $podaci_za_dan["prezime"] . "</td>";
            echo "<td>" . $podaci_za_dan["naziv_tvrtke"] . "</td>";
            echo "<td>" . $podaci_za_dan["opis_akt"] . "</td>";
            echo "<td>" . $podaci_za_dan["opis_sta"] . "</td>";
            echo "</tr>";
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