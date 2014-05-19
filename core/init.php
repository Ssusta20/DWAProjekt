<?php
/*Darko Pranjić

 * ovdje su obuhvaćene sve php naredbe tako da ne trebamo pozivati svaku od njih u svakom fileu */
session_start();

require 'baza/konekcija.php';
require 'funkcije/generalne.php';
require 'funkcije/korisnici.php';
require 'funkcije/lm_lead.php';
require 'funkcije/lm_user.php';
require 'funkcije/kal.php';
require 'funkcije/lm_sif_aktivnosti.php';


$errors = array();

?>