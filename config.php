<?php
session_start();
$host="localhost";
$db="pixlogix";
$user="root";
$pass="";
$conn= mysqli_connect($host,$user,$pass,$db);
if(!$conn){
  echo "connection Falid ".mysqli_connect_error();
}

function prx($arr){
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
  die();
}
function pr($arr){
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}