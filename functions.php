<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "directory";
$conn       = new mysqli($servername, $username, $password, $dbname);


if ($_GET) {
    if ($_GET['function'] == 'getData')
        getData();
    if ($_GET['function'] == 'addLocation')
        addLocation();
    if ($_GET['function'] == 'deleteLocation')
        deleteLocation($_GET['id']);
}

function getData()
{
    $sql    = "SELECT * FROM `directory`";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $resp = '[';
        while ($row = $result->fetch_assoc()) {
            $resp .= '{"id" : ' . '"' . $row['id'] . '",';
            $resp .= '"establishmentName" : ' . '"' . $row['establishmentName'] . '",';
            $resp .= '"address" : ' . '"' . $row['address'] . '",';
            $resp .= '"contact" : ' . '"' . $row['contact'] . '"},';
        }
        $resp .= ']';
        $resp = str_replace(',]', ']', $resp);
        echo $resp;
    }
}

function addLocation()
{
    $establishmentName = $_POST['establishmentName'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];
    
    
    $sql    = "INSERT INTO `directory` (`id`, `establishmentName`, `contact`,`address` ) VALUES (NULL, '" . $establishmentName . "', '".$contact."','" . $address . "');";
    $result = $GLOBALS['conn']->query($sql);
}

function updateData($id){
    if(isset($_POST['establishmentName'], $_POST['contact'],  $_POST['address'])) {
    $establishmentName = $_POST['establishmentName'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];
    };
        $sql = "UPDATE `directory` SET `establishmentName` = '".$establishmentName."', `contact` = '".$contact."', `address` = '".$address."', `number` = '".$number."' WHERE `directory`.`id` = ".$_GET['id'];
        $result = $GLOBALS['conn']->query($sql);
}
function deleteLocation($id)
{
    $sql   = "DELETE FROM `directory` WHERE `id` = " . $id . "";
    $resul = $GLOBALS['conn']->query($sql);
}