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





    <div class="container">
    		<div class="row">
    			<h3>BookList</h3>
    		</div>
			<div class="row">
			
				<p>
					<a href="bookcreate.html" class="btn btn-success">Create</a>
					<a href="home.html" class="btn btn-success">Home</a>
				</p>
																
				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>BookName</th>
		                  <th>BookAuthor</th>
		                  <th>BookRating</th>
		                  <th>Action</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php 
					  
					  

					   include 'database.php';
					   $pdo = Database::connect();
					   print_r($_SESSION);
					   $id = $_SESSION['id'];
					   //$sessionid = $_SESSION['id'];
					   $sql = //'SELECT * FROM book ORDER BY id DESC';
					   
					   
					   
					   
					   'select bookname,bookauthor,bookrating,book.id as id from 
					   (SELECT * FROM `users` as u join bookusers as bu on u.id=bu.userid WHERE u.id='.$id.') 
					   as j join book on j.bookid=book.id';
					   
						
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<tr>';
							   	echo '<td>'. $row['bookname'] . '</td>';
							   	echo '<td>'. $row['bookauthor'] . '</td>';
							   	echo '<td>'. $row['bookrating'] . '</td>';
							   	echo '<td width=250>';
								echo '<a class="btn" href="bookread.html?id='.$row['id'].'">Read</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="bookupdate.html?id='.$row['id'].'">Update</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="bookdelete.html?id='.$row['id'].'">Delete</a>';
							   	echo '</td>';
							   	echo '</tr>';
					   }
					   Database::disconnect();
					  ?>
					  
					  
					  
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
  