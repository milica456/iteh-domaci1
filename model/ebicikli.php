<?php

class Ebicikli{
    public $id;
    public $naziv;
    public $model;

    public function __construct($id=null, $naziv=null, $model=null)
    {
        $this->id = $id;
        $this->naziv = $naziv;
        $this->model = $model;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM ebicikli";
        return $conn->query($query);
    }

}




?>