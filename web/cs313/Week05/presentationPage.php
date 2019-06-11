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
    <title>Package Info</title>
   <style>
  
  /* document level styles */
       body {background-color: #ccdfc8}
       h1 {color: #656868; font-style: italic; text-align: center;}
       h2 {color: #656868; font-style: italic; text-align: center}
       

</style>
    </head>
   <body>

<ul>
  <li><a class="menu" href="#home">Home</a></li>
  <li><a class="menu" href="index.php">CS 313 Assignments</a></li>
  
</ul>
       <hr>
        <img src="logo.png" alt="Logo" class="logo" >
        <h1>Ecu-World Travel Agency</h1>
       <blockquote style= "color: #92a39a; font-style: italic; text-align: center; font-family: Garamond;">
“Man cannot discover new oceans unless he has the courage to lose sight of the shore.” – Andre Gide
</blockquote>
       <hr>
<h2>Introduction</h2>
       <div class="introduction">
       
       <?php 


$statement = $db->prepare("SELECT city,num_days,num_nights,num_people,total_price, package_id FROM packages");
$statement->execute();
// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$city = $row['city'];
	$days = $row['num_days'];
	$nights = $row['num_nights'];
       $people = $row['num_people'];
       $price = $row['total_price'];
       $id = $row['package_id'];

       ?>

<li style="color:#656868; padding: 0px 10px; height: -1000px;">
<?php 

    echo "<a href='package_info.php?package_id=$id'>$city - $days - $nights - $people - $price</a>";
}

 ?>
 </li>
   </div>
       
     <hr>
       
  <h2 class="landscapes">What's Next?</h2> 
       
       <div class="next">In order to proceed to get information about the tour packages we offer please feel free to contact us by clicking the "Contact Us" tab on the top. We will provide you with the best selling tour packages for you to enjoy your adventure.</div>
       
       <hr>
       
<footer>
  <img src="footer.jpg" alt="footer" class="footer" >
</footer>

    </body>
</html>