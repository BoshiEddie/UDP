<?php
require_once 'ClientDAO.php';
require_once 'InstructorDAO.php';
require_once 'Client.php';
require_once 'ExerciseActionDAO.php';
require_once 'ExerciseAction.php';
require_once 'BodyPart.php';
require_once 'BodyPartDAO.php';
require_once 'ExerciseSheetDAO.php';

$bp = new BodyPartDAO();
$c = new ClientDAO();
$i = new InstructorDAO();
$exercise = new ExerciseActionDAO();
$es = new ExerciseSheetDAO();

echo json_encode($bp->findByBodyPartName("legs"));

echo "<hr>";

//echo "<pre>" . print_r ($c->findByFirstName("Jay"), true) . "</pre>";


echo json_encode($exercise->findExercise("bench Press"));

echo "<hr>";

echo json_encode($c->findByFirstName("Jay"));

echo "<hr>";

echo json_encode($i->findByFirstName("Ken"));

echo "<hr>";

echo json_encode($es->findSheet("Chest Practice"));

//$i->insert("Tom", "Stall", "Cork", "0872222222", "03-03-1982", "3Password", 1, "tom@nomail.com");

//$i->update(3, "", "", "", "08733333333", "", "", 1, "tomstall@nomail.com");
//echo json_encode($c->findByLastName("Brady"));

//echo json_encode($c->findById(1));
//echo "<br>";
//if ($c->delete(1)){
//   echo "Client 1 deleted<br>"; //cannot delete because of a foreign key in exercise sheet
//}else{
//    echo "Failed to delete client";
//}
//echo "<hr>";

//$newClient = new Client(1, "", "", "", "", "", "Back injury", "85kg", "", "");

//echo "<pre>" . print_r ($c->findById(1), true) . "</pre>";

//$c->update(1, $newClient);

//echo "<pre>" . print_r ($c->findById(1), true) . "</pre>";
//$date_old = "03-03-1982 23:15:23";
//$date_new = date("Y-m-d H:i:s",$date_old);
//$insertClient = new Client("Tom", "Stall", "Cork", "0872222222", "03-03-1982", "NA", "80kg", "5 6", "3Password" );

//$c->insert($insertClient);