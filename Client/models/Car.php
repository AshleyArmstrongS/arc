<<?php require_once('Model.php'); ?>
<?php

class Car {
    var $car_id;
    var $driver_id;
    var $est_pay;
    var $make;
    var $colour;
//constructor
    public function __construct($args) {
        $this->car_id     = $args['car_id'] ?? NULL;
        $this->driver_id     = $args['driver_id'] ?? NULL;
        $this->est_pay     = $args['est_pay'] ?? NULL;
        $this->make     = $args['make'] ?? NULL;
        $this->colour     = $args['colour'] ?? NULL;
    }
//getters
    public function getCar_id()
    {
        return $this->car_id;
    }
    public function getDriver_id()
    {
        return $this->driver_id;
    }
    public function getEst_pay()
    {
        return $this->est_pay;
    }
    public function getMake()
    {
        return $this->make;
    }
    public function getColour()
    {
        return $this->color;
    }

//setters
    public function setCar_id($car_id)
    {
        if ($car_id === NULL) {
            $this->car_id = NULL;
            return;
        }
        $this->car_id = $car_id;
    }
    public function set($driver_id)
    {
        if ($driver_id === NULL) {
            $this->driver_id = NULL;
            return ;
        }
            $this->driver_id = $driver_id;
    }
    public function set($est_pay)
    {
        if ($est_pay === NULL) {
            $this->est_pay = NULL;
            return;
        }
        $this->est_pay = $est_pay;
    }
    public function set($make)
    {
        if ($make === NULL) {
            $this->make = NULL;
            return;
        }
        $this->make = $make;
    }
    public function set($color)
    {
        if ($color === NULL) {
            $this->color = NULL;
            return;
        }
        $this->color = $color;
    }
}
