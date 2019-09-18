<?php

require 'new.php';


$longitudine = $_POST['longitudine'];
$latitudine = $_POST['latitudine'];
$descriere= $_POST['descriere'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileName = $_FILES['file']['name'];
$icon = $_POST['icon'];


$sql = "INSERT INTO coo ( longitudine, latitudine, descriere , tmp_name , name , icon )
 VALUES( '$longitudine', '$latitudine', '$descriere' , '$fileTmpName', '$fileName' , '$icon')";
$result = mysqli_query($con,$sql);
echo "coordonatele au fost introduse";
header('location: map3.php');








  ?>
