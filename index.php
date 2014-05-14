<!--Darko Pranjić-->

<?php include 'core/init.php';?> <!--uključuje init.php koji sadrži sve ostale naredbe i provjere.-->
<?php include 'check_login.php';?> <!--uključuje check_login.php gdje se provjerava dali postoi session, tj dali je user ulogiran-->

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
      
<?php include 'dijelovi/article.php'?>
  
<?php include 'dijelovi/section.php'?>
 
</div>
<?php include 'dijelovi/footer.php'?>    

</div>
</body>
</html>
