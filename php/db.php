<?php
$servername="localhost";
$username="root";
$password="";
$DBname="j1_php";

$conn=new mysqli($servername,$username,$password,$DBname);
if(!$conn){
    echo "DB Not Connected";
}