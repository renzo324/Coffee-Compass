<?php 
$servername = "localhost";
$username   = "lorenzot_caffeine";
$password   = "archangel324";
$dbname     = "lorenzot_caffeine";
$conn       = new mysqli($servername, $username, $password, $dbname);
if(isset($_GET['function'])){
    if($_GET['function']== 'users'){
        $sql= "SELECT * FROM `users`";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $results->fetch_assoc()){
                echo $row['Email'];
            }
        }
    }
}