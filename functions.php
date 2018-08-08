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
            $resp .= '"is_done" : ' . '"' . $row['is_done'] . '",';
            $resp .= '"task" : ' . '"' . $row['task'] . '"},';
        }
        $resp .= ']';
        $resp = str_replace(',]', ']', $resp);
        echo $resp;
    }
}

function addLocation()
{
    $is_done = $_POST['is_done'];
    $task    = $_POST['task'];
    
    
    $sql    = "INSERT INTO `directory` (`id`, `is_done`, `task`) VALUES (NULL, '" . false . "', '" . $task . "');";
    $result = $GLOBALS['conn']->query($sql);
}
function deleteLocation($id)
{
    $sql   = "DELETE FROM `directory` WHERE `id` = " . $id . "";
    $resul = $GLOBALS['conn']->query($sql);
}