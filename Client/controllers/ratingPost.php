<?php return function($req, $res) {
 require('./lib/FormUtils.php');
 require('./models/Rating.php');
 $db = \Rapid\Database::getPDO();
 $req->sessionStart();

 $stars = $req->body('stars');

 $review = $req->body('review');
 $driver_id = $req->body('driver_id');
 $reccommend = $req->body('reccommend');
 $user_id = $_SESSION['Id'];


$rating = new Rating([
    'star_rating' => $stars,
    'review' => $review,
    'driver_id' => $driver_id,
    'reccommend' => $reccommend,
    'user_id' => $user_id
]);

$saved = Rating::addRating($rating, $db);

if($saved)
{
    $res->redirect('/?success=1');
}
$res->redirect('/?success=0');

}
?>