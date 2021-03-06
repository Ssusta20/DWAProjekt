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
				    <h2> Aktivnosti </h2> 
					<form action="sifAktDet.php">
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
								    echo "<td><a  href='sifAktDet.php?id=" .$row["id"]. "'><B>"/*. $row["id"]*/ ."Detalji</B></a></td>";
								    echo "<td>" . $row["sifra"] . "</td>";
								    echo "<td>" . $row["opis"] . "</td>";
								    echo "</tr>";
								}
								               
								?> 
						</table>
					</div>
					<h2> Statusi </h2> 
					<form action="statusAktDet.php">
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
								$result = lm_status_akt_query();
								while ($row = mysql_fetch_array($result)) {
								    echo "<tr>";
								    echo "<td><a  href='statusAktDet.php?id=" .$row["id"]. "'><B>"/*. $row["id"]*/ ."Detalji</B></a></td>";
								    echo "<td>" . $row["sifra"] . "</td>";
								    echo "<td>" . $row["opis"] . "</td>"; 
								    echo "</tr>";
								}
								               
								?> 
						</table>
					</div>
					<h2> Lead - Kvalifikacija </h2> 
					<form action="kvalifDet.php">
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
								$result = lm_sif_kvalif_query();
								while ($row = mysql_fetch_array($result)) {
								    echo "<tr>";
								    echo "<td><a  href='kvalifDet.php?id=" .$row["id"]. "'><B>"/*. $row["id"]*/ ."Detalji</B></a></td>";
								    echo "<td>" . $row["sifra"] . "</td>";
								    echo "<td>" . $row["opis"] . "</td>";    
								    echo "</tr>";
								}
								               
								?> 
						</table>
				</article>
				
				<?php include 'dijelovi/section.php'?>
			</div>
			<?php include 'dijelovi/footer.php'?>    
		
	</body>
</html>