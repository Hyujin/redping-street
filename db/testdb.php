<?php

if(isset($_GET['reading'])){
      $reading = $_GET['reading']; 
 }else{
      $reading = "reading not set in GET Method";
 }
if(isset($_GET['location_id'])){
      $location_id = $_GET['location_id']; 
 }else{
      $location_id = "<br>location_id not set in GET Method";
 }

/*
class db_connect{

 public $link='';

 function __construct($location_id, $reading){
  $this->connect();
  $this->storeInDB($location_id, $reading);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'redping') or die('Cannot select the DB');
 }
 
 function storeInDB($location_id, $reading){


  $query = "insert into readings set location_id='".$_GET['location_id']."', reading='".$_GET	['reading']."' ";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
  	echo "Reading:  " . $reading . "<br />";
    echo "location_id:  ". $location_id . " years old.";
 }
 
}
*/
	 $db = mysqli_connect('localhost', 'root', '', 'redping');  
		if(!$db ) {
		    die('Could not connect: ' . mysql_error());
		}

	$mysqli = new mysqli('localhost', 'root', '', 'redping');	

	$query1 = "insert into readings set location_id= '". $location_id ."', reading= '". $reading ."' ";
  $randomNumber1 = rand(5, 20);
  $randomNumber2 = rand(0, 5);
  $randomNumber3 = rand(2, 8);

  $reading2 = $randomNumber1 + $reading;
  $reading3 = $reading - $randomNumber2;
  $reading4 = $randomNumber3 + $reading; 
  
  //Special case for tower 3
  if ($reading2<0){
    $reading2 = 0;
  }

  $query2 = "insert into readings set location_id= 2, reading= '". $reading2 ."' ";
  $query3 = "insert into readings set location_id= 3, reading= '". $reading3 ."' ";
  $query4 = "insert into readings set location_id= 4, reading= '". $reading4 ."' ";


	$result1  = $db->query($query1);
  $result2 = $db->query($query2);
  $result3 = $db->query($query3);
  $result4 = $db->query($query4);
    
  	
 if (
      mysqli_query($db, $result1)){
   		echo "New order added successfully\n";
      echo "Reading:  " . $reading . "<br />";
      echo "location_id:  ". $location_id . " years old.";
		    header('Location: httpost.html');
		} else {
		    echo "Error: " 
		    . $array[0] .  "<br>" . mysqli_error($db);
		    $_SESSION["err_message"]="Something went wrong. Please try again!";
		    header('Location: httpost.html'); 
		}
  	echo "Reading:  " . $reading . "<br />";
    echo "location_id:  ". $location_id . " years old.";
	
	mysqli_close($db);

?>
