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
        addTask();
    if ($_GET['function'] == 'deleteLocation')
        deleteTask($_GET['id']);
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
            $resp .= '"address" : ' . '"' . $row['address'] . '"},';
        }
        $resp .= ']';
        $resp = str_replace(',]', ']', $resp);
        echo $resp;
    }
}

function addLocation()
{
    $establishmentName = $_POST['establishmentName'];
    $address    = $_POST['address'];
    
    
    $sql    = "INSERT INTO `directory` (`id`, `establishmentName`, `address`) VALUES (NULL, '" . false . "', '" . $address . "');";
    $result = $GLOBALS['conn']->query($sql);
}
function deleteLocation($id)
{
    $sql   = "DELETE FROM `directory` WHERE `id` = " . $id . "";
    $resul = $GLOBALS['conn']->query($sql);
}