<!--Petar Finderle-->
<?php include 'core/init.php';?>
<?php include 'check_login.php';?>
<?php 
    #postavljanje inicijalnog mjeseca i godine
    #uzimanje tekućeg datum za inicijalno punjenje
    if (empty($_GET)){
        $mj  = (int)date("m");
        $god = date("Y");
    } else {
        $akcija = $_GET['akcija'];
        $proc=explode(";",$akcija);
        $mj = $proc[1];
        $god = $proc[2];
        
        if($proc[0] == "-"){
            #mjesec umanjen za 1, ako je prvi mjesec onda postavi na 12 mj. i godinu smanji za 1
            $mj = $mj - 1;
            if ($mj == 0){
                $mj = 12;
                $god = $god - 1;
          
            }
        } elseif ($proc[0] == "+"){
            $mj = $mj + 1;
            if ($mj == 13){
                $mj = 1;
                $god = $god + 1;
          }
            
        }
    }
    
?>

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
       <form action="kalendar.php" method="GET">
           <div align="center">
                <!--prenose se parametri odvojeni ; -->
                <button type="submit" name = "akcija" value = <? echo "-;".$mj.";".$god ?>> <h3> < </h3> </button>
                <?php echo "<b>Pregled za ".$mj.".".$god."</b>" ?>
                <button type="submit" name = "akcija" value = <? echo "+;".$mj.";".$god ?>> <h3> > </h3> </button>
                
           </div>
       </form>
        <div>
        
        <table class="listing">
            <tr>
              <th>Datum</th>
              <th>Lead Ime</th> 
              <th>Lead Prezime</th>
              <th>Aktivnost</th>
              <th>Status</th>
              
            </tr>
            <?php 
               kalendar($mj,$god);
               $result = lm_kalendar_query(username2id($_SESSION['username']));
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["sifra"] . "</td>";
                    echo "<td>" . $row["ime"] . "</td>";
                    echo "<td>" . $row["prezime"] . "</td>";
                    echo "<td>" . $row["naziv_tvrtke"] . "</td>";
                    echo "</tr>";
                }
            ?>    
            </table>
        </div>
        </article>

<?php include 'dijelovi/section.php'?>
 
</div>
<?php include 'dijelovi/footer.php'?>    

</div>
</body>
</html>
