<?php
if (!isset($_GET['package_id']))
{
    die("ERROR, CITY NOT DECLARED...");

}
$city = htmlspecialchars($_GET['package_id']);


$stmt = $db->prepare('SELECT * FROM package WHERE city=package_id');
$stmt->bindValue(':id', $city, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
       a {color:ghostwhite}
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
       <h2>Package Info For City <?php echo $city ;?></h2>
       <div class="introduction"> 
    
 <?php
       foreach ($rows as $row)
{
    $content = $row['price'];
       ?>

<li style="color:#656868; padding: 0px 10px; height: -1000px;">
<?php 

    echo "<p> $content </p>";
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