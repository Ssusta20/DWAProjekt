<!--Goran Miljević-->
<?php 
ob_start();?>
<?php include 'core/init.php';?>
<?php include 'check_login.php';?>

<!DOCTYPE html>
<html>
<head>
<title>Aktivnost - detalji</title>
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
         <form class="unos" action="aktivnostDet.php" method="GET">
                <h1>User detalji</h1>
                
                <?php
                
                #DohvaĿanje slogova ako se došlo iz tabele
                if ($_GET['id'] &&  $_GET['akcija'] !="Spremi"  &&  $_GET['akcija'] !="Obriši" ){
                    $result = lm_aktivnost_query_det($_GET['id']);
                    while ($row = mysql_fetch_array($result)) {
                             $_GET['rb'] = $row['rb'];
                             $_GET['datum'] = $row['datum'];
                             $_GET['napomena'] = $row['napomena'];
                             $_GET['lm_lead_id'] = $row['lm_lead_id'];
                             $_GET['lm_sif_aktivnost_id'] = $row['lm_sif_aktivnost_id'];
                             $_GET['lm_status_akt_id'] = $row['lm_status_akt_id'];
                        
                             
                        }
                }
                ?>
                <span class="spanFormat">
                 <input type="submit" name = "akcija" value="Spremi" />
                 <input type="submit" name = "akcija" value="Obriši" />
                 <input type="button" onClick="location.href='LeadDet.php?id=<?echo $_GET['lm_lead_id'];?>'" value='Povratak' />
                </span>
                <br>
                <!-- id sloga iz tablice da se vidi da li slog GEToji ili je unos novog sloga-->
                <input type="text" name="id" value="<?= $_GET['id'] ?>" hidden />
                <br>
                <label>RB:</label>
                <input type="text" name="rb" value="<?= $_GET['rb'] ?>" required />
                <br>
                <label>Datum:</label>
                 <input type="text" name="datum" value="<?= $_GET['datum'] ?>" required />
                <br>
                <label>Napomena:</label>
				<textarea name="napomena" cols = "30" rows = "6" maxlength = "2000" > <?php echo $_GET['napomena'] ?> </textarea>
				<br>
                <input type="hidden" name="lm_lead_id" value="<?= $_GET['lm_lead_id'] ?>" required />
                <label>Aktivnost:</label>
				<select name="lm_sif_aktivnost_id">
				    <!-- Popunjavanje iz baze-->
				    <!-- listu za aktivnosti-->
					<?php
						$result = lm_aktivnost_LOVaktivnosti();
						   while ($row = mysql_fetch_array($result)) {
						        if ($_GET['lm_sif_aktivnost_id'] == $row["id"] ){
							        $selected = "selected";
							    }
							    else {
							        $selected = NULL;
							    }
							    echo "<option ".$selected ." value='" . $row["id"] . "'>" . $row["opis"] . "</option>";
						}
							
					?>
				</select>
				<label>Status:</label>
				<select name="lm_status_akt_id">
				    <!-- Popunjavanje iz baze-->
				    <!-- listu za statuse-->
					<?php
						$result = lm_aktivnost_LOVstatus();
						   while ($row = mysql_fetch_array($result)) {
						        if ($_GET['lm_status_akt_id'] == $row["id"] ){
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
                $rb = $_GET['rb'];
                $datum = $_GET['datum'];
                $napomena = $_GET['napomena'];
                $lm_lead_id = $_GET['lm_lead_id'];
                $lm_sif_aktivnost_id = $_GET['lm_sif_aktivnost_id'];
                $lm_status_akt_id = $_GET['lm_status_akt_id'];
               

             
             
                if($akcija == "Spremi"){

                    if (empty($id)){
                        $id = lm_aktivnost_insert ($rb,$datum, $napomena, $lm_lead_id, $lm_sif_aktivnost_id,$lm_status_akt_id);
                        header("location: LeadDet.php?id=".$_GET['lm_lead_id']);
                        exit();
                        
                    }
                    else {
                           echo $akcija;
                        lm_aktivnost_update($id, $rb,$datum, $napomena, $lm_lead_id, $lm_sif_aktivnost_id,$lm_status_akt_id);
                        header("location: LeadDet.php?id=".$_GET['lm_lead_id']);
                        exit();
                    }
                 
                    
                    
                    }
                    elseif ($akcija == "Obriši"){
                            lm_aktivnost_delete($id);
                            header("location: LeadDet.php?id=".$_GET['lm_lead_id']);
                            exit();
                            
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


