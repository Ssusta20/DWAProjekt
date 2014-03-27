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
      
          <form class="unos" action="LeadDet.php" method="POST">
                <h1>Lead detalji</h1>
                <span class="spanFormat">
                 <input type="submit" name = "akcija" value="Ažuriraj" />
                 <input type="submit" name = "akcija" value="Obriši" />
                </span>
                <br>
                <!-- id sloga iz tablice da se vidi da li slog postoji ili je unos novog sloga-->
                <input type="text" name="id" value="" hidden />
                <br>
                <label>Šifra:</label>
                <input type="text" name="sifra" value="<?= $_POST['sifra'] ?>" required />
                <br>
                <label>Ime:</label>
                <input type="text" name="ime" value="" required />
                <br>
                <label>Prezime:</label>
                <input type="text" name="prezime" value="" required />
                <br>
                <label>Email:</label>
                <input type="email" name="email" value="" required />
                <br>
                <label>Naziv tvrtke:</label>
                <input type="text" name="tvrtka" value=""  />
                <br>
                <label>Telefon:</label>
                <input type="text" name="telefon" value="" />
                <br>
                <label>Mobitel:</label>
                <input type="text" name="mobitel" value="" />
                <br>
                <label>Ulica:</label>
                <input type="text" name="ulica" value="" />
                <br>
                <label>Grad:</label>
                <input type="text" name="grad" value="" />
                <br>
                <label>Zip:</label>
                <input type="text" name="zip" value="" />
                <br>
                <label>Država:</label>
                <select name="drzava">
                    <!-- Popunjavanje iz baze-->
                    <?php
                        $result = lm_lead_LOVZemlja();
                        while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['naziv'] . "</option>";
                        }
                    ?>
                </select>
                <label>Napomena:</label>
                <textarea name="napomena" cols = "30" rows = "6" maxlength = "2000" ></textarea> 
                <br>
                <label>Kvalifikacija:</label>
                <select name="Kvalifikacija">
                    <!-- Popunjavanje iz baze-->
                    <option value="1">Test1</option>
                    <option value="2">Test2</option>
                    <option value="3">Test3</option>
                    <option value="4">Test4</option>
                </select>
            </form>  
        <?php 
    
            if (!empty($_POST)){
                $akcija = $_POST['akcija'];
               
                /*ovo ću možda promjenti - ako ćemo koristiti objekte*/
                $id = $_POST['id'];
                $sifra = $_POST['sifra'];
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $email = $_POST['email'];
                $naziv_tvrtke = $_POST['naziv_tvrtke'];
                $telefon = $_POST['telefon'];
                $mobitel = $_POST['mobitel'];
                $ulica = $_POST['ulica'];
                $grad = $_POST['grad'];
                $zip = $_POST['zip'];
                $napomena = $_POST['napomena'];
                $lm_user_id = username2id($_SESSION['username']);
                $lm_sif_kvalif_id = $_POST['lm_sif_kvalif_id'];
                $lm_zemlja_id = $_POST['lm_zemlja_id'];
                /*ovo ću možda promjenti*/
                
                
                if($akcija == "Ažuriraj"){
                    if (empty($id)){
                        die ("Novi");
                    }
                    else {
                        die ("Ažuriraj");
                    }
                    
                    
                }
                elseif ($akcija == "Obriši"){
                    die ("Obriši");
                    
                }
                else{
                    die ("Nepostojeća akcija");
                }
                
               
               
            }
        ?>
        </article>

<?php include 'dijelovi/section.php'?>
 
</div>
<?php include 'dijelovi/footer.php'?>    

</div>
</body>
</html>


