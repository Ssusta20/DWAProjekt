<!--Jurica Kustec-->

<?php 
#Bez ovoga mi PHP naredba header("location: lead.php"); nije radila ispravno nakon što sam prebacio stranice na hosting.
#Nakon googlanja našao sam ovo riješenje;
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
         <form class="unos" action="UserDet.php" method="GET">
                <h1>User detalji</h1>
                <span class="spanFormat">
                 <input type="submit" name = "akcija" value="Spremi" />
                 <input type="submit" name = "akcija" value="Obriši" />
                 <input type="button" onClick="location.href='user.php'" value='Povratak' />
                </span>
                <br>
                <?php
                
                #DohvaĿanje slogova ako se došlo iz tabele
                if ($_GET['id'] &&  $_GET['akcija'] !="Spremi"  &&  $_GET['akcija'] !="Obriši" ){
                    $result = lm_user_query_det(username2id($_SESSION['username']),$_GET['id']);
                    while ($row = mysql_fetch_array($result)) {
                             $_GET['username'] = $row['username'];
                             $_GET['password'] = $row['password'];
                             $_GET['ime'] = $row['ime'];
                             $_GET['prezime'] = $row['prezime'];
                             $_GET['email'] = $row['email'];
                        
                             
                        }
                }
                ?>
                <!-- id sloga iz tablice da se vidi da li slog GEToji ili je unos novog sloga-->
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>"  />
                <br>
                <label>Username:</label>
                <input type="text" name="username" value="<?= $_GET['username'] ?>" required />
                <br>
                <label>Password:</label>
                 <input type="password" name="password" value="<?= $_GET['password'] ?>" required />
                <br>
                <label>Ime:</label>
                <input type="text" name="ime" value="<?= $_GET['ime'] ?>" required />
                <br>
                <label>Prezime:</label>
                <input type="text" name="prezime" value="<?= $_GET['prezime'] ?>" required />
                <br>
                <label>Email:</label>
                <input type="email" name="email" value="<?= $_GET['email'] ?>" required />
               
               
       
                    <!-- Popunjavanje iz baze-->
                    <!-- listu za zemlje-->
                    
                
                
            </form>  
        <?php 
    
             if (!empty($_GET)){
                $akcija = $_GET['akcija'];
                $id = $_GET['id'];
                $username = $_GET['username'];
                $password = $_GET['password'];
                $ime = $_GET['ime'];
                $prezime = $_GET['prezime'];
                $email = $_GET['email'];
               

             

                if($akcija == "Spremi"){

                    if (empty($id)){
                        $id = lm_user_insert ($username,$password, $ime, $prezime, $email);
                        header("location: user.php");
                        exit();
                        
                    }
                    else {
                        lm_user_update($id, $username,$password, $ime, $prezime, $email);
                        header("location: user.php");
                        exit();
                    }
                 
                    
                    
                    }
                    elseif ($akcija == "Obriši"){
                            lm_user_delete($id);
                            header("location: user.php");
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


