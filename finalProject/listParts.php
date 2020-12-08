<!DOCTYPE html>
<?php
		$currentpage="Consoles";
?>
<html>
	<head>
		<title>List Consoles</title>
		<link rel="stylesheet" href="index.css">
	</head>
<body>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvars.php'; 
	include 'header.php';
	
// Connect to the database
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}	

// query to select all information from parts table


//  ADD the SQL query *******
	$query = "SELECT * FROM CONSOLE ";
	
// Get results from query
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
	// If there are parts in the database construct an HTML table
	// to display the results
	
	if(mysqli_num_rows($result) > 0){
        echo "<h1>Parts</h1>";  
		echo "<table id='t01' border='1'>";
		// Create the table header
        echo "<thead>";
			echo "<tr>";
			echo "<th>Name</th>";
			echo "<th>Company</th>";
			//echo "<th>Color</th>";
			echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
		
		// Extract rows from the results returned from the database
        while($row = mysqli_fetch_array($result)){
        //  ADD code to display the parts  *****
		//  This is similar to how suppliers were displayed  ***
		    echo "<tr>";
            echo "<td>" . $row['CName'] . "</td>";
			echo "<td>" . $row['Company'] . "</td>";
           // echo "<td>" . $row['color'] . "</td>";
            echo "</tr>";
		
		
        }
        echo "</tbody>";                            
        echo "</table>";
		// Free result set
        mysqli_free_result($result);
    } else{
		echo "<p class='lead'><em>No records were found.</em></p>";
    } 
	// Close the database connection
	mysqli_close($conn);
?>
</body>

</html>

	
