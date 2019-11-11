<<?php require_once('Model.php'); ?>
<?php

class Car {
    private $car_id;
    private $driver_id;
    private $est_pay;
    private $make;
    private $colour;
    private $monday;
    private $Tuesday;
    private $Wednesday;
    private $Thursday;
    private $Friday;

//constructor
    public function __construct($args) {
        $this->car_id    = $args['car_id'] ?? NULL;
        $this->driver_id = $args['driver_id'] ?? NULL;
        $this->est_pay   = $args['est_pay'] ?? NULL;
        $this->make      = $args['make'] ?? NULL;
        $this->colour    = $args['colour'] ?? NULL;
        $this->Monday    = $args['Monday'] ?? NULL;
        $this->Tuesday   = $args['Tuesday'] ?? NULL;
        $this->Wednesday = $args['Wednesday'] ?? NULL;
        $this->Thursday  = $args['Thursday'] ?? NULL;
        $this->Friday    = $args['Friday'] ?? NULL;
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
//weekDayGetters
    public function getMonday()
    {
        return $this->Monday;
    }
    public function getTuesday()
    {
        return $this->Tuesday;
    }
    public function getWednesday()
    {
        return $this->Wednesday;
    }
    public function getThursday()
    {
        return $this->Thursday;
    }
    public function getFriday()
    {
        return $this->Friday;
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
    public function setDriver_id($driver_id)
    {
        if ($driver_id === NULL) {
            $this->driver_id = NULL;
            return ;
        }
            $this->driver_id = $driver_id;
    }
    public function setEst_pay($est_pay)
    {
        if ($est_pay === NULL) {
            $this->est_pay = NULL;
            return;
        }
        $this->est_pay = $est_pay;
    }
    public function setMake($make)
    {
        if ($make === NULL) {
            $this->make = NULL;
            return;
        }
        $this->make = $make;
    }
    public function setColor($color)
    {
        if ($color === NULL) {
            $this->color = NULL;
            return;
        }
        $this->color = $color;
    }
//weekDaySetters
    public function setMonday($Monday)
        {
            if (!is_array($Monday)) {
                $this->Monday = NULL;
                return;
            }
            $this->Monday = $Monday;
        }
        public function setTuesday($Tuesday)
        {
            if (!is_array($Tuesday)) {
                $this->Tuesday = NULL;
                return;
            }
            $this->Tuesday = $Tuesday;
        }
        public function set($)
        {
            if (!is_arrayWednesday($Wednesday)) {
                $this->Wednesday = NULL;
                return;
            }
            $this->Wednesday = $Wednesday;
        }
        public function setThursday($Thursday)
        {
            if (!is_array($Thursday)) {
                $this->Thursday = NULL;
                return;
            }
            $this->Thursday = $Thursday;
        }
        public function setFriday($Friday)
        {
            if (!is_array($Friday)) {
                $this->Friday = NULL;
                return;
            }
            $this->Friday = $Friday;
        }
}
