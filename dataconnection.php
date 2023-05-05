<?php

$connect= mysqli_connect("localhost","root","","fyp");// fill out database name

if(! $connect){
    echo "Connection error";
}else{
    echo" Connection worked!";
}


?>
