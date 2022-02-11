<?php 


$host = 'localhost'; // sizin host
$db = 'anbar'; //sizin db name
$username = 'root'; //sizin user name
$password = ''; // db parol



try {
   
  $db = new PDO("mysql:host=$host;dbname=$db;charset=utf8","$username","$password"); 
   
}catch (PDOException $message) {
   
  echo $message->getmessage(); 
   
}

