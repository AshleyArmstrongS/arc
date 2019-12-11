<?php require_once('Model.php') ?>
<?php

class Location
{
    private $location_id;
    private $address;
    private $latitude;
    private $longitude;

    public function __construct($args)
    {
        if (!is_array($args)) {
            throw new Exception('Location constructor requires an array');
        }
        $this->location_id   = $args['location_id']      ?? NULL;
        $this->address       = $args['address']          ?? NULL;
        $this->latitude      = $args['latitude']         ?? NULL;
        $this->longitude     = $args['longitude']        ?? NULL;
    }


    public function getLocation_id()
    {
        return $this->location_id;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getLatitude()
    {
        return $this->latitude;
    }
    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setAddress($address)
    {
        if ($address === NULL) {
            $this->address = $this->address;
            return;
        }
        $this->address = $address;
    }

    
    public static function returnLatLongById($db, $location_id)
    {
        $statement = $db->prepare("select latitude, longitude from location where location_id = :location_id");
        $statement->execute([
            'location_id' => $location_id
        ]);
        $id = $statement->fetch();
        $statement->closeCursor();
        return $id;
    }

    public static function returnLocation_idByAddress($db, $address)
    {
        $statement = $db->prepare("select location_id from location where address = :address");
        $statement->execute([
            'address' => $address
        ]);
        $id = $statement->fetch();
        $statement->closeCursor();
        return $id;
    }

    public static function returnAddressById($db, $location_id)
    {
        $statement = $db->prepare("select * from location where location_id = :location_id");
        $statement->execute([
            'location_id' => $location_id
        ]);
        $address = $statement->fetch();
        $statement->closeCursor();
        return $address;
    }
    public static function calculateDistance($db, $location_id, $currentUserLat, $currentUserLong)
    {
        $statement = $db->prepare("select calculate_distance((select latitude from location where location_id = :location_id), (select longitude from location where location_id = :location_id), :latitude, :longitude, 'K')");
        $statement->execute([
            'location_id' => $location_id,
            'latitude' => $currentUserLat,
            'longitude' => $currentUserLong
        ]);
        $distance = $statement->fetch();
        $statement->closeCursor();
        return $distance;
    }

    public static function addLocation($db, $location)
    {
        $statement = $db->prepare("insert into location(address, latitude, longitude) values (:address, :latitude, :longitude); ");
        $statement->execute([
            'address'   => $location->getAddress(),
            'latitude'  => $location->getLatitude(),
            'longitude' => $location->getLongitude()
        ]);
        $statement->closeCursor();
    }


    public static function updateLocation($db, $location)
    {
        $statement = $db->prepare("update location set address = :address, latitude = :latitude, longitude = :longitude");
        $statement->execute([
            'address'   => $location->getAddress(),
            'latitude'  => $location->getLatitude(),
            'longitude' => $location->getLongitude()
        ]);
        $statement->closeCursor();
    }

    public static function deleteLocation($db, $id)
    {
        $statement = $db->prepare("delete from location where location_id = $id");
        $statement->execute();
        $statement->closeCursor();
    }
}


?>