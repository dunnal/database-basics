<?php
   include ('connectvars.php'); 
   $error = "";
   $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
   if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}	
  if($_SERVER["REQUEST_METHOD"] == "POST") {
	$myusername = mysqli_real_escape_string($conn,$_POST['username']);
	$mynickname = mysqli_real_escape_string($conn,$_POST['nickname']);
  
	$query = "INSERT INTO USERINFO VALUES('$myusername', '$mynickname');";
	
	$error = "account created";
	
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
	
	$url = "http://web.engr.oregonstate.edu/~dunnal/cs340/EC/listSuppliers.php?user=" . $myusername;
		$loca = "Location: " .$url;
		echo "<script type='text/javascript'>window.top.location='$url';</script>"; exit;
	
  }
?>
<html>
   
   <head>
      <title>Make Account</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
				  <label>Nickname  :</label><input type = "text" name = "nickname" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
