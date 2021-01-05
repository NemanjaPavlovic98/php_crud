<?php

require "../dbBroker.php";
require "../model/course.php";

if(isset($_POST['id'])) {
    $myArray = Course::getById($_POST['id'], $conn);
    echo json_encode($myArray);
}