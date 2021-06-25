<?php
class db_connect{
 public $link='';
 function __construct($location_id, $reading){
  $this->connect();
  $this->storeInDB($location_id, $reading);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'RedPing') or die('Cannot select the DB');
 }
 
 function storeInDB($location_id, $reading){


  $query = "insert into readings set location_id='".$_POST['location_id']."', reading='".$_POST['reading']."' ";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}


?>
