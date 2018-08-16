<html>
<head>
<title>Game Website</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/> <!-- CSS file link -->
</head>

<body>
<div id="wholepage">
		<header>Game Database</header>
<nav>
<ul class="nav"> <!-- navigation, list items with class ID -->
	 <li><a href="../index.php">Home</a></li>
	<li><a href="design.php">Design</a></li>
</ul>
</nav>
	<div id="designs">
		<h1>Class Diagram</h1>
		<img src="../images/diagrams.png"/> <!-- image link for class diagram -->
</div>
<?php
require_once("config.inc.php");

	try{
	$conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD); //takes data from config.
}
	catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

?> <!-- database connection call, uses data from config.inc.php to login using stored username / password -->
	<div id='content'>
	<?php
		$query = "SELECT * FROM developer"; //selects all data from the developer table and echos a table to display the data
		$resultset = $conn->query($query);
		$rows = $resultset->fetchAll(PDO::FETCH_OBJ);
			echo "<table> 
					<tr>
						<th>developer_id</th>
						<th>developer_name</th>
						<th>developer_city</th>
						<th>developer_country</th>
						<th>data_established</th>
						<th>developer_website</th>
					</tr>";
			foreach($rows as $row)
			{
				echo "<tr>";
				echo "<td>".$row->developer_id."</td>";
				echo "<td>".$row->developer_name."</td>";
				echo "<td>".$row->developer_city."</td>";
				echo "<td>".$row->developer_country."</td>";
				echo "<td>".$row->date_established."</td>";
				echo "<td>".$row->developer_website."</td>";
				echo "</tr>";
			}
				echo "</table>";

?>
	
	<?php
		$query = "SELECT * FROM game"; //selects all data from the game table and echos a table to display the data
		$resultset = $conn->query($query);
		$rows = $resultset->fetchAll(PDO::FETCH_OBJ);
			echo "<table> 
					<tr>
						<th>game_id</th>
						<th>game_name</th>
						<th>platforms</th>
						<th>release_date</th>
						<th>age_rating</th>
						<th>cover_img</th>
					</tr>";
			foreach($rows as $row)
			{
				echo "<tr>";
				echo "<td>".$row->game_id."</td>";
				echo "<td>".$row->game_name."</td>";
				echo "<td>".$row->platforms."</td>";
				echo "<td>".$row->release_date."</td>";
				echo "<td>".$row->age_rating."</td>";
				echo "<td>".$row->cover_img."></td>";
				echo "</tr>";
			}
				echo "</table>";

?>
	
	<?php
		$query = "SELECT * FROM genre"; //selects all data from the genre table and echos a table to display the data
		$resultset = $conn->query($query);
		$rows = $resultset->fetchAll(PDO::FETCH_OBJ);
			echo "<table> 
					<tr>
						<th>genre_id</th>
						<th>genre_name</th>
						<th>description</th>
					</tr>";
			foreach($rows as $row)
			{
				echo "<tr>";
				echo "<td>".$row->genre_id."</td>";
				echo "<td>".$row->genre_name."</td>";
				echo "<td>".$row->description."</td>";
				echo "</tr>";
			}
				echo "</table>";

?>
	</div>
</body>
</html>