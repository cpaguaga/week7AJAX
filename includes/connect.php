<?php
$host = "localhost"; 
$user = "root";  
$password = ""; //leave blank for windows
$db = "db_cooper_info"; 

$conn = mysqli_connect($host, $user, $password, $db); 
mysqli_set_charset($conn, 'utf8'); //windows specific 

if (!$conn) {
    echo "something broke... connection isn't working"; 
    exit; 
}

// echo "connected!";

// go and get all the data from the database 
//$myQuery = "SELECT * FROM mainmodel"; 
//$result = mysqli_query($conn, $myQuery); 
//$row = array(); 

// fill the array with the result set and send it to browser 
//while($row = mysqli_fetch_assoc($result)) {
    //$rows[] = $row; 
//}

//get one item from the database 
if (isset($_GET["modelNo"])) {
    $car = $_GET["modelNo"]; 

    $myQuery = "SELECT * FROM mainmodel WHERE model='$car"; 

    $result = mysqli_query($conn, $myQuery); 
    $rows = array(); 

    // fill the array with the result set and send it to browser 
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row; 
    }
}
// encode the result and send it back 
echo json_encode($rows); 
?>