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
        <div>
            <table class="listing">
            <tr>
              <th>Id</th>
              <th>Šifra</th>
              <th>Ime</th> 
              <th>Prezime</th>
              <th>Email</th>
              <th>Naziv tvrtke</th>
              <th>Telefon</th>
              <th>Mobitel</th>
              <th>Grad</th>
           
            </tr>
            <?php
                $result = lm_lead_query(username2id($_SESSION['username']));
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><a  href='LeadDet.php?id=" .$row["id"]. "'>" . $row["id"] . "</a></td>";
                    echo "<td>" . $row["sifra"] . "</td>";
                    echo "<td>" . $row["ime"] . "</td>";
                    echo "<td>" . $row["prezime"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["naziv_tvrtke"] . "</td>";
                    echo "<td>" . $row["telefon"] . "</td>";
                    echo "<td>" . $row["mobitel"] . "</td>";
                    echo "<td>" . $row["grad"] . "</td>";
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


