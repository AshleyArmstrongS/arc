<?php require_once('Model.php'); ?>
<?php

class Rating {

    private $rating_id;
    private $driver_id;
    private $user_id;
    private $star_rating;
    private $review;
    private $reccommend;

    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('Rating constructor requires an array');
        }
        $this->rating_id      = $args['rating_id']     ?? NULL;
        $this->driver_id      = $args['driver_id']     ?? NULL;
        $this->user_id        = $args['user_id']       ?? NULL;
        $this->star_rating   = $args['star_rating']  ?? NULL;
        $this->review        = $args['review']       ?? NULL;
        $this->reccommend    = $args['reccommend']   ?? NULL;
    }
    public function getRating_id()
    {
        return $this->rating_id;
    }
    public function getDriver_id()
    {
        return $this->driver_id;
    }
    public function getUser_id()
    {
        return $this->user_id;
    }
    public function getStar_rating()
    {
        return $this->star_rating;
    }
    public function getReview()
    {
        return $this->review;
    }
    public function getReccommend()
    {
        return $this->reccommend;
    }    

//seters

    public function setRating_id($rating_id)
    {
        if ($rating_id === NULL) {
            $this->rating_id = NULL;
            return;
        }
        $this->rating_id = $rating_id;
    }
    public function setDriver_id($driver_id)
    {
        if ($driver_id === NULL) {
            $this->driver_id = NULL;
            return;
        }
        $this->driver_id = $driver_id;
    }
    public function setUser_id($user_id)
    {
        if ($user_id === NULL) {
            $this->user_id = NULL;
            return;
        }
        $this->user_id = $user_id;
    }
    public function setStar_rating($star_rating)
    {
        if ($star_rating === NULL) {
            $this->star_rating = NULL;
            return;
        }
        $this->star_rating = $star_rating;
    }
    public function setReview($review)
    {
        if ($review === NULL) {
            $this->review = NULL;
            return;
        }
        $this->review = $review;
    }
    public function setReccommend($reccommend)
    {
        if ($reccommend === NULL) {
            $this->reccommend = NULL;
            return; 
        }
        $this->reccommend = $reccommend;
    }
    public function addRating($rating, $db)
    {
        $statement = $db->prepare('INSERT into rating (driver_id, user_id, review, reccommend, star_rating) VALUES(:driver_id, :user_id, :review, :reccommend, :star_rating)');
        $statement->execute([
            'driver_id' => $rating->getDriver_id(),
            'user_id' => $rating->getUser_id(),
            'review' => $rating->getReview(),
            'reccommend' => $rating->getReccommend(),
            'star_rating' => $rating->getStar_rating()
        ]);
        $saved = $statement->rowCount() === 1;

        if ($saved) {
            $rating->setRating_id($db->lastInsertId());
            return true;
        }
    }
    public function getRatingsByDriver_id($driver_id, $db)
    {
        $statement = $db->prepare('SELECT r.driver_id, u.user_id, r.user_id, r.review, r.recommend, r.star_rating from rating r inner join user u on r.user_id = u.user_id where r.driver_id = :driver_id');
        $statement->execute([
            'driver_id' => $driver_id
        ]);
        $ratings = $statement->fetchAll();    
        return $ratings;
    }
    public function getRatingsByDriver_idAndUser_id($driver_id, $user_id, $db)
    {
        $statement = $db->prepare('SELECT r.driver_id, u.user_id, r.user_id, r.review, r.recommend, r.star_rating from rating r inner join user u on r.user_id = u.user_id where r.driver_id = :driver_id AND r.user_id = :user_id');
        $statement->execute([
            'driver_id' => $driver_id,
            'user_id' => $user_id
        ]);
        $ratings = $statement->fetch();    
        return $ratings;
    }
    public function deleteRating($rating_id, $db)
    {
        $statement = $db->prepare('DELETE from rating where rating_id = :rating_id');
        $statement->execute([
            'rating_id' => $rating_id
        ]);
    }
}