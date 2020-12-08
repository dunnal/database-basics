<?php		
	$user = $_GET['user'];
	if($user == null){
		$user = "Please Login";
	}

	//$content holds a 2D array with keys being menu names and values being an array with a subtitle, and content
	if($user == "Please Login"){
	$content = array(
		$user => "addPart.php",	
		"Make Account" => "addSupplier.php",
		"Consoles" => "listParts.php",
		"Games" => "listSuppliers.php");
	} else {
		$content = array(
		$user => "addPart.php",	
	//	"Transactions" => "trans.php",
		"Rent Game" => "rentGame.php",
		"Rent Console" => "rentConsole.php",
		"Consoles" => "listParts.php",
		"Games" => "listSuppliers.php");
	}
?>
<header> 
	Roman's Rentals - <em>Welcome <span id="username"><?php echo $user;?></span>!</em>
</header>
<nav>
	<ul>
	<?php
		foreach ($content as $page => $location){
			echo "<li><a href='$location?user=".$user."' ".($page==$currentpage?" class='active'":"").">".$page."</a></li>";			
		}
	?>
	</ul>
</nav>
