<?php require_once('Model.php'); ?>
<?php

class Rating {

    private rating_id;
    private driver_id;
    private user_id;
    private star_ratings;
    private reviews;
    private reccommends;

    public function __construct($args) {
        if(!is_array($args)) {
            throw new Exception('Rating constructor requires an array');
        }
        $this->rating_id      = $args['rating_id']     ?? NULL;
        $this->driver_id      = $args['driver_id']     ?? NULL;
        $this->user_id        = $args['user_id']       ?? NULL;
        $this->star_ratings   = $args['star_ratings']  ?? NULL;
        $this->reviews        = $args['reviews']       ?? NULL;
        $this->reccommends    = $args['reccommends']   ?? NULL;
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
    public function getStar_ratings()
    {
        return $this->star_ratings;
    }
    public function getReviews()
    {
        return $this->reviews;
    }
    public function getReccommends()
    {
        return $this->reccommends;
    }    

//seters

    public function setRating_id($rating_id)
    {
        if ($rating_id === NULL) {
            $this->rating_id = NULL;
            return;
        }
        $this-> = $;
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
    public function setStar_ratings($star_ratings)
    {
        if ($star_ratings === NULL) {
            $this->star_ratings = NULL;
            return;
        }
        $this->star_ratings = $star_ratings;
    }
    public function setReviews($reviews)
    {
        if ($reviews === NULL) {
            $this->reviews = NULL;
            return;
        }
        $this->reviews = $reviews;
    }
    public function setReccommends($reccommends)
    {
        if ($reccommends === NULL) {
            $this->reccommends = NULL;
            return;
        }
        $this->reccommends = $reccommends;
    }

}