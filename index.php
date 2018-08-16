<html>
<head>
<title>Game Website</title> 
<link href="css/style.css" rel="stylesheet" type="text/css"/> <!-- CSS file link -->
</head>
<body>
<div id="wholepage"> <!-- div for wholepage -->
       
	      <header>Game Database</header>

<ul class="nav"> <!-- navigation, list items with class ID -->
       <li><a href="index.php">Home</a></li>
       <li><a href="php/design.php">Design</a></li>
</ul>

<?php 
require_once("php/config.inc.php");

try{
       $conn = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD); //takes data from config.
}
catch (PDOException $exception) 
{
	echo "Oh no, there was a problem" . $exception->getMessage(); //exception message if problem with login.
}

?> <!-- database connection call, uses data from config.inc.php to login using stored username / password -->
	<div id='indexcontent'>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get"> <!-- Form layout and values with PHP self so that it uses the same page to display data. -->
			<label for="search">Search for a game:</label>
			<input type="text" name="search" id="search" placeholder="Enter a game name...">
			<input type="submit" value="Search">
		</form>
		<br>
		<?php
			if (!isset($_GET['search']))
				{
					 $_GET['search'] = "";}
			    elseif(empty($_GET['search'])) //make sure someone has entered data in the search box
					  {
					  echo"<p id='emptyfield'>"; //p id for css to change the text colour to red when a game isn't entered into the text box.
					  exit ("Please enter a game name."); 
					  echo"</p>";
					  }
			    else
				{
			$search_term = $_GET['search']; //gets search term from text box
			$stmt = $conn->prepare("SELECT game_name, age_rating, cover_img, release_date, game_id FROM game WHERE game_name LIKE :search_term"); //Select function gets data from colums. From Game gets the data from the table called "Game". Where function checks game name and displays if LIKE what is entered.
			$stmt->bindValue(':search_term','%'.$search_term.'%');
			$stmt->execute();

			echo "<table>"; //table element
			while ($row = $stmt->fetch(PDO::FETCH_OBJ))
					{
						echo "<tr>"; //echos table row table to write to the webpage
						echo "<th>Cover Box Art</th><th>Game Name</th><th>Age Rating</th><th>Release Date</th>"; //echos table header to write to the webpage
						echo "</tr>";
						echo "<tr>";
						echo "<td><img src='images/".$row->cover_img."'></td>"; // takes image from directory and uses field name to show the field
						echo "<td><a href='php/details.php?game_id=".$row->game_id."'>".$row->game_name."</td>"; //displays data from given table column
						echo "<td>".$row->age_rating."</td>";//displays data from given table column
						echo "<td>".$row->release_date."</td>"; //displays data from given table column
						echo "</tr>";
					}
				echo "</table>";
			}
			$conn=NULL;
		?> <!-- end of PHP code-->
	
	</div>
	
	
	
	
	
	
	
	
</div>	
</body>
</html>
