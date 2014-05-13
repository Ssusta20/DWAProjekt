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
                <?php
                #echo date("d.m.Y") ;
                echo date("t")."<br>" ;
                
                for($i = 1;$i<=date("t");$i++){
                    echo $i."<br>";
                }
                
                
                ?>
                <?php include 'dijelovi/aside.php'?>
                <?php include 'dijelovi/section.php'?>
            </div>
            <?php include 'dijelovi/footer.php'?>    
        
        </div>
    </body>
</html>