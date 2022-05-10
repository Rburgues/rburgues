<?php


$connection = mysqli_connect(
    "127.0.0.1:3306",
    "u657661285_user",
    "Matcar28-03",
    "u657661285_matcar"
);

/*
$connection = mysqli_connect(
    "localhost",
    "root",
    "",
    "matcar"
);

*/

$user = $_POST['username'];
$password = $_POST['pass'];

$select = "SELECT * FROM users
            WHERE username = '$user'
            and password = '$password'";

$select_ex = mysqli_query($connection, $select);

 if($select_ex == false){
     echo "Error $select";
 }
 else {
     $total = mysqli_num_rows($select_ex);

     if($total === 1) {

        $reg = mysqli_fetch_array($select_ex);
        
        session_start();
        $_SESSION['id'] = $reg['Id_user'];

        // Redirección
        header("location: admin_ordenes/index.php");
     }
     else {
         echo "nonop";
     }
 } ?>

