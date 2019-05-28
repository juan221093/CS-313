<?php


$dbUser = 'cllstbfnqmjbse';
$dbPassword = 'c4681ab5380bc2b0c699c714480be54594ab059fcebcc00953699fb4342c82e7';
$dbName = 'd4uj8uaup6ucv9';
$dbHost = 'ec2-23-21-186-85.compute-1.amazonaws.com';
$dbPort = '5432';

try
{
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	// this line makes PDO give us an exception when there are problems, and can be very helpful in debugging!
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $ex)
{
	// If this were in production, you would not want to echo
	// the details of the exception.
	echo "Error connecting to DB. Details: $ex";
	die();
}

?>

<!-- Made by Juan Alvarez -->
<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" href="pageStyle.css">
    <title>Presentation Page</title>
   <style>
  
  /* document level styles */
       body {background-color: #ccdfc8}
       h1 {color: #656868; font-style: italic; text-align: center;}
       a {color:ghostwhite}
       h2 {color: #656868; font-style: italic; text-align: center}

</style>
    </head>
   <body>

<?php 
              
// sql to create table  
 /*$sql = "INSERT INTO packages (city,num_days,num_nights,num_people,total_price)
 VALUES ('Santa Cruz',5,4,2, 900)";
       
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$sql = "INSERT INTO packages (city,num_days,num_nights,num_people,total_price)
       VALUES ('Santa Cruz',4,3,2, 750)";
       
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 

$sql = "INSERT INTO packages (city,num_days,num_nights,num_people,total_price)
       VALUES ('Isabela',4,3,2, 1000)";
       
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 

$sql = "INSERT INTO packages (city,num_days,num_nights,num_people,total_price)
       VALUES ('Isabela',5,4,2, 1200)";
       
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); */

$statement = $db->prepare("SELECT city,num_days,num_nights,num_people,total_price FROM packages");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$city = $row['city'];
	$days = $row['num_days'];
	$nights = $row['num_nights'];
    $people = $row['num_people'];
    $price = $row['price'];

    echo "<p><strong>$city $days $nights $price </strong>  <p>";
}

 ?>

<ul>
  <li><a class="menu" href="#home">Home</a></li>
  <li><a href="index.php">CS 313 Assignments</a></li>
  
</ul>
       <hr>
        <img src="logo.png" alt="Logo" class="logo" >
        <h1>Ecu-World Travel Agency</h1>
       <blockquote style= "color: #92a39a; font-style: italic; text-align: center; font-family: Garamond;">
“Man cannot discover new oceans unless he has the courage to lose sight of the shore.” – Andre Gide
</blockquote>
       <hr>
<h2>Introduction</h2>
       <div class="introduction"> I am in the project of creating a Travel Agency
              so I figure that this class can help me move forward with it by 
              little tools for it. My name is Juan Alvarez, I am from Ecuador,
              and I currently reside in Rexburg, Idaho with my wife.</div>
       
     <hr>
       
  <h2 class="landscapes">What's Next?</h2> 
       
       <div class="next">In order to proceed to get information about the tour packages we offer please feel free to contact us by clicking the "Contact Us" tab on the top. We will provide you with the best selling tour packages for you to enjoy your adventure.</div>
       
       <hr>
       
<footer>
  <img src="footer.jpg" alt="footer" class="footer" >
</footer>

    </body>
</html>