<?php
session_start();
 
//connect to database
$db=mysqli_connect("localhost","mrdurfee","580069","mrdurfee");

session_start();
if(!isset($_SESSION["username"])){ // if "user" not set,
	session_destroy();
	header('Location: login.php');     // go to login page
	exit;
} 
?>



<!DOCTYPE html>
<html>
<head>



    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
	
	<style>
		body {background-color: #cc0000;}
	</style>

  <title>Register , login and logout user php mysql</title>
  
</head>
<body>


<div class="header">
    <h1>Register, login and logout user php mysql</h1>
</div>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>


<h1>Home</h1>
<div>
    <h4>Welcome <?php echo $_SESSION['username']; ?></h4></div>
	<p>
	<a href="user.php" class="btn btn-success">Your Profile</a>
	<a href="forum3/main_forum.php" class="btn btn-success">Forum</a>
	</p>

</div>

<p>
  <div class="dropdown">
  <button class="dropbtn">Category List</button>
  <div class="dropdown-content">
    <a href="booklist.php" class="btn btn-success">Book List</a>
	<a href="booklist2.php" class="btn btn-success">Book List2</a>
    <a href="tvlist.php" class="btn btn-success">TV Show List</a>
  </div>
  </div>
</p>
   
   

<a class="btn btn-success" href="logout.php">Log Out</a>
</body>
</html>