<!--Darko Pranjić-->

<?php
mysql_connect('localhost','root','dpranjic') or die("Dogodila se greška prilikom spajanja na bazu, Oprostite!!!"); #konekcija na bazu
mysql_select_db('lm') or die("Dogodila se greška prilikom dohvaćanja tablice, Oprostite!!!");  #odabir tabele iz baze
#Konekcija za 000webhost bazu
#mysql_connect('mysql14.000webhost.com','a2983472_root','dpranjic123') or die("Dogodila se greška prilikom spajanja na bazu, Oprostite!!!");
#mysql_select_db('a2983472_lm') or die("Dogodila se greška prilikom spajanja na bazu, Oprostite!!!");

?>