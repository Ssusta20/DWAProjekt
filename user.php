<!--Jurica Kustec-->
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
           <form action="UserDet.php">
                <input type="submit" value="Dodaj novi">
            </form>
        <div>
            <table class="listing">
            <tr>
              <th>Detalji</th>
              <th>Username</th>
              <th>Password</th>
              <th>Ime</th> 
              <th>Prezime</th>
              <th>Email</th>
             
            </tr>
            <?php
                $result = lm_user_query(username2id($_SESSION['username']));
                while ($row = mysql_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td><a  href='UserDet.php?id=" .$row["id"]. "'><B>" /*. $row["id"]*/ . "Detalji</B></a></td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>" . $row["password"] . "</td>";
                    echo "<td>" . $row["ime"] . "</td>";
                    echo "<td>" . $row["prezime"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                   
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


