<?php
require_once 'clientDataService.php';
require_once 'Client.php';

$c = new clientDataService();

//echo "<pre>" . print_r ($c->findByFirstName("Jay"), true) . "</pre>";

echo json_encode($c->findByFirstName("Jay"));

echo json_encode($c->findByLastName("Brady"));

echo json_encode($c->findById(1));
echo "<br>";
if ($c->delete(1)){
    echo "Client 1 deleted<br>"; //cannot delete because of a foreign key in exercise sheet
}else{
    echo "Failed to delete client";
}
echo "<hr>";

$newClient = new Client(1, "", "", "", "", "", "Back injury", "85kg", "", "");

echo "<pre>" . print_r ($c->findById(1), true) . "</pre>";

$c->update(1, $newClient);

//echo "<pre>" . print_r ($c->findById(1), true) . "</pre>";
//$date_old = "03-03-1982 23:15:23";
//$date_new = date("Y-m-d H:i:s",$date_old);
//$insertClient = new Client("Tom", "Stall", "Cork", "0872222222", "03-03-1982", "NA", "80kg", "5 6", "3Password" );

//$c->insert($insertClient);