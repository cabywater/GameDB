<html>
<head>
<title>Game Website</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/> <!-- CSS file link -->
</head>
<body>
<div id="wholepage">
		<header>Game Database</header>
<ul class="nav"> <!-- navigation, list items with class ID -->
  <li><a href="../index.php">Home</a></li>
  <li><a href="design.php">Design</a></li>
</ul>

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
		$game_id = $_GET['game_id'];		//gets game ID	
			$query = "SELECT game_name, platforms, release_date, age_rating, cover_img, developer_name, developer_website, genre_name 
					FROM game
					INNER JOIN genre ON genre.genre_id = game.genre_id
					INNER JOIN developer ON developer.developer_id = game.developer_id
					WHERE game.game_id = $game_id"; //select query to pull data from database using game ID, Inner Join connects the genre ID and developer ID to the game table, where needed from select.
			$stmt = $conn->prepare($query);
			$stmt->bindValue('game_id', $game_id);
			$stmt->execute(); //executes code.

			echo "<table>";
			while ($row = $stmt->fetch(PDO::FETCH_OBJ)) //fetches data from database
			{
				echo "<tr>"; //echos table row table to write to the webpage
				echo "<th>Cover Box Art</th><th>Game Name</th><th>Platform</th><th>Release Date</th><th>Age Rating</th><th>Developer's Name</th><th>Developer's Website Address</th><th>Genre Name</th>"; //echos table header to write to the webpage
				echo "</tr>";
				echo "<tr>";
				echo "<td><img src='".$row->cover_img."'></td>"; //pulls data from database from the columns that I've asked for.
				echo "<td>".$row->game_name."</td>";
				echo "<td>".$row->platforms."</td>";
				echo "<td>".$row->release_date."</td>";
				echo "<td>".$row->age_rating."</td>";
				echo "<td>".$row->developer_name."</td>";
				echo "<td>".$row->developer_website."</td>";
				echo "<td>".$row->genre_name."</td>";
				echo "</tr>";
			}
			echo "</table>";
		$conn=NULL;
		?>
</div>








</div>
</body>
</html>