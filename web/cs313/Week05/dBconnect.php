<?php

function get_db(){
$db = NULL; 

}

try
{
  $dbUrl = getenv('postgres://cllstbfnqmjbse:c4681ab5380bc2b0c699c714480be54594ab059fcebcc00953699fb4342c82e7@ec2-23-21-186-85.compute-1.amazonaws.com:5432/d4uj8uaup6ucv9
  ');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["ec2-23-21-186-85.compute-1.amazonaws.com"];
  $dbPort = $dbOpts["5432"];
  $dbUser = $dbOpts["cllstbfnqmjbse"];
  $dbPassword = $dbOpts["c4681ab5380bc2b0c699c714480be54594ab059fcebcc00953699fb4342c82e7"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>