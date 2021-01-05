<?php
class Course
{
    public $id;
    public $naziv;
    public $provajder;
    public $opis;
    public $cena;

    public function __construct($id = null, $naziv = null, $provajder = null, $opis = null, $cena = null)
    {
        $this->id = $id;
        $this->naziv = $naziv; 
        $this->provajder = $provajder;
        $this->opis = $opis;
        $this->cena = $cena;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM course";
        return $conn->query($q);
    }

    public static function getById($id, mysqli $conn)
    {
        $q = "SELECT * FROM coursex WHERE id=$id";
        $myArray = array();
        if ($result = $conn->query($q)) {

            while ($row = $result->fetch_array(1)) {
                $myArray[] = $row;
            }
        }
        return $myArray;
    }

    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM course WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($naziv, $provajder, $opis, $cena, mysqli $conn)
    {
        $q = "INSERT INTO course(naziv,provajder,opis,cena) values('$naziv','$provajder', '$opis', $cena)";
        return $conn->query($q);
    }

    public static function update($id, $naziv, $provajder, $opis, $cena, mysqli $conn)
    {
        $q = "UPDATE coursex set naziv='$naziv', provajder='$provajder', opis='$opis', cena='$cena' where id=$id";
        return $conn->query($q);
    }
}