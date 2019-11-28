<?php require_once('Model.php'); ?>
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
    private $available;
//constructor
    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('User constructor requires an array');
        }
        $this->user_id      = $args['user_id']     ?? NULL;
        $this->name         = $args['name']        ?? NULL;
        $this->age          = $args['age']         ?? NULL;
        $this->gender       = $args['gender']      ?? NULL;
        $this->email        = $args['email']       ?? NULL;
        $this->hash         = $args['password']    ?? NULL;
        $this->college      = $args['college']     ?? NULL;
        $this->description  = $args['description'] ?? NULL;
        $this->user_type    = $args['user_type']   ?? NULL;
        $this->location_id  = $args['location_id'] ?? NULL;
        $this->available    = $args['available']   ?? 'Y'; 
    }
//getters
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function getGender()
    {
        return $this->gender;
    }
    public function getEmail()
    {
        return $this->email;
    }public function getHash()
    {
        return $this->hash;
    }
    public function getCollege()
    {
        return $this->college;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getUser_type()
    {
        return $this->user_type;
    }
    public function getLocation()
    {
        return $this->location_id;
    }
    public function getAvailable()
    {
        return $this->available;
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
    public function setCollege($college)
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
    public function setAvailable($available)
    {
        if ($available === NULL) {
            $this->available = NULL;
            return;
        }
        $this->available = $available;
    }

// gets
    public static function getAllUsers($db)
    {
        $statement = $db->prepare("select u.user_id, u.name, u.age, u.gender, u.email, u.college, u.description, u.user_type, l.address, u.available from users u inner join location l on u.location_id = l.location_id;");
        $statement->execute();

        $users = [];
        foreach($statement->fetchAll() as $row) {
        array_push($users, new User($row));
    }
   

    return $users;
        // $users = $statement->fetchAll();
        // $statement->closeCursor();
        // return $users;
    }

    public static function searchUsersByName($name,$db)
    {
        // \\'%:name%\\'
        
        $statement = $db->prepare('SELECT user_id, name,age, location_id FROM users WHERE name @@ :name');
        $statement->execute([
            'name' => $name
        ]);
        $users = [];
        foreach($statement->fetchAll() as $row) {
        array_push($users, new User($row));
        }
   

    return $users;
    }

    public static function getUserById($user_id, $db)
    {
        // if(!($db instanceof PDO)) 
        // {
        //     throw new Exception('Invalid PDO object for user findOneById');
        // }

        $statement = $db->prepare("SELECT * FROM users WHERE user_id = :user_id LIMIT 1");
        $statement->execute([
            'user_id' => $user_id
        ]);
        $user = $statement->fetch();
        return $user !== FALSE ? new User($user) : NULL;
    }

    public static function getUserByEmail($email, $db)
    {
        // if(!($db instanceof PDO)) 
        // {
        //     throw new Exception('Invalid PDO object for user findOneById');
        // }

        $statement = $db->prepare("select user_id, name, age, gender, email, password, college, description, user_type, location_id, available FROM users WHERE email = :email LIMIT 1");
        $statement->execute([
            'email' => $email
        ]);
        $user = $statement->fetch();
        return $user !== FALSE ? new User($user) : NULL;
    }

    public static function getUserByUser_ID($user_id, $db)
    {

        $statement = $db->prepare("SELECT user_id, name, age, gender, email, password, college, description, user_type, location_id, available FROM users WHERE email = :email LIMIT 1");
        $statement->execute([
            'user_id' => $user_id
        ]);
        $user = $statement->fetch();
        return $user !== FALSE ? new User($user) : NULL;
    }

    public static function getPassengers($db)
    {
        $statement = $db->prepare("select u.user_id, u.name, u.age, u.gender, u.email, u.college, u.description, u.user_type, l.address, u.available from users u inner join location l on u.location_id = l.location_id where u.user_type = 'P';");
        $statement->execute();
        $passengers = $statement->fetchAll();
        $statement->closeCursor();
        return $passengers;
    }

    public static function getDrivers($db)
    {
        $statement = $db->prepare("select u.user_id, u.name, u.age, u.gender, u.email, u.college, u.description, u.user_type, l.address, u.available from users u inner join location l on u.location_id = l.location_id where u.user_type = 'P';");
        $statement->execute();
        $drivers = $statement->fetchAll();
        $statement->closeCursor();
        return $drivers;
    }

    public static function getDriversByGender($db, $gender)
    {
        $statement = $db->prepare("select user_id, name, age, location_id from users where gender = :gender and user_type = 'D'");
        $statement->execute([
            'gender' => $gender
        ]);
        $drivers = $statement->fetchAll();
        $statement->closeCursor();
        return $drivers;
    }

    public static function getDriversByDay($db, $day)
    {
        $statement = $db->prepare("select c.driver_id, u.name, c.car_id, u.location_id, count(*) as passengerCount, p.day from car c inner join users u on c.driver_id = u.user_id inner join passengersperdayforcar p on c.car_id = p.car_id where day = :day and user_type = 'D' group by c.car_id, p.day, u.name, u.location_id having count(*) < 4 order by count(*) desc;");
        $statement->execute([
            'day' => $day
        ]);
        $drivers = $statement->fetchAll();
        $statement->closeCursor();
        return $drivers;
    }

    public static function getDriversByDayAndGender($db, $day, $gender)
    {
        $statement = $db->prepare("select c.driver_id, u.name, c.car_id, count(*) as passengerCount, p.day, u.location_id from car c inner join users u on c.driver_id = u.user_id inner join passengersperdayforcar p on c.car_id = p.car_id where day = :day and gender = :gender and user_type = 'D' group by c.car_id, p.day, u.name, u.location_id having count(*) < 4 order by count(*) desc");
        $statement->execute([
            'day' => $day,
            'gender' => $gender
        ]);
        $drivers = $statement->fetchAll();
        $statement->closeCursor();
        return $drivers;
    }


    // CRUD
    public static function addUser($db, $user)
    {
        $statement = $db->prepare("INSERT into users(name, age, gender, email, password, college, description, user_type, location_id, available) values (:name, :age, :gender, :email, :password, :college, :description, :user_type, :location_id, :available); ");
        $statement->execute([

            'name'         => $user->getName(),
            'age'          => $user->getAge(),
            'gender'       => $user->getGender(),
            'email'        => $user->getEmail(),
            'password'     => $user->getHash(),
            'college'      => $user->getCollege(),
            'description'  => $user->getDescription(),
            'user_type'    => $user->getUser_type(),
            'location_id'  => $user->getLocation(),  // thisll have to become a getLocation_id thing
            'available'    => $user->getAvailable() ?? 'Y'
        ]);
        $statement->closeCursor();
    }

    public static function updateUser($db, $user)
    {
        $statement = $db->prepare("UPDATE users set name = :name, age = :age, gender = :gender, email = :email, password = :hash, college = :college, description = :description, user_type = :user_type, location_id = :location_id, available = :available where user_id = :user_id;");
        $statement->execute([
            'name'         => $this->getName(),
            'age'          => $this->getAge(),
            'gender'       => $this->getGender(),
            'email'        => $this->getEmail(),
            'hash'         => $this->getHash(),
            'college'      => $this->getCollege(),
            'description'  => $this->getDescription(),
            'user_type'    => $this->getUser_type(),
            'location_id'  => $this->getLocation(),  // thisll have to become a getLocation_id thing
            'available'    => $this->getAvailable() ?? 'Y'
        ]);
        $statement = cursorClose();
    }

    public static function deleteUser($db, $user_id)
    {
        $statement = $db->prepare("delete from users where user_id = :user_id");
        $statement->execute([
            'user_id' => $this->getUser_id()
        ]);
        $statement->closeCursor();
    }
}