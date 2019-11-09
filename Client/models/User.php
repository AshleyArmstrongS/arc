<<?php require_once('Model.php'); ?>
<?php

class User {

    private $user_id;
    private $name;
    private $age;
    private $gender;
    private $email;
    private $hash;
    private $college;
    private $description;
    private $user_type;
    private $location_id;
//constructor
    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('User constructor requires an array');
        }
        $this->user_id      = $args['user_id'] ?? NULL;
        $this->name         = $args['name'] ?? NULL;
        $this->age          = $args['age'] ?? NULL;
        $this->gender       = $args['gender'] ?? NULL;
        $this->email        = $args['email'] ?? NULL;
        $this->hash         = $args['hash'] ?? NULL;
        $this->college      = $args['college'] ?? NULL;
        $this->description  = $args['description'] ?? NULL;
        $this->user_type    = $args['user_type'] ?? NULL;
        $this->location_id  = $args['location_id'] ?? NULL;
    }
//getters
    public function getUser_id ()
    {
        return $this->user_id;
    }
    public function getName ()
    {
        return $this->name;
    }
    public function getAge ()
    {
        return $this->age;
    }
    public function getGender ()
    {
        return $this->gender;
    }
    public function getEmail()
    {
        return $this->Email;
    }public function getHash ()
    {
        return $this->hash;
    }
    public function getCollege ()
    {
        return $this->college ;
    }
    public function getDescription ()
    {
        return $this->description ;
    }
    public function getUser_type()
    {
        return $this->user_type ;
    }
    public function getLocation ()
    {
        return $this->location;
    }
//setters
    public function setUser_id($user_id)
    {
        if ($user_id === NULL) {
            $this->user_id = NULL;
            return;
        }
        $this->user_id = $user_id;
    }
    public function setName($name)
    {
        if ($name === NULL) {
            $this->name = NULL;
            return;
        }
        $this->name = $name;
    }
    public function setAge($age)
    {
        if ($age === NULL) {
            $this->age = NULL;
            return;
        }
        $this->age = $age;
    }
    public function setGender($gender)
    {
        if ($gender === NULL) {
            $this->gender = NULL;
            return;
        }
        $this->gender = $gender;
    }
    public function setEmail($email)
    {
        if ($email === NULL) {
            $this->email = NULL;
            return;
        }
        $this->email = $email;
    }
    public function setHash($hash)
    {
        if ($hash === NULL) {
            $this->hash = NULL;
            return;
        }
        $this->hash = $hash;
    }
    public function setCollege()
    {
        if ($college === NULL) {
            $this->college = NULL;
            return;
        }
        $this->college = $college;
    }
    public function setDescription($description)
    {
        if ($description === NULL) {
            $this->description = NULL;
            return;
        }
        $this->description = $description;
    }
    public function setUser_type($user_type)
    {
        if ($user_type === NULL) {
            $this->user_type = NULL;
            return;
        }
        $this->user_type = $user_type;
    }
    public function setLocation_id($location_id)
    {
        if ($location_id === NULL) {
            $this->location_id = NULL;
            return;
        }
        $this->location_id = $location_id;
    }
}