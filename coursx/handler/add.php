<?php
require "../dbBroker.php";
require "../model/course.php";

if (isset($_POST['nazivKursa']) && isset($_POST['provajderKursa']) 
    && isset($_POST['opisKursa']) && isset($_POST['cenaKursa'])) {
    $status = Course::add($_POST['nazivKursa'], $_POST['provajderKursa'], $_POST['opisKursa'], $_POST['cenaKursa'], $conn);
    if ($status) {
        echo 'Success';
    } else {
        echo $status;
        echo 'Failed';
    }
}