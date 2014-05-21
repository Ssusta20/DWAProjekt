<?php
	#Petar Finderle
	function kalendar($mjesec, $godina){
	   #gleda koliko dana ima u izbaranom mjesecu
	   $dani_u_mjesecu = cal_days_in_month ( CAL_GREGORIAN , $mjesec , $godina );
	   #vrti po svim danima i gleda da li u lm_aktivnosti postoji neka aktivnost za taj dan
	   for($i = 1;$i <= $dani_u_mjesecu; $i++){
	       $datum = $i.".".$mjesec.".".$godina;
	       #query po datumu
	       $result = lm_kalendar_query(username2id($_SESSION['username']), $datum);
	       #broj redova koje vrača query
	       $br_redova = mysql_num_rows ($result);
	       #ako postoje podaci loopa
	       $j=0;
	       if ($br_redova) {
	           while ($row = mysql_fetch_array($result)) {
	               
	               #rowspan više reda ako za određeni datum postoje više od jedne aktivnosti i ako je prvi red
	               if ($br_redova > 0 and $j == 0 ){
	                   $datum_red ="<td rowspan = ".$br_redova." >" . $i.".".$mjesec.".".$godina. "</td>";
	                   $j=1;
	               } else {
	                   $datum_red=null;
	               }
	               #$ako postoji aktivnost oboji red.
	               #za planiranu žuto, za reliziranu crveno
	               $boja = null;
	               if ($row["sifra_sta"] =='P'){
	                    $boja = 'class="zuto"';
	                   
	                } else {
	                    $boja ='class="crveno"';
	               }
	                
	                   echo "<tr ". $boja .">";
	                   echo $datum_red;
	                   echo "<td>" . $row["ime"] . "</td>";
	                   echo "<td>" . $row["prezime"] . "</td>";
	                   echo "<td>" . $row["naziv_tvrtke"] . "</td>";
	                   echo "<td>" . $row["opis_akt"] . "</td>";
	                   echo "<td>" . $row["opis_sta"] . "</td>";
	                   #treba još napraviti da ide u aktivnost kada se napravi forma aktivnosti
	                   echo "<td><a  href='LeadDet.php?id=" .$row["lead_id"]. "&iz=kal'><B>"/*. $row["id"]*/ ."Detalji</B></a></td>";
	                   echo "</tr>";
	                   
	                
	        
	           }
	       #ako ne postoje podaci ispisuje prazan red;
	       }else{
	           echo "<tr>";
	           echo "<td>" . $i.".".$mjesec.".".$godina. "</td>";
	           echo "<td></td>";
	           echo "<td></td>";
	           echo "<td></td>";
	           echo "<td></td>";
	           echo "<td></td>";
	           echo "</tr>";  
	       } 
	   }   
	}
	
	function lm_kalendar_query($lm_user_id,$datum){
	   
	       $query = mysql_query("select * from lm_kalendar_v1 where datum = '$datum' and (user_id = '$lm_user_id' or 'admin'='". $_SESSION['username'] ."');");
	       if (!$query) {
	           die('Invalid query: ' . mysql_error());
	       }
	       return $query;
	   }
	?>