<!--Darko Pranjić-->

<?php 

ob_start();?>
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
         <form class="unos" action="sifAktDet.php" method="GET">
                <h1>Aktivnosti detalji</h1>
                <span class="spanFormat">
                 <input type="submit" name = "akcija" value="Spremi" />
                 <input type="submit" name = "akcija" value="Obriši" />
                 <input type="button" onClick="location.href='sifrarnici.php'" value='Povratak' />
                </span>
                <br>
                <?php
                
                #DohvaĿanje slogova ako se došlo iz tabele
                if ($_GET['id'] &&  $_GET['akcija'] !="Spremi"  &&  $_GET['akcija'] !="Obriši" ){
                    $result = lm_sif_aktivnost_query_det($_GET['id']);
                    while ($row = mysql_fetch_array($result)) {
                             $_GET['sifra'] = $row['sifra'];
                             $_GET['opis'] = $row['opis'];
                    }
                }
                ?>
                <!-- id sloga iz tablice da se vidi da li slog GEToji ili je unos novog sloga-->
                <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden />
                <br>
                <label>Šifra:</label>
                <input type="text" name="sifra" value="<?= $_GET['sifra'] ?>" required />
                <br>
                <label>Opis:</label>
                <input type="text" name="opis" value="<?= $_GET['opis'] ?>" required />
                
            </form>  
        <?php 
    
             if (!empty($_GET)){
                $akcija = $_GET['akcija'];
                $id = $_GET['id'];
                $sifra = $_GET['sifra'];
                $opis = $_GET['opis'];
                if($akcija == "Spremi"){

                    if (empty($id)){
                        $id = lm_sif_aktivnost_insert ($sifra,$opis);
                        header("location: sifrarnici.php");
                        exit();
                        
                    }
                    else {
                        lm_sif_aktivnost_update($id,$sifra,$opis);
                        header("location: sifrarnici.php");
                        exit();
                    }
                 
                    
                    
                    }
                    elseif ($akcija == "Obriši"){
                            lm_sif_aktivnost_delete($id);
                            header("location: sifrarnici.php");
                            exit();
                            
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


