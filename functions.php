<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "caffeine";
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
    $sql    = "SELECT * FROM `directory` , `drinks`, `amenities` WHERE `directory`.`id` = `drinks`.`id` and `directory`.`id` = `amenities`.`id`";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $resp = '[';
        while ($row = $result->fetch_assoc()) {
            $resp .= '{"id" : ' . '"' . $row['id'] . '",';
            $resp .= '"establishmentName" : ' . '"' . $row['establishmentName'] . '",';
            $resp .= '"address" : ' . '"' . $row['address'] . '",';
            $resp .= '"contact" : ' . '"' . $row['contact'] . '",';
            $resp .= '"coffee" : ' . '"' . $row['coffee'] . '",';
            $resp .= '"sweets" : ' . '"' . $row['sweets'] . '",';
            $resp .= '"snacks" : ' . '"' . $row['snacks'] . '",';
            $resp .= '"meals" : ' . '"' . $row['meals'] . '",';
            $resp .= '"other" : ' . '"' . $row['other'] . '",';
            $resp .= '"wifi" : ' . '"' . $row['wifi'] . '",';
            $resp .= '"charging" : ' . '"' . $row['charging'] . '",';
            $resp .= '"parking" : ' . '"' . $row['parking'] . '",';
            $resp .= '"24hours" : ' . '"' . $row['24hours'] . '",';
            $resp .= '"smoking" : ' . '"' . $row['smoking'] . '",';
            $resp .= '"delivery" : ' . '"' . $row['delivery'] . '",';
            $resp .= '"pricepoint" : ' . '"' . $row['pricepoint'] . '"},';
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
    $coffee = $_POST['coffee'];
    $sweets = $_POST['sweets'];
    $snacks = $_POST['snacks'];
    $meals = $_POST['meals'];
    $other = $_POST['other'];
    $wifi = $_POST['wifi'];
    $charging = $_POST['charging'];
    $parking = $_POST['parking'];
    $24hours = $_POST['24hours'];
    $smoking = $_POST['smoking'];
    $delivery = $_POST['delivery'];
    $pricepoint = $_POST['pricepoint'];
    
    $sql = "INSERT INTO `directory` (`id`, `establishmentName`, `contact`,`address` ) VALUES (NULL, '" . $establishmentName . "', '".$contact."','" . $address . "');";
    $sql .= "INSERT INTO `drinks`(`id`, `coffee`, `sweets`, `snacks`, `meals`, `other`) VALUES (NULL, '" .$coffee."', '".$sweets."','".$snacks."','".$meals."','".$other."');";
    $sql .= "INSERT INTO `amenities`(`id`, `wifi`, `charging`, `parking`, `24hours`, `smoking`, `delivery`, `pricepoint`) VALUES (NULL, '" .$wifi."', '".$charging."','".$parking."','".$24hours."','".$smoking."','".$delivery."','".$pricepoint   ."');";
    $result = $GLOBALS['conn']->query($sql);
}

function updateData($id){
    if(isset($_POST['establishmentName'], $_POST['contact'],  $_POST['address'],$_POST['coffee'],$_POST['sweets'],$_POST['snacks'],$_POST['meals'],$_POST['other'],$_POST['wifi'],$_POST['charging'],$_POST['parking'],$_POST['24hours'],$_POST['smoking'],$_POST['delivery'],$_POST['pricepoint'])) {
    $establishmentName = $_POST['establishmentName'];
    $contact = $_POST['contact']; 
    $address = $_POST['address'];
    $coffee = $_POST['coffee'];
    $sweets = $_POST['sweets'];
    $snacks = $_POST['snacks'];
    $meals = $_POST['meals'];
    $other = $_POST['other'];
    $wifi = $_POST['wifi'];
    $charging = $_POST['charging'];
    $parking = $_POST['parking'];
    $24hours = $_POST['24hours'];
    $smoking = $_POST['smoking'];
    $delivery = $_POST['delivery'];
    $pricepoint = $_POST['pricepoint'];
    };
        $sql = "UPDATE `directory` SET `establishmentName` = '".$establishmentName."', `contact` = '".$contact."', `address` = '".$address."', `number` = '".$number."' WHERE `directory`.`id` = ".$_GET['id'];
        $sql .= "UPDATE `drinks` SET `coffee`= '".$coffee."', `sweets` = '".$sweets."', `snacks` = '".$snacks."', `meals` = '".$meals."', `other` = '".$other."' WHERE `drinks`.`id` = ".$_GET['id'];
        $sql .= "UPDATE `amenities` SET `wifi`= '".$wifi."', `charging` = '".$charging."', `parking` = '".$parking."', `24hours` = '".$24hours."', `smoking` = '".$smoking."', `delivery` = '".$delivery."', `pricepoint`= '".$pricepoint."' WHERE `drinks`.`id` = ".$_GET['id'];
        $result = $GLOBALS['conn']->query($sql);
}
function deleteLocation($id)
{
    $sql   = "DELETE FROM `directory` WHERE `id` = " . $id . "";
    $sql  .= "DELETE FROM `drinks` WHERE `id` = " . $id . "";
    $sql  .= "DELETE FROM `amenities` WHERE `id` = " . $id . "";
    $resul = $GLOBALS['conn']->query($sql);
}