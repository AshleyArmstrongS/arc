<?php require_once('Model.php'); ?>
<?php

class Schedules
{
    private $ppdfc_id;
    private $car_id;
    private $user_id;
    private $day;
    private $morning;
    private $evening;

    public function __construct($args)
    {
        if (!is_array($args)) {
            throw new Exception('Rating constructor requires an array');
        }
        $this->ppdfc_id = $args['ppdfc_id'] ?? NULL;
        $this->car_id   = $args['car_id']   ?? NULL;
        $this->user_id  = $args['user_id']  ?? NULL;
        $this->day      = $args['day']      ?? NULL;
        $this->morning  = $args['morning']  ?? NULL;
        $this->evening  = $args['evening']  ?? NULL;
    }

    public function getPpdfc_id()
    {
        return $this->ppdfc_id;
    }
    public function getCar_id()
    {
        return $this->car_id;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getDay()
    {
        return $this->day;
    }
    public function getMorning()
    {
        return $this->morning;
    }
    public function getEvening()
    {
        return $this->evening;
    }

    public function setPpdfc_id($ppdfc_id)
    {
        if ($ppdfc_id === NULL) {
            $this->ppdfc_id = NULL;
            return;
        }
        $this->ppdfc_id = $ppdfc_id;
    }
    public function setCar_id($car_id)
    {
        if ($car_id === NULL) {
            $this->car_id = NULL;
            return;
        }
        $this->car_id = $car_id;
    }
    public function setUser_id($user_id)
    {
        if ($user_id === NULL) {
            $this->user_id = NULL;
            return;
        }
        $this->user_id = $user_id;
    }
    public function setDay($day)
    {
        if ($day === NULL) {
            $this->day = NULL;
            return;
        }
        $this->day = $day;
    }
    public function setMorning($morning)
    {
        if ($morning === NULL) {
            $this->morning = NULL;
            return;
        }
        $this->morning = $morning;
    }
    public function setEvening($evening)
    {
        if ($evening === NULL) {
            $this->evening = NULL;
            return;
        }
        $this->evening = $evening;
    }
    public function createSched($sched, $db)
    {
        print_r($sched);
        $statement = $db->prepare('INSERT into passengersperdayforcar (car_id, user_id, day, morning, evening) VALUES(:car_id, :user_id, :day, :morning, :evening);');
        $statement->execute([
            'car_id' =>  $sched->getCar_id(),
            'user_id' => $sched->getUser_id(),
            'day' =>     $sched->getDay(),
            'morning' => $sched->getMorning(),
            'evening' => $sched->getEvening()
        ]);
        $saved = $statement->rowCount() === 1;
            
        if ($saved) {
            $sched->setPpdfc_id($db->lastInsertId());
            $statement->closeCursor();
            return true;
        }
    }       
    public static function getLiftsByCar_id($car_id, $db)
    {
        $statement = $db->prepare("SELECT car_id, day, user_id from passengersperdayforcar where car_id = :car_id;");
        $statement->execute([
            'car_id' => $car_id
        ]);
        $lifts = $statement->fetchAll();
        return $lifts;
    } 

    public static function getLiftsByCar_idP($car_id, $db)
    {
        $statement = $db->prepare("SELECT u.name, pc.day, pc.morning, pc.evening,    pc.car_id, pc.user_id from passengersperdayforcar pc inner join users u on pc.user_id = u.user_id where pc.car_id = :car_id;");
        $statement->execute([
            'car_id' => $car_id
        ]);
        $lifts = $statement->fetchAll();
        return $lifts;
    } 
    public static function getLiftsByUser_id($user_id, $db)
    {
        $statement = $db->prepare("SELECT u.name, c.estimated_pay, c.make, c.colour, pc.day, pc.morning, pc.evening, c.car_id, pc.user_id from passengersperdayforcar pc inner join car c on pc.car_id = c.car_id inner join users u on c.driver_id = u.user_id where pc.user_id = :user_id;");
        $statement->execute([
            'user_id' => $user_id
        ]);
        $lifts = $statement->fetchAll();
        return $lifts;
    } 
    public static function deleteScheduleByCar_idAndUser_id($car_id, $user_id, $db)
    {
        $statement = $db->prepare("DELETE from passengersperdayforcar where car_id = :car_id AND user_id = :user_id;");
        $statement->execute([
            'car_id' => $car_id,
            'user_id' => $user_id
        ]);
        $statement->closeCursor(); 
    }  
}
?>