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

	 $db = mysqli_connect('localhost', 'root', '', 'redping');  
		if(!$db ) {
		    die('Could not connect: ' . mysql_error());
		}

	$mysqli = new mysqli('localhost', 'root', '', 'redping');	

	$query = "insert into readings set location_id='". $location_id ."', reading='". $reading ."' ";
	$result = $db->query($query);
  	
 if (
        mysqli_query($db, $query)){
   		echo "New order added successfully\n";
		    header('Location: httpost.html');
		} else {
		    echo "Error: " 
		    . $array[0] .  "<br>" . mysqli_error($db);
		    $_SESSION["err_message"]="Something went wrong. Please try again!";
		    //header('Location: httpost.php'); 
		}
  	echo "Reading:  " . $reading . "<br />";
    echo "location_id:  ". $location_id . " years old.";
	
	mysqli_close($db);
?>
