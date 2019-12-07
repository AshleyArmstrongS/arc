<div class="card-body">
    <div class = "card">
    <?php foreach($locals['schedDriver'] as $driverLifts) { ?>
        <h3>Passenger: <?= $driverLifts['name']; ?></h3>
        <p>Day: <?= $driverLifts['day']; ?></p>
        <p>Arriving: <?= $driverLifts['morning']; ?></p>
        <p>Leaving: <?= $driverLifts['evening']; ?></p>
        <div class="btn">
            <a href="/arc/Client/removeSched?car_id= <?= $passengerLifts['car_id'] ?> &to_id= <?= $message['user_id']; ?>">Remove lift</a>
        </div>
    <?php } ?>
    </div>
    <div class= "card">
    <?php foreach($locals['schedPassenger'] as $passengerLifts) { ?>
        <h3>Driver:  <?= $passengerLifts['name']; ?></h3>
        <p>Day:      <?= $passengerLifts['day']; ?></p>
        <p>arriving: <?= $passengerLifts['morning']; ?></p>
        <p>Leaving:  <?= $passengerLifts['evening']; ?></p>
        <p>Car make: <?= $passengerLifts['make']; ?></p>
        <p>Colour:   <?= $passengerLifts['colour']; ?></p>
        <p>Est:     €<?= $passengerLifts['estimated_pay']; ?></p>
        <div class="btn">
            <a href="/arc/Client/removeSched?car_id= <?= $passengerLifts['car_id'] ?> &to_id= <?= $message['user_id']; ?>">Remove lift</a>
        </div>
        <?php } ?>
        </div>
    </div>