<!DOCTYPE html>
<!--Petar Finderle-->
<?php include 'core/init.php';?>
<?php include 'check_login.php';?>
<html>
	<head>
		<title>Šifrarnici</title>
		<link href="css/all.css" rel="stylesheet" type="text/css"/>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<style media="all" type="text/css"></style>
	</head>
	<body>
		<div id="main">
			<?php include 'dijelovi/header.php';?>
			<div id="middle">
				<?php include 'dijelovi/aside.php'?>
				<article id="center-column">
					<form action="LeadDet.php">
						<input type="submit" value="Dodaj novi">
					</form>
					<div>
						<table class="listing">
							<tr>
								<th>Detalji</th>
								<th>Šifra</th>
								<th>Opis</th>
								
							</tr>
							<?php
								$result = lm_sif_aktivnost_query();
								while ($row = mysql_fetch_array($result)) {
								    echo "<tr>";
								    echo "<td><a  href='sif_akt_det.php?id=" .$row["id"]. "'><B>"/*. $row["id"]*/ ."Detalji</B></a></td>";
								    echo "<td>" . $row["sifra"] . "</td>";
								    echo "<td>" . $row["opis"] . "</td>";    
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