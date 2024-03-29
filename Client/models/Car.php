<?php require_once('Model.php'); ?>
<?php

class Car
{
    var $car_id;
    var $driver_id;
    var $estimated_pay;
    var $make;
    var $colour;
    var $Monday;
    var $Tuesday;
    var $Wednesday;
    var $Thursday;
    var $Friday;

    //constructor
    public function __construct($args, $db)
    {
        $this->car_id          = $args['car_id']        ?? NULL;
        $this->driver_id       = $args['driver_id']     ?? NULL;
        $this->estimated_pay   = $args['estimated_pay'] ?? NULL;
        $this->make            = $args['make']          ?? NULL;
        $this->colour          = $args['colour']        ?? NULL;
        $this->Monday          = $args['Monday']          ?? NULL;
        $this->Tuesday          = $args['Tuesday']          ?? NULL;
        $this->Wednesday          = $args['Wednesday']          ?? NULL;
        $this->Thursday          = $args['Thursday']          ?? NULL;
        $this->Friday          = $args['Friday']          ?? NULL;
        // $this->Monday          = $args['Monday']        ?? getPeopleInCarForDay($db, $this->car_id, 'Monday');
        // $this->Tuesday         = $args['Tuesday']       ?? getPeopleInCarForDay($db, $this->car_id, 'Monday');
        // $this->Wednesday       = $args['Wednesday']     ?? getPeopleInCarForDay($db, $this->car_id, 'Monday');
        // $this->Thursday        = $args['Thursday']      ?? getPeopleInCarForDay($db, $this->car_id, 'Monday');
        // $this->Friday          = $args['Friday']        ?? getPeopleInCarForDay($db, $this->car_id, 'Monday');
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
    public function getEstimated_pay()
    {
        return $this->estimated_pay;
    }
    public function getMake()
    {
        return $this->make;
    }
    public function getColour()
    {
        return $this->colour;
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
            return;
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
    public function setWednesday($Wednesday)
    {
        if (!is_array($Wednesday)) {
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

    //Crud
    public static function addCar($car, $db)
    {
        $statement = $db->prepare("INSERT into car(driver_id, estimated_pay, make, colour) values (:driver_id, :estimated_pay, :make, :colour);");
        $statement->execute([

            'driver_id'    => $car->getDriver_id(),
            'estimated_pay' => $car->getEstimated_pay(),
            'make'       => $car->getMake(),
            'colour'        => $car->getColour()
        ]);
        $statement->closeCursor();
    }

    public static function getCar_idByDriver_id($driver_id, $db)
    {
        $statement = $db->prepare("select * from car where driver_id = :driver_id;");
        $statement->execute([
            'driver_id' => $driver_id
        ]);
        $car_id = $statement->fetch();
        return $car_id['car_id'];
    }


    public static function addNullPassengers($db, $car_id)
    {
        $statement = $db->prepare("insert into passengersperdayforcar (car_id, user_id, day) values (:car_id, null, 'Monday'), (:car_id, null, 'Tuesday'), (:car_id, null, 'Wednesday'), (:car_id, null, 'Thursday'), (:car_id, null, 'Friday')");
        $statement->execute([
            'car_id' => $car_id
        ]);
        $statement->closeCursor();

    }

}
