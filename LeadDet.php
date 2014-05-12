<!--Petar Finderle-->
<?php include 'core/init.php';?>
<?php include 'check_login.php';?>

<!DOCTYPE html>
<html>
<head>
<title>CMS Admin</title>
<link href="css/all.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<style media="all" type="text/css">
</style>
</head>
<body>
<div id="main">
    
 <?php include 'dijelovi/header.php';?>
    
 <div id="middle">
      
<?php include 'dijelovi/aside.php'?>
       <article id="center-column">
         <form class="unos" action="LeadDet.php" method="GET">
                <h1>Lead detalji</h1>
                <span class="spanFormat">
                 <input type="submit" name = "akcija" value="Ažuriraj" />
                 <input type="submit" name = "akcija" value="Obriši" />
                 <input type= "button" onClick="location.href='lead.php'" value='Povratak' />
                </span>
                <br>
                <?php
                #Dohvačanje slogova ako se došlo iz tabele
                if ($_GET['id'] &&  $_GET['akcija'] !="Ažuriraj"  &&  $_GET['akcija'] !="Obriši" ){
                     $result = lm_lead_query_det(username2id($_SESSION['username']),$_GET['id']);
                        while ($row = mysql_fetch_array($result)) {
                             $_GET['sifra'] = $row['sifra'];
                             $_GET['ime'] = $row['ime'];
                             $_GET['prezime'] = $row['prezime'];
                             $_GET['email'] = $row['email'];
                             $_GET['tvrtka'] = $row['naziv_tvrtke'];
                             $_GET['telefon'] = $row['telefon'];
                             $_GET['mobitel'] = $row['mobitel'];
                             $_GET['ulica'] = $row['ulica'];
                             $_GET['grad'] = $row['grad'];
                             $_GET['drzava'] = $row['lm_zemlja_id'];
                             $_GET['napomena'] = $row['napomena'];
                             $_GET['kvalifikacija'] = $row['lm_sif_kvalif_id'];
                             
                        }
                }    
                ?>
                <!-- id sloga iz tablice da se vidi da li slog GEToji ili je unos novog sloga-->
                <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden />
                <br>
                <label>Šifra:</label>
                <input type="text" name="sifra" value="<?= $_GET['sifra'] ?>" required />
                <br>
                <label>Ime:</label>
                <input type="text" name="ime" value="<?= $_GET['ime'] ?>" required />
                <br>
                <label>Prezime:</label>
                <input type="text" name="prezime" value="<?= $_GET['prezime'] ?>" required />
                <br>
                <label>Email:</label>
                <input type="email" name="email" value="<?= $_GET['email'] ?>" required />
                <br>
                <label>Naziv tvrtke:</label>
                <input type="text" name="tvrtka" value="<?= $_GET['tvrtka'] ?>"  />
                <br>
                <label>Telefon:</label>
                <input type="text" name="telefon" value="<?= $_GET['telefon'] ?>" />
                <br>
                <label>Mobitel:</label>
                <input type="text" name="mobitel" value="<?= $_GET['mobitel'] ?>" />
                <br>
                <label>Ulica:</label>
                <input type="text" name="ulica" value="<?= $_GET['ulica'] ?>" />
                <br>
                <label>Grad:</label>
                <input type="text" name="grad" value="<?= $_GET['grad'] ?>" />
                <br>
                <label>Zip:</label>
                <input type="text" name="zip" value="<?= $_GET['zip'] ?>" />
                <br>
                <label>Država:</label>
                <select name="drzava">
                    <!-- Popunjavanje iz baze-->
                    <!-- listu za zemlje-->
                    <?php
                        $result = lm_lead_LOVZemlja();
                        while ($row = mysql_fetch_array($result)) {
                            if ($_GET['drzava'] == $row["id"] ){
                                $selected = "selected";
                            }
                            else {
                                $selected = NULL;
                            }
                            echo "<option ".$selected ." value='" . $row["id"] . "'>" . $row["naziv"] . "</option>";
                        }
                       
                    ?>
                </select>
                
                <label>Napomena:</label>
                <textarea name="napomena" cols = "30" rows = "6" maxlength = "2000" > <?php echo $_GET['napomena'] ?> </textarea> 
                <br>
                <label>Kvalifikacija:</label>
                <select name="kvalifikacija">
                   <!-- Popunjavanje iz baze-->
                   <!-- listu za kvalifikacije-->
                   <?php
                        $result = lm_lead_LOVKvalifikacija();
                        while ($row = mysql_fetch_array($result)) {
                            if ($_GET['kvalifikacija'] == $row["id"] ){
                                $selected = "selected";
                            }
                            else {
                                $selected = NULL;
                            }
                            echo "<option ".$selected ." value='" . $row["id"] . "'>" . $row["opis"] . "</option>";
                        }
                       
                    ?>
                </select>
                
            </form>  
        <?php 
    
             if (!empty($_GET)){
                $akcija = $_GET['akcija'];
                $id = $_GET['id'];
                $sifra = $_GET['sifra'];
                $ime = $_GET['ime'];
                $prezime = $_GET['prezime'];
                $email = $_GET['email'];
                $naziv_tvrtke = $_GET['tvrtka'];
                $telefon = $_GET['telefon'];
                $mobitel = $_GET['mobitel'];
                $ulica = $_GET['ulica'];
                $grad = $_GET['grad'];
                $zip = $_GET['zip'];
                $napomena = $_GET['napomena'];
                $lm_user_id = username2id($_SESSION['username']);
                $lm_sif_kvalif_id = $_GET['kvalifikacija'];
                $lm_zemlja_id = $_GET['drzava'];
              
                
                if($akcija == "Ažuriraj"){
                    
                    if (empty($id)){
                        $id = lm_lead_insert ($sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id);
                       #location.replace('lead.php');
                        
                    }
                    else {
                        lm_lead_update($id, $sifra, $ime, $prezime, $email, $naziv_tvrtke, $telefon, $mobitel, $ulica, $grad, $zip, $napomena, $lm_user_id, $lm_sif_kvalif_id, $lm_zemlja_id);
                    }
                 
                    
                    
                    }
                    elseif ($akcija == "Obriši"){
                            lm_lead_delete($id);
                    }
                    /*else{
                        #ako se došlo iz tablice
                        
                        }*/
                        
                }
                
               
               
            
        ?>
        </article>

<?php include 'dijelovi/section.php'?>
 
</div>
<?php include 'dijelovi/footer.php'?>    

</div>
</body>
</html>


